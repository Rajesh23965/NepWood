<form action="<?php echo base_url() . 'save-news-ticker' ?>" method="post" enctype="multipart/form-data">
    <div class="card p-3 position-relative">
        <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif (session()->has('errors')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
        </div>
        <?php endif; ?>
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>News ticker</b></h4>
            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/ticker</a>
            </div>
        </div>
        <hr>
        <div class="col row">
            <div class="col-6">

                <div class="form-select" id="categoryToggle">
                    <label for="">Select category name...</label>
                </div>
                <div class="category-selection my-3">

                    <ul id="categoryList">
                        <input type="text" id="categorySearch" placeholder="Search category...">
                        <li>
                            <label><input type="checkbox" name="cat_id[]" value="0" id="allCategories"> All</label>
                        </li>
                        <?php foreach ($category as $cat): ?>
                        <li>
                            <label><input type="checkbox" name="cat_id[]" value="<?php if ($cat['cat_id']): echo $cat['cat_id'];
                                                                                        endif ?>" <?php if (isset($cat['category_id']) && $cat['category_id'] == $cat['cat_id']): echo "checked";
                            endif ?>>
                                <?php if ($cat['cat_name']): echo $cat['cat_name'];
                                                                                                                    endif ?></label>
                        </li>

                        <?php endforeach ?>

                    </ul>
                </div>

            </div>
        </div>
        <div class="card-footer">

            <button class="btn btn-danger" type="submit">Save++</button>
        </div>
    </div>
</form>