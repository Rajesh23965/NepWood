<div class="tabs">
    <ul class="nav mnav-tabs gap-1" id="myTab" role="tablist">


        <?php $i = 0;
        foreach ($get_tabs as $gt) : $i++ ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if ($i == 1) : echo 'active';
                                        endif ?>" id="home-tab" data-bs-toggle="tab"
                    data-bs-target="#tab-panel<?php echo $i ?>" type="button" role="tab" aria-controls="home-tab-pane"
                    aria-selected="true"><i class="fas fa-<?php if (!empty($gt['tab_id'])) : echo $gt['tab_icon'];
                                                            endif ?>"></i>
                    <?php if (!empty($gt['tab_id'])) : echo $gt['tab_items'];
                    endif ?></button>
            </li>
        <?php endforeach ?>
    </ul>
    <div class="tab-content" id="myTabContent">

        <?php $i = 0;
        foreach ($get_tabs as $gt) : $i++ ?>

            <div class="tab-pane fade pl-2 pb-2 show <?php if ($i == 1) : echo 'active';
                                                        endif ?> border" id="tab-panel<?php echo $i ?>" role="tabpanel"
                aria-labelledby="home-tab" tabindex="0">
                <div class="col tab">
                    <ul class="w-100 ps-0">
                        <?php foreach ($get_post_list_of_tab as $gpl) : ?>
                            <?php
                            $cmstring = $gpl['post_caty_id'];
                            $catty = explode(",", $cmstring);
                            ?>
                            <?php if (in_array($gt['category_id'], $catty)) : ?>
                                <li>
                                    <div class="card-deck">
                                        <div class="row align-items-center col-12">
                                            <div class="col-1">
                                                <i class="fa fa-link text-danger" style="padding: 10px;"></i>
                                            </div>
                                            <div class="col flex-grow-1">
                                                <a class="notice-title" href="<?php if ($gpl['post_id']) : echo base_url() . 'post?id=' . $gpl['post_id'] . '&title=' . ($gpl['slug'] ?? '');
                                                                                endif ?>">
                                                    <span><?php echo $gpl['post_title']; ?></span>
                                                </a>
                                                <p class="text-dark"><i class="fa fa-calendar"></i> Published on: <span
                                                        class="txt-blue"><?php echo $gpl['added_on']; ?></span></p>
                                            </div>
                                            <div class="col-1">
                                                <a href="<?php if (!empty($gpl['downloadable_file'])) : echo base_url() . 'admin/assets/img/downloadfile/' . $gpl['downloadable_file'];
                                                            else : echo base_url();
                                                            endif ?>" class="btn btn-primary bg-red"><small><i
                                                            class="fas fa-download text-light"></i></small></a>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                        <?php endif;
                        endforeach; ?>
                    </ul>
                </div>
                <div class="text-right w-100 py-4 pr-2 card-footer d-flex justify-content-end">
                    <a class="pr-4"
                        href="<?php echo 'category?id=' . $gt['category_id'] . '8&title=' . $gt['tab_items'] ?>">View All
                        <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>