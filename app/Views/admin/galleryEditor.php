<form action="<?php echo base_url() . 'create-gallery' ?>" method="post" enctype="multipart/form-data">
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
                <h4 class="txt-blue"><b>Gallery</b></h4>
            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/ticker</a>
            </div>
        </div>
        <hr>
        <div class="col row">
            <div class="col-6">

                <div class="form-control" id="categoryToggle">
                    <label for="">Select category name...</label>
                    <span class="arrow-down float-right" id="carret">&#9660;</span>
                </div>
                <div class="category-selection my-3">

                    <ul id="categoryList">
                        <input type="text" id="categorySearch" placeholder="Search category...">

                        <?php foreach ($category as $cat): ?>
                        <li>
                            <label>
                                <input type="radio" name="cat_id" value="<?php echo $cat['cat_id']; ?>"
                                    <?php if (!empty($cat['category_id']) && $cat['category_id'] == $cat['cat_id']) echo "checked"; ?>>
                                <?php echo $cat['cat_name']; ?>
                            </label>
                        </li>


                        <?php endforeach?>

                    </ul>
                </div>
                <?php if (!empty(session('success'))): ?>
                <div class="alert alert-success">
                    <?php echo session('success'); ?>
                </div>
                <?php endif;?>

                <?php if (!empty(session('errors'))): ?>
                <div class="alert alert-errors">
                    <?php echo session('errors'); ?>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="card-footer">

            <button class="btn btn-danger" type="submit">Save++</button>
        </div>
    </div>
</form>