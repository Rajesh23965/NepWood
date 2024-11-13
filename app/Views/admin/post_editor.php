<?php if (!empty($edit_post_by_id)):
    extract($edit_post_by_id);

endif?>
<div class='card'>
    <div class='card-header position-relative'>
        <div class='col row'>
            <div class='col'>
                <h5>Add Post</h5>
            </div>
            <div class='col text-right'>
                <a class='' href=''><i class='fas fa-arrow-right fa-3x'></i> Home/add-post</a>
            </div>
        </div>
        <hr>
        <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif(session()->has('errors')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <?php foreach (session('errors') as $error): ?>
            <p class="m-0 p-1"><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
    <div class='card-body'>
        <form action="<?php echo base_url() . 'save-post' ?><?php if (!empty($post_id)): echo '/'.$post_id;
endif?>" method='POST' enctype="multipart/form-data">
            <div class='col row'>

                <div class='col border p-3 bg-light'>
                    <div class='col row m-0 pt-2 mr-0'>
                        <div class='col d-flex form-group'>
                            <h6 for='' class='m-auto pr-1 w-25'><b>Post Title :-</b></h6>
                            <input type='text' class='form-control' name='post_title' value="<?php if (!empty($post_title)): echo $post_title;
endif?>" required>
                        </div>
                    </div>
                    <div class="d-flex col">
                        <div class='col-5 d-flex form-group'>
                            <h6 for='' class='m-auto w-25 pr-1'><b>Status :-</b></h6>
                            <select name='post_status' id='' class='form-control'>
                                <option value='1' <?php if (!empty($status_id) && $status_id == 1): echo 'selected';
endif?>>Active</option>
                                <option value='2' <?php if (!empty($status_id) && $status_id == 2): echo 'Selected';
endif?>>Deactive</option>

                            </select>
                        </div>
                        <div class="d-flex justify-content-around ">
                            <h6 for='' class='py-2 w-50 justify-content-center '><b>Date:-</b></h6>
                            <input type="text" id="postDate" class="postdatepicker form-control"
                                placeholder="Select Nepali Date" value="<?php
if (!empty($added_on_bs)): echo $added_on_bs;
endif?>" name="postdate" readonly />
                        </div>
                    </div>
                    <div class='col'>
                        <div class='btn-box pb-3 card-footer'>
                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal'
                                data-bs-target='#exampleModal'>
                                <i class='fa fa-music'></i> Insert Media
                            </button>

                        </div>

                        <textarea name='post_desc' rows='36' rows="50">
<?php if (!empty($content_section)): echo $content_section;
endif?>
</textarea>
                    </div>

                </div>
                <div class='col-3'>
                    <button class='btn btn-otline-success w-100 border bg-blue mb-2' type='submit'>Save Changes <i
                            class='fa fa-plus'></i></button>
                    <div class='col border   bg-light pt-2'>
                        <h6 class='text-center border bg-light p-2'><b> Categories </b></h6>
                        <div class='col border bg-grayy pt-2 pb-2 caty_list'>
                            <?php foreach ($categoryList as $cl): ?>
                            <div class='pl-1 border mt-0'>
                                <input class='' type='checkbox' value="<?php if (!empty($cl['cat_id'])): echo $cl['cat_id'];
endif?>" id='flexCheckDefault' name='post_caty_id[]' <?php if (!empty($post_caty_id)): $arr = explode(',', $post_caty_id);
    if (in_array($cl['cat_id'], $arr)) {
        echo 'checked';
    }
endif?>>
                                <label class='form-check-label mt-0 pt-0' for='flexCheckDefault'>
                                    <?php if (!empty($cl['cat_id'])): echo $cl['cat_name'];
endif?>
                                </label>

                            </div>

                            <?php endforeach?>
                            <div class='pl-1 border mt-0'>
                                <input class='' type='checkbox' value="" id='flexCheckDefault' name='post_caty_id[]'>
                                <label class='form-check-label mt-0 pt-0' for='flexCheckDefault'>
                                    Uncategories
                                </label>

                            </div>
                        </div>
                    </div>

                    <div class='pl-1 border mt-0 text-right p-2'>
                        <hr>
                        <div class='col p-auto mb-2'>
                            <input type='text' class='form-control cat_box' placeholder='Enter Category'>
                        </div>
                        <a href='' class='txt-blue add_category pr-2'>Add category</a>
                    </div>

                    <div class='col border bg-grayy pt-2 pb-2'>
                        <h6 class='text-center border bg-light p-2'><b> Featured Image </b></h6>

                        <div class='image-box'>
                            <img id="featureImage" class='object-fit-fill w-100 ' src="<?php if (!empty($featured_image)): echo base_url() . 'assets/uploads/' . $featured_image;
else:echo base_url() . 'assets/uploads/no-image.jpg';endif?>" alt=''>
                            <?php if (!empty($featured_image)): ?>
                            <div class="remove_featured"><a class=" "
                                    href="<?php echo base_url() . "remove-feature-image/" . $post_id ?>">Remove Feature
                                    Image</a>
                            </div>
                            <?php endif?>
                        </div>
                        <div class='browse-box p-3 bg-light'>
                            <input class='w-100' type='file' accept='image/*' name='featured_image' id='feature_mage'>
                            <input type='hidden' name='new_featured_image' value="<?php if (!empty($featured_image)): echo $featured_image;
endif?>">
                        </div>

                    </div>

                    <div class='col border bg-grayy pt-2 pb-2'>
                        <h6 class='text-center border bg-light p-2'><b> Downloadable File </b></h6>
                        <div class='view-box text-center'>
                            <?php if (!empty($downloadable_file)): ?>

                            <a href="<?php echo base_url() . 'assets/uploads/' . $downloadable_file; ?>"
                                target='_blank'>Click to view</a><a
                                href="<?php echo base_url() . 'delete-post-file/' . $post_id ?>"
                                class="text-danger font-monospace border rounded-circle mx-3" title="Delete File">X</a>
                            <?php endif?>

                        </div>
                        <div class='browse-box p-3 bg-light'>
                            <input class='w-100' type='file' name='downloadable_file' id=''>
                            <input type='hidden' name='old_download_file' value="<?php if (!empty($downloadable_file)): echo $downloadable_file;
endif?>">
                        </div>

                    </div>

                </div>

            </div>

        </form>
    </div>

</div>

<?php include_once "mediamodal.php";?>