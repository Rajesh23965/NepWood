<?php if(!empty($location)): extract($location); endif?>

<?php if (session()->has('success')): ?>
<div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
    <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
</div>
<?php elseif(session()->has('errors')): ?>
<div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
    <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
</div>
<?php endif; ?>
<form action="<?=base_url() . 'save-location'.((!empty($linkId)) ?'?linkId='.$linkId : '')?>" method="POST" enctype="multipart/form-data">
    <div class="card p-3 m-2">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Location Setup</b></h4>
            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/location-setup</a>
            </div>
        </div>  
        <hr>
        
        <div class="col-lg-12 row">
            <textarea name="location" id="">
                <?=$location ?? ''?>
            </textarea>

        </div>        

        <div class="text-right p-3 m-3">
            <button class="btn btn-outline-success w-25" type="submit">SAVE CHANGES</button>
        </div>

        
    </div>

</form>