<?php if (!empty($packageDetails)): extract($packageDetails);
endif ?>
<div class='container '>
    <div class='card bg-light'>
        <div class='card-header'>
            <div class='col row'>
                <div class='col'>
                    <h5><b>Manage Test Package</b></h5>
                </div>
                <div class='col-3 text-right'>
                    <a href=''><i class='fas fa-arrow-right fa-3x'></i> Home >> test-package-form</a>
                </div>
            </div>
        </div>
        <?php if (session()->has('success')): ?>
            <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
                <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
            </div>
        <?php elseif (session()->has('errors')): ?>
            <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
                <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
            </div>
        <?php endif; ?>
        <div class='col-sm-12 col-md-12 col-lg-12 row'>
            <div class='py-3 mt-2 ml-2 bg-white'>
                <div class="col row">
                    <div class="col-2 p-2 ">
                        <a href="<?php echo base_url() . 'get-package' ?>" type='button'
                            class='btn btn-outline-primary w-100'>Package List <i class="fa fa-eye"></i></a>
                    </div>

                </div>

            </div>
            <div class='col-sm-8 col-md-12 col-lg-12 p-3'>

                <form action="save-package<?= !empty($id) ? '?packageId=' . $id : '' ?>" method="post"
                    enctype="multipart/form-data">
                    <div class='card-header py-3'>
                        <h6 class="txt-blue"><b> <i class="fas fa-bars"></i> Package Detail form</b></h6>
                    </div>
                    <div class='card-body border'>

                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <input type="text" class="form-control" placeholder="Enter Package Title"
                                    name="categoryName" value="<?= $categoryName ?? '' ?>">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-select" id="categoryToggle">
                                    <label for="" class="">Select Category/Department</label>
                                </div>
                                <div class="category-selection my-3">

                                    <ul id="categoryList">
                                        <input type="text" id="categorySearch" placeholder="Search category..." />

                                        <?php
                                        $testDepart = [];
                                        if (!empty($includedTest)) {
                                            $testDepart = explode(',', $includedTest);
                                        }

                                        foreach ($testList as $tl): ?>
                                            <li>
                                                <label class="d-flex justify-content-between">
                                                    <span>
                                                        <input type="checkbox" name="includedTest[]"
                                                            value="<?= $tl['test_id'] ?? ''; ?>" <?php if (in_array($tl['test_id'], $testDepart)): echo "checked";
                                                                                                    endif; ?>>
                                                        <?= htmlspecialchars($tl['testName'] ?? ''); ?>
                                                    </span>
                                                    <span>
                                                        <?= htmlspecialchars($tl['testPrice'] ?? ''); ?>
                                                    </span>
                                                </label>
                                                <hr class="m-0 px-0 pb-1">
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <input type="file" class="form-control" name="packageImage">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <input type="text" class="form-control" placeholder="Enter Price" name="packagePrice"
                                    value="<?= $packagePrice ?? '' ?>">

                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-outline-success" type="submit" value="submit">Save +</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>