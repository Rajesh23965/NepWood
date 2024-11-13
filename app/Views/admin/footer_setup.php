<?php if (isset($footer)): extract($footer);
endif?>
<form action="<?=base_url() . 'save-footer'?><?php if (isset($footer_id)): echo '/'.$footer_id;
endif?>" method='POST' enctype='multipart/form-data'>
    <div class='card p-3'>

        <div class='col row'>
            <div class='col'>
                <h4 class='txt-blue'><b>Footer Setup</b></h4>
            </div>
            <div class='col text-right'>

                <a class='' href=''><i class='fas fa-arrow-right fa-3x'></i> Home/footer</a>
            </div>
        </div>
        <hr>

        <div class='col-2 row mb-2'>
            <a class="btn btn-primary-outline border mx-2" href="<?php echo base_url() . 'footer-list' ?>"><i
                    class='fas fa-arrow-right fa-3x pr-2'></i>
                Show footers</a>

        </div>
        <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif(session()->has('errors')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
        </div>
        <?php endif; ?>

        <div class='col row'>
            <div class='col mb-1'>
                <label for=''>
                    Footer Heading
                </label>
                <input class='form-control' type='text' name='footer_title' id='' value="<?php if (isset($footer_title)): echo $footer_title;
endif?>">
            </div>
            <div class='col-1 mb-1'>
                <label for=''>
                    Order by
                </label>
                <input class='form-control' type='number' name='order_by' id='' min='1' value="<?php if (isset($order_by)): echo $order_by;
endif?>">
            </div>
        </div>
        <div class='col'>
            <div class='btn-box mb-3'>

                <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal'
                    data-bs-target='#exampleModal'>
                    <i class='fa fa-music'></i> Insert Media
                </button>

            </div>
            <textarea name='footer_desc' id='' cols='30' rows='10'>

<?php if (isset($footer_description)): echo $footer_description;
endif?>

</textarea>
        </div>
    </div>
    <div class='card-footer p-4 col row'>
        <div class='col-2'>
            <button class='btn btn-outline-success w-100' type='submit'>Save</button>

        </div>

    </div>
</form>

<?php include_once 'mediamodal.php';
?>