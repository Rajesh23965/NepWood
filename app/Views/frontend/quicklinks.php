<div class="quick-list-menu">

    <ul class="list-group mx-100">

        <?php foreach ($get_quick_links as $ql): ?>
            <li class="list-group-item">
                <a class="list-group-item mb-1 shadow-sm text-black d-flex gap-2 justify-content-start align-items-center"
                    href="<?php if ($ql['link_url']): echo $ql['link_url'];
                            endif ?>">
                    <i class="text-main h4 <?php if ($ql['link_icon']): echo 'fas fa-' . $ql['link_icon'];
                                            endif ?>"></i>
                    <span class="px-2">
                        <?php if ($ql['link_label']): echo $ql['link_label'];
                        endif ?>
                    </span>
                </a>
            </li>

        <?php endforeach ?>

    </ul>
</div>