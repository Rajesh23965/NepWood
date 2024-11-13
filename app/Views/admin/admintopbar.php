<?php if (isset($topbar)): extract($topbar);
endif?>

<?php if (session()->has('success')): ?>
<div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
    <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
</div>
<?php elseif(session()->has('errors')): ?>
<div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
    <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
</div>
<?php endif; ?>
<form action="<?=base_url() . 'save-topbar'?>" method="POST" enctype="multipart/form-data">
    <div class="card p-3 m-2">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Topbar Settings</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/Toolbar</a>
            </div>
        </div>
        <hr>
        <div class="col row">
            <div class="col">
                <label for="">Email</label>
                <input class="form-control" type="text" name="email" id="" placeholder="Please Enter Email" value="<?php if (isset($email)): echo $email;
endif?>">
            </div>
            <div class="col">
                <label for="">Mobile Number</label>
                <input class="form-control" type="text" name="mobile_number" id="" placeholder="98****** || 98********"
                    value="<?php if (isset($mobile_number)): echo $mobile_number;
endif?>">
            </div>
        </div>
        <div class="col pt-4">
            <div class="col">
                <h5 class="txt-blue">Social Media Settings</h5>
                <hr>
                <div class="col row">
                    <div class="col">
                        <h6>Facebook</h6>
                        <input class="form-control" type="text" placeholder="Enter facebook Page Name" name="facebook"
                            value="<?php if (isset($facebook)): echo $facebook;
endif?>">

                    </div>
                    <div class="col">
                        <h6>Twitter</h6>
                        <input class="form-control" type="text" placeholder="Enter twitter Url" name="twitter" value="<?php if (isset($twitter)): echo $twitter;
endif?>">
                    </div>

                    <div class="col">
                        <h6>Youtube</h6>
                        <input class="form-control" type="text" placeholder="Enter twitter Url" name="yotube" value="<?php if (isset($yotube)): echo $yotube;
endif?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right p-3 m-3">
            <button class="btn btn-outline-success w-25" type="submit">Save++</button>

        </div>
    </div>

</form>