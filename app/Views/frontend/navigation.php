<div class="col-sm-12 col-md-12 col-lg-12 row px-3 mx-0 py-3 justify-content-center">
    <?php if (!empty($navList)): ?>

        <?php $i = 0;
        foreach ($navList as $nav_l) : $i++; ?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mx-0 ">
                <div class=" cure-box shadow text-center py-3 px-3">
                    <div class="col nav-icon-box">
                        <span class="icon icon-color">
                            <img class="w-100" src="<?php if (!empty($nav_l['img_icon'])) : echo base_url() . 'assets/uploads/' . $nav_l['img_icon'];
                                                    endif ?>" alt="">
                        </span>
                    </div>
                    <div class="col ">
                        <span class="title">
                            <p class="icon-text-color"><?php if (!empty($nav_l['page_title'])) : echo $nav_l['page_title'];
                                                        endif ?></p>
                        </span>
                    </div>
                    <div class="read-more mb-2">
                        <a href="<?php if (!empty($nav_l['pg_id'])) : if ($i == 5) : echo base_url() . 'covid-tab';
                                        else : echo base_url() . '/page?id=' . $nav_l['pg_id'] . '&title=' . $nav_l['slug'];
                                        endif;
                                    endif ?>" class="icon-box-btn"><span> Read More...</span></a>
                    </div>
                </div>
            </div>

    <?php endforeach;
    endif ?>
</div>