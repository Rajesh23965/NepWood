<div class="col-sm-12 col-md-12 col-lg-12 ">
    <div class="counter-container">

        <div class="row">
            <?php foreach ($counter_data as $cd) : ?>
            <div class="four col-md-3 mb-2 rounded-3">
                <div class="counter-box shadow">
                    <i class="<?php if ($cd['counter_icon']): echo 'fa fa-' . $cd['counter_icon'];
                                    endif ?>"></i>
                    <span class="counter"><?php if ($cd['counter_number']): echo $cd['counter_number'];
                                                endif ?></span>
                    <p><?php if ($cd['counter_title']): echo $cd['counter_title'];
                            endif ?></p>
                </div>
            </div>
            <?php endforeach ?>

        </div>
    </div>
</div>