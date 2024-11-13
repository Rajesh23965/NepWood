<?php if ($edit_officer) {
    extract($edit_officer);
}?>

<form action="<?php echo base_url() . 'save-officer' ?><?php if (isset($officer_id)): echo '/'.$officer_id;endif?>"
    method="post" enctype="multipart/form-data">

    <div class="card p-3 position-relative">
        <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif(session()->has('errors')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
        </div>
        <?php endif; ?>

        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Add officers Informations</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/officer-setup</a>
            </div>
        </div>
        <hr>

        <div class="col row">
            <div class="col-9">
                <div class="form-group col">
                    <a href="<?php echo base_url() . 'show-officer-list' ?>" class=" w-25"><span><i
                                class="fas fa-arrow-right fa-3x pr-2"></i></span><span><b>Show List</b></span></a>
                    <hr>

                </div>
                <div class="col row">
                    <div class="form-group col">
                        <label for="input" class="col-sm-6 control-label">Officer name :</label>
                        <div class="col-sm-12">
                            <input type="text" name="officer_name" class="form-control"
                                value="<?php if (isset($officer_name)): echo $officer_name;endif?>"
                                title="Enter Officer Name">
                        </div>
                    </div>

                    <div class="form-group col">

                        <label for="input" class="col-sm-6 control-label">Officer Designation :</label>
                        <div class="col-sm-12">
                            <input type="text" name="designation" class="form-control"
                                value="<?php if (isset($designation)): echo $designation;endif?>"
                                title="Please Enter designation">
                        </div>
                    </div>
                </div>

                <div class="col row">
                    <div class="form-group col">
                        <label for="input" class="col-sm-6 control-label">Custom text :</label>
                        <div class="col-sm-12">
                            <input type="text" name="mobile" class="form-control"
                                value="<?php if (isset($mobile)): echo $mobile;endif?>" title="Enter Mobile Number">
                        </div>
                    </div>

                    <div class="form-group col">

                        <label for="input" class="col-sm-6 control-label">Email Address :</label>
                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control"
                                value="<?php if (isset($email)): echo $email;endif?>" title="Please Enter Email">
                        </div>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="input" class="col-sm-3 control-label">Display order :</label>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6">

                            <input type="number" name="order_num" class="form-control" min="1" max="6"
                                value="<?php if (isset($order_num)): echo $order_num;endif?>" title="">
                        </div>
                        <div class="col-sm-6 d-flex">

                            <a href="<?php echo base_url() . 'show-officer-list' ?>"
                                class="btn btn-outline-primary w-100 float-right mx-2">Cancel <span><i
                                        class="fa fa-arrow-left"></i></span></a>
                            <button class="btn btn-outline-primary w-100 float-right mx-2">Save <span><i
                                        class="fa fa-arrow-right"></i></span></button>

                        </div>

                    </div>
                </div>

            </div>
            <div class="col-3">
                <main class="page image-bbox p-3">
                    <div class="box">
                        <h6 class="text-center">Click & upload Image</h6>

                    </div>
                    <!-- input file -->

                    <!-- leftbox -->
                    <div class="box">
                        <div class="result w-100">

                            <img class="img-thumbnail"
                                src="<?php echo base_url() . 'assets/uploads/' ?><?php if (isset($officer_image)): echo $officer_image;else:echo "no image.jpg";endif?>"
                                alt="">
                        </div>
                    </div>

                    <div class="box">
                        <input type="file" id="file-input" name="officer_image" />
                        <input type="hidden" id="file-input" name="new_officer_image"
                            value="<?php if (isset($officer_image)): echo $officer_image;else:echo "no image.jpg";endif?>">

                    </div>

                </main>
            </div>

        </div>

    </div>
</form>

<script>
// vars
let result = document.querySelector('.result'),
    img_result = document.querySelector('.img-result'),
    img_w = document.querySelector('.img-w'),
    img_h = document.querySelector('.img-h'),
    options = document.querySelector('.options'),
    save = document.querySelector('.save'),
    cropped = document.querySelector('.cropped'),
    dwn = document.querySelector('.download'),
    upload = document.querySelector('#file-input'),
    cropper = '';

// on change show image with crop options
upload.addEventListener('change', (e) => {
    if (e.target.files.length) {
        // start file reader
        const reader = new FileReader();
        reader.onload = (e) => {
            if (e.target.result) {
                // create new image
                let img = document.createElement('img');
                img.id = 'image';
                img.src = e.target.result
                // clean result before
                result.innerHTML = '';
                // append new image
                result.appendChild(img);
                // show save btn and options
                save.classList.remove('hide');
                options.classList.remove('hide');
                // init cropper
                cropper = Cropper(img);
            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});
</script>