<?php
$i=0;
foreach ($officers as $ofcr): $i++;
    if ($i >= 3): ?>
        <div class="col-sm-12 col-md-12 col-lg-12 border mb-2 py-3 details-box">
            <div class="col-sm-12 col-md-12 col-lg-12 officer_image">
                <img class="rounded-circle  object-fit-cover w-100 overflow-hidden"
                    src="<?=base_url() . 'assets/uploads/' . (isset($ofcr['officer_image']) ? $ofcr['officer_image'] : 'default.png');?>"
                    alt="">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="details-box">
                    <?php if (!empty($ofcr['designation'])): ?><span
                        class="designation py-1 fw-medium text-danger"><?php echo $ofcr['designation'] ?></span>
                    <?php endif?>
                    <hr class="m-0 py-2 cs-w">
                    <?php if (!empty($ofcr['officer_name'])): ?><span
                        class="title"><b><?php echo $ofcr['officer_name']; ?></b></span>
                    <?php endif?>
                    
                    <?php if (!empty($ofcr['mobile'])): ?><span class="designation py-1"><?php echo $ofcr['mobile'] ?></span>
                    <?php endif?>
                    <?php if (!empty($ofcr['email'])): ?>
                    <span class="designation py-1"><?php echo $ofcr['email'] ?></span>
                    <?php endif?>
                </div>
            </div>
        </div>

<?php endif;endforeach?>