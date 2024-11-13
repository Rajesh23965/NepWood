<?php if (isset($header)): extract($header);
endif ?>

<header class="py-md-3 px-md-5 py-lg-3 px-lg-5 py-sm-1 px-sm-2 ">
    <div>
        <img src="<?= base_url() . 'assets/uploads/';
                    if (!empty($left_logo)): echo $left_logo;
                    endif ?>" class="logo" />
    </div>
    <div>
        <a href="<?php echo base_url() ?>">
            <div class="header-title-box">
                <?php if (isset($province_name)): ?><span class="header-province"><?php echo $province_name ?></span>
                <?php endif ?>
                <?php if (isset($ministry)): ?><span class="header-ministry"><?php echo $ministry ?></span>
                <?php endif ?>
                <?php if (isset($nirdeshnalaya)): ?><span class="header-department"><?php echo $nirdeshnalaya ?></span>
                <?php endif ?>

                <?php if (isset($office_name)): ?><span
                    class="header-office"><?php echo $office_name; ?></span><?php endif ?>
                <?php if (isset($office_location)): ?><span
                    class="header-address"><?php echo $office_location; ?></span><?php endif ?>
                <small><b class="header-province font-five">ISO 15189:2012 Accredited Laboratory</b></small>
            </div>
        </a>

    </div>

    <div>
        <img src="<?= base_url() . 'assets/uploads/';
                    if (!empty($right_logo)): echo $right_logo;
                    endif ?>" class="logo" />
    </div>
</header>