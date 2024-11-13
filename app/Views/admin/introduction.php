<?php
if (!empty($intro)) { extract($intro); }
?>

<form action="<?php echo base_url() . 'save-introduction/' ?>" method="post" enctype="multipart/form-data">
    <div class="card p-3">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Introduction Setup</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/introduction-setup</a>
            </div>
        </div>


        <hr>
        <div class="card">
            <div class="col">
                <?php if (session()->has('success')): ?>
                <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
                    <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
                </div>
                <?php elseif(session()->has('errors')): ?>
                <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
                    <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
                </div>
                <?php endif; ?>
            </div>
            <div class="card-body col">
                <div class="col row">
                    <div class="col">
                        <label for="">Introduction Title</label>
                        <input class="form-control" type="text" name="title" id="" placeholder="Please Enter Title"
                            value="<?php if (!empty($id)): echo $title;endif?>">
                    </div>
                    <div class="col-2 row">
                    <label for="">Select page for readmore...</label>
                        <select class="form-select" name="selectedPage" id="">
                            <option value="">Select Page</option>
                            <?php if(!empty($page_list)): foreach($page_list as $pg):?>
                            <option <?php if(!empty($selectedPage)&&(!empty($pg['pg_id'])) && $selectedPage == $pg['pg_id']): echo "Selected"; endif;?> value="<?=$pg['pg_id'] ?? ''?>"><?=$pg['page_title'] ?? ''?></option>
                            <?php endforeach; endif?>
                        </select>
                    </div>
                    <div class="col-2 my-auto ">
                        <button type="submit" class="btn btn-outline-success mt-3">Save++</button>
                    </div>
                </div>
                <div class='btn-box my-3'>
                    <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal'
                        data-bs-target='#exampleModal'>
                        <i class='fa fa-music'></i> Insert Media
                    </button>
                </div>
                <div class="col">
                    <label for=""></label>
                    <textarea name="description" id="" cols="30" rows="10">
                        <?php if (!empty($id)): echo $description;endif?>
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include_once 'mediamodal.php'?>