    <div class="card m-2 card">
        <div class="card-header">
            <div class="col row">
                <div class="col">
                    <h5>Add Menu</h5>

                </div>
                <div class="col text-right">
                    <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/add-menu</a>
                </div>
            </div>
            <hr>
        </div>

        <div class="col row border card-body">
            <?php if (session()->has('success')): ?>
            <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
                <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
            </div>
            <?php elseif(session()->has('errors')): ?>
            <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
                <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
            </div>
            <?php endif; ?>
            <div class="col-3 mt-3 py-2 px-2 border">
                <h6 class="pt-2 pl-3"><b> Add menu items </b></h6>
                <hr class="ml-3">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Pages
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse border m-2"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                            <div class="pl-2 c-box">
                                <?php $i = 0;
                                foreach ($page_menu as $page) :  ?>
                                <div class="pl-3">
                                    <input class="page" type="checkbox" name="chk[]" value="<?php if (isset($page['pg_id'])) : echo $page['pg_id'];
                                                                                                endif ?>"
                                        id="flexCheckDefault" data-target-element="<?php if (isset($page['slug'])) : echo $page['slug'];
                                                                                                endif ?>">
                                    <label class="form-check-label mt-0 pt-0" for="flexCheckDefault">
                                        <?php if (isset($page['page_title'])) : echo $page['page_title'];
                                            endif ?>
                                    </label>
                                    <input class="pg-slug<?php echo $i ?>" type="hidden" value="<?php if (isset($page['slug'])) : echo $page['slug'];
                                                                                                    endif ?>">
                                </div>

                                <?php $i++;
                                endforeach ?>
                            </div>

                            <hr>
                            <div class="card-footer text-right mb-3 mr-2">
                                <small><button class="btn btn-outline-info txt-blue" id="add-page-menu">Add Menu
                                        <small><i class="fa fa-plus"></i></small></button></small>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Posts
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse border m-2"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="pl-2 c-box">
                                <?php if ($post_menu) : ?>
                                <?php $i = 0;  foreach ($post_menu as $post_title) :  ?>
                                <div class="pl-3">
                                    <input class="post" type="checkbox" name="post[]" value="<?php if (isset($post_title['post_id'])) : echo $post_title['post_id'];
                                                                                                        endif ?>"
                                        id="flexCheckDefault" data-target-element="<?php if (isset($post_title['slug'])) : echo $post_title['slug'];
                                                                                                endif ?>">
                                    <label class="form-check-label mt-0 pt-0" for="flexCheckDefault">
                                        <?php if (isset($post_title['post_title'])) : echo $post_title['post_title'];
                                                endif ?>
                                    </label>
                                    <input class="pst-slug<?php echo $i ?>" type="hidden" value="<?php if (isset($post_title['slug'])) : echo $post_title['slug'];
                                                                                                    endif ?>">
                                </div>

                                <?php $i++; 
                                    endforeach ?>
                                <?php endif ?>
                            </div>

                            <hr>
                            <div class="card-footer text-right mb-3 mr-2">
                                <small><button class="btn btn-outline-info txt-blue" id="add-post-menu">Add
                                        Menu<small><i class="fa fa-plus"></i></small></button></small>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Categories
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse border m-2"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="pl-2 c-box">
                                <?php $i=0; foreach ($caty_menu as $caty_menu) : ?>
                                <div class="pl-3 menu-item-title">
                                    <input class="category" type="checkbox" value="<?php if (isset($caty_menu['cat_id'])) : echo $caty_menu['cat_id'];
                                            endif ?>" id="flexCheckDefault" name="category[]" data-target-element="<?php if (isset($caty_menu['cat_slug'])) : echo $caty_menu['cat_slug'];
                                            endif ?>">
                                    <label class="form-check-label mt-0 pt-0" for="flexCheckDefault">
                                        <?php if (isset($caty_menu['cat_name'])) : echo $caty_menu['cat_name'];
                                            endif ?>
                                    </label>
                                    <input class="ct-slug<?php echo $i ?>" type="hidden" value="<?php if (isset($caty_menu['cat_slug'])) : echo $caty_menu['cat_slug'];
                                                                                                    endif ?>">
                                </div>

                                <?php $i++; endforeach ?>
                            </div>

                            <hr>
                            <div class="card-footer text-right mb-3 mr-2">
                                <small><button class="btn btn-outline-info txt-blue" id="add-category-menu">Add Menu
                                        <small><i class="fa fa-plus"></i></small></button></small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#custom" aria-expanded="false" aria-controls="custom">
                                Custom Links
                            </button>
                        </h2>
                        <div id="custom" class="accordion-collapse collapse border m-2"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                            <div class="card-body">

                                <div class="col">
                                    <div class="col row ml-1 mb-2">
                                        Name : <input class="form-control" id="cs_link" type="text"
                                            placeholder="please enter item name">
                                    </div>
                                    <div class="col row ml-1 mb-2">
                                        URL : <input class="form-control" id="cs_url" type="text"
                                            placeholder="please enter item url">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right mb-3 mr-2">
                                <small><button class="btn btn-outline-info txt-blue" id="add-custom-link-menu">Add Menu
                                        <small><i class="fa fa-plus"></i></small></button></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border mt-3 py-2">
                <h6 class="pt-2 pl-3"><b> Menu Structure </b></h6>
                <hr class="ml-3">
                <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                <div class="card-body">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">

                            <?php if (!empty($get_parent_m_list)) : ?>

                            <?php foreach ($get_parent_m_list as $parent_list) : ?>

                            <?php if (isset($parent_list) && $parent_list['parent_id'] == 0) : ?>
                            <li class="dd-item dd3-item" data-id="<?php if (isset($parent_list['id_menu'])) : echo $parent_list['id_menu'];
                                                                                endif ?>" data-pid="<?php if (isset($parent_list['content_id'])) : echo $parent_list['content_id'];
                                                                                                    endif ?>"
                                data-label="<?php if (isset($parent_list['label_menu'])) : echo $parent_list['label_menu'];
                                                                                                                            endif ?>"
                                data-url="<?php if (isset($parent_list['url_menu'])) : echo $parent_list['url_menu'];
                                                                                                                                                endif ?>"
                                data-content="<?php if (isset($parent_list['content_type'])) : echo $parent_list['content_type'];endif ?>">
                                <div class="dd-handle dd3-handle"> Drag</div>
                                <div class="dd3-content"><span> <?php echo $parent_list['label_menu'] ?> </span>
                                    <div class="item-edit">Edit</div>
                                </div>
                                <div class="item-settings d-none">
                                    <p><label for="">Navigation Label<br><input class="form-control" type="text"
                                                name="navigation_label"
                                                value="<?php if (isset($parent_list['label_menu'])) : echo $parent_list['label_menu'];
                                                                                                                                                            endif ?>"></label>
                                    </p>
                                    <p><label for="">Navigation Url<br><input class="form-control" type="text"
                                                name="navigation_url"
                                                value="<?php if (isset($parent_list['url_menu'])) : echo $parent_list['url_menu'];
                                                                                                                                                        endif ?>"></label>
                                    </p>
                                    <p><a class="item-delete" href="javascript:;">Remove</a> | <a class="item-close"
                                            href="javascript:;">Close</a>
                                    </p>
                                </div>

                                <?php if (has_child($get_parent_m_list, $parent_list['id_menu'])) : ?>
                                <ol class="dd-list">
                                    <?php generate_child_menu($get_parent_m_list, $parent_list['id_menu']); ?>
                                </ol>
                                <?php endif; ?>



                            </li>
                            <?php endif ?>

                            <?php endforeach;
                            endif ?>
                        </ol>
                    </div>
                </div>


            </div>
        </div>
        <div class="card-footer">

            <form action="<?php echo base_url() . 'save-menu' ?>" method="post">
                <input type="hidden" class="w-100" id="nestable-output" name="menudata">
                <button type="submit" class="float-right btn btn-outline-success">Save Menu</button>
            </form>
        </div>
    </div>




    <?php
    // Function to check if a menu item has child items
    function has_child($get_parent_m_list, $id_menu)
    {
        foreach ($get_parent_m_list as $item) {
            if ($item['parent_id'] == $id_menu) {
                return true;
            }
        }
        return false;
    }

    // Function to generate child items for a menu item
    // $i == 0;
    function generate_child_menu($get_parent_m_list, $parent_id)
    {

        foreach ($get_parent_m_list as $parent_list) {
            


            if ($parent_list['id_menu'] == $parent_id) {
                $arr = "<small class='text-muted'><li class='fas fa-angle-double-right'><li></small>";
            }
            if ($parent_list['parent_id'] == $parent_id) {
                echo "<li class='dd-item dd3-item' data-id='{$parent_list['id_menu']}' data-pid='{$parent_list['content_id']}' data-label='{$parent_list['label_menu']}' data-url='{$parent_list['url_menu']}'data-content='{$parent_list['content_type']}'>";
                echo "<div class='dd-handle dd3-handle'> Drag</div><div class='dd3-content'><span> {$parent_list['label_menu']} </span>";
                echo "<div class='item-edit'>Edit</div></div><div class='item-settings d-none'><p><label>Navigation Label<br>";
                echo "<input class='form-control' type='text' name='navigation_label' value='{$parent_list['label_menu']}'></label></p>
                <p><label>Navigation Url<br><input class='form-control' type='text' name='navigation_url' value='{$parent_list['url_menu']}'></label></p>
                <p><a class='item-delete' href='javascript:;'>Remove</a> |
                    <a class='item-close' href='javascript:;'>Close</a>
                </p>
            </div>";
                if (has_child($get_parent_m_list, $parent_list['id_menu'])) {
                    echo "<ol class='dd-list'>";
                    generate_child_menu($get_parent_m_list, $parent_list['id_menu']);
                    echo "</ol>";
                }
                echo "</li>";
            }
        }
    }
    ?>