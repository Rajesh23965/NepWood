<section class="nav-bg sticky-top menubar">
    <div class="container-fluid px-3">
        <nav class="navbar navbar-expand-lg navbar-dark nav-bg text-light my-0 py-0">
            <button class="navbar-toggler rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav w-100 text-lg-center text-md-center text-sm-start">
                    <?php $act = $request->getGet('id'); ?>
                    <?php foreach ($get_menubar as $item) : ?>
                    <?php
                        if (isset($item['content_type']) && $item['content_type'] == 1) {
                            $url = base_url() . 'page?id=' . $item['content_id'] . '&title=' . urldecode(str_replace(' ', '-', $item['label_menu']));
                        } elseif (isset($item['content_type']) && $item['content_type'] == 2) {
                            $url = base_url() . 'post?id=' . $item['content_id'] . '&title=' . urldecode(str_replace(' ', '-', $item['label_menu']));
                        } elseif (isset($item['content_type']) && $item['content_type'] == 3) {
                            $url = base_url() . "category?id=" . $item['content_id'] . '&title=' . urldecode(str_replace(' ', '-', $item['label_menu']));
                        } elseif (isset($item['content_type']) && $item['content_type'] == 4) {
                            $url = $item['url_menu'];
                        } else {
                            $url = '';
                        }

                        if ($item['id_menu'] == 1) {
                            $icon = "<i class='fa fa-home'></i>";
                            $url = base_url();
                        } else {
                            $icon = '';
                        }
                        ?>
                    <?php if ($item['parent_id'] == 0) : ?>
                    <li class="nav-item dropdown p-1 w-100 <?= $act == $item['content_id'] ? 'active' : '' ?>">
                        <a class="nav-link text-light px-0 mx-auto text-nowrap <?= $item['has_child'] == 1 ? '' : '' ?>"
                            href="<?= empty($url) && empty($item['content_id']) ? $item['url_menu'] : $url ?>">
                            <?= $icon . ' ' . $item['label_menu'] ?>
                            <?php if ($item['has_child'] == 1) : ?>
                            <span class="caret"></span>
                            <?php endif; ?>
                        </a>
                        <?php if ($item['has_child'] == 1) : ?>
                        <ul class="dropdown-menu nav-bg py-0">
                            <?php generate_child_menu($get_menubar, $item['id_menu']); ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
</section>

<?php
function has_child($get_menubar, $id_menu)
{
    foreach ($get_menubar as $item) {
        if ($item['parent_id'] == $id_menu) {
            return true;
        }
    }
    return false;
}

// Function to generate child items for a menu item
function generate_child_menu($get_menubar, $parent_id)
{
    foreach ($get_menubar as $item) {
        if (isset($item['content_type']) && $item['content_type'] == 1) {
            $url = base_url() . 'page?id=' . $item['content_id'] . '&title=' . urldecode(str_replace(' ', '-', $item['label_menu']));
        } elseif (isset($item['content_type']) && $item['content_type'] == 2) {
            $url = base_url() . 'post?id=' . $item['content_id'] . '&title=' . urldecode(str_replace(' ', '-', $item['label_menu']));
        } elseif (isset($item['content_type']) && $item['content_type'] == 3) {
            $url = base_url() . "category?id=" . $item['content_id'] . '&title=' . urldecode(str_replace(' ', '-', $item['label_menu']));
        } elseif (isset($item['content_type']) && $item['content_type'] == 4) {
            $url = $item['url_menu'];
        } else {
            $url = '';
        }

        if (!empty($item['has_child']) && $item['has_child'] == 1) {
            $arr = '&raquo';
        } else {
            $arr = '';
        }

        if ($item['id_menu'] == $parent_id) {
            $arr = "<small class='text-muted pr-2'><li class='fas fa-angle-double-right'></li></small>";
        }
        if ($item['parent_id'] == $parent_id) {
            echo "<li><a class='dropdown-item text-light d-flex' href='{$url}'>{$item['label_menu']}<span class='arr float-right'>$arr</span></a>";
            if (has_child($get_menubar, $item['id_menu'])) {
                echo "<ul class='submenu dropdown-menu nav-bg py-0'>";
                generate_child_menu($get_menubar, $item['id_menu']);
                echo "</ul>";
            }
            echo "</li><hr class='p-0 m-0'>";
        }
    }
}
?>