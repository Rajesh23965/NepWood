<form action="<?php echo base_url() . 'save-slider' ?>" method="post" enctype="multipart/form-data">

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
                <h4 class="txt-blue"><b>Slider Setup</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/slider-setup</a>
            </div>
        </div>
        <hr>
        <div class="col">
            <div class="col row card-header mx-0">
                <div class="col form-group">
                    <label for="input" class="col control-label">Title of Image:</label>
                    <div class="col">
                        <input type="text" name="slider_title" id="input" class="form-control" value=""
                            title="Some name of image">
                    </div>
                </div>


                <div class="col form-group">
                    <label for="input" class="col control-label">Slider Image</label>
                    <div class="col">
                        <input type="File" name="slider_image" id="input" class="form-control" value=""
                            required="required" title="Slider Image">
                    </div>
                </div>
                <div class="col-2 form-group my-auto mt-2 pt-1">
                    <button class="btn btn-outline-success mt-3 w-100">save++</button>
                </div>

            </div>
            <div class="card-body border">
                <textarea name="slider_description" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

    </div>
</form>


<div class="col mx-0">
    <div class="col-12 row gap-2  border my-2 p-2 mx-0">
        <?php foreach ($image_list as $image_list): ?>
        <div class="col-2 slider-image">
            <img class="image-container" src="<?php echo base_url() . 'assets/uploads/' ?><?php if($image_list['slider_image']): echo $image_list['slider_image'];
endif?>">
            <a class="close-icon" title="Remove"
                href="<?php echo base_url() . 'delete-slider/' . $image_list['slider_id'] ?>">&times;</a>
        </div>
        <?php endforeach?>


    </div>

</div>