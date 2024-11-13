<div class="col mb-3 shadow mb-1">
    <div class="list-menu">
        <ul class="list-group">
            <li class="d-flex mb-0 mt-1 custom-button">
                <a class="w-100 shadow-sm " href="<?php echo base_url() . 'patient-portal' ?>">
                    <span class="text-light">Patient Portal</span>
                </a>
            </li>
            <li class="d-flex mb-0 mt-1 custom-button">
                <a class="w-100 shadow-sm" href="<?php echo base_url() . 'laboratory-coordinator'; ?>">
                    <span class="text-light">Laboratory Information Portal</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php foreach ($get_officer as $gfo) : ?>
<div class="off-box shadow ">
    <div class="col-5 image-box h-25">

        <img class="rounded-circle" src="<?php echo base_url() . 'assets/image/' . $gfo['officer_image'] ?>"
            class="img-responsive" alt="Image">

    </div>
    <div class="col">
        <p><b><?php if ($gfo['designation']) : echo $gfo['designation'];
                    endif ?></b></p>
        <hr>
        <span>

            <b class="txt-red off_name"><?php if ($gfo['officer_name']) : echo $gfo['officer_name'];
                                            endif ?></b>
            <?php if ($gfo['email']) : ?> <p><?php echo $gfo['email'] ?></p><?php endif ?>
            <?php if ($gfo['mobile']) : ?> <p><?php echo $gfo['mobile'] ?></p><?php endif ?>

        </span>
    </div>
</div>

<?php endforeach ?>