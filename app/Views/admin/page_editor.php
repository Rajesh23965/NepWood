<?php if (!empty($singlePage_data)): extract($singlePage_data);endif?>
<div class="card">
    <form action="<?php echo base_url() . 'save-page' ?><?php if (!empty($pg_id)): echo '/'.$pg_id;
endif?>" method="POST" enctype="multipart/form-data">
        <div class="card-header">
            <div class="col row">
                <div class="col">
                    <h5>Add Page</h5>

                </div>
                <div class="col-2 text-right">
                    <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/add-page</a>
                </div>
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

        </div>
        <div class="card-body">
            <div class="col row">
                <div class="col d-flex form-group">
                    <h6 for="" class="m-auto text-sm-start"><b>Page Title</b></h6>
                    <input type="text" class="form-control" name="page_title" value="<?php if (!empty($page_title)): echo $page_title;
endif?>" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 row py-3">
                <div class="col-6 d-flex">
                    <h6 for="" class="m-auto pr-1"><b>Page Status</b></h6>
                    <select name="page_status" id="" class="form-control" class="page_status">
                        <option value="1" <?php if (isset($page_status)): if ($page_status == 1): echo 'selected';
    endif;
endif?>>Active</option>
                        <option value="2" <?php if (isset($page_status)): if ($page_status == 0): echo 'selected';
    endif;
endif?>>Deactive</option>

                    </select>
                </div>
                <div class="col-4 d-flex">
                    <h6 for="" class="m-auto pr-1 w-25"><b>Featured Image</b></h6>
                    <input type="file" class="form-control" name="page_featured_img">
                    <input type="hidden" class="form-control" name="updated_page_featured_img" value="<?php if (!empty($page_featured_img)): echo $page_featured_img;
endif?>">
                    <a href=""><?php if (isset($page_featured_img)): echo $page_featured_img;
endif?></a>
                </div>

                <div class="col-2">
                    <button class="btn btn-otline-success w-100 border bg-blue" type="submit">Save Changes</button>
                </div>
            </div>

            <div class="col">
                <div class="btn-box pb-3 card-footer">

                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fa fa-music"></i> Insert Media
                    </button>

                </div>
                <textarea id="accordion" class="page_desc rounded-0" name="page_desc" rows="50">
                <?php if (!empty($page_desc)): echo $page_desc;
endif?>
                </textarea>
            </div>

        </div>

    </form>
</div>

<?php include_once "mediamodal.php";?>