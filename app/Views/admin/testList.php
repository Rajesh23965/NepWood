<div class='container '>
    <div class='card bg-light'>
        <div class='card-header'>
            <div class='col row'>
                <div class='col'>
                    <h5><b>Test List</b></h5>
                </div>
                <div class='col-3 text-right'>
                    <a href=''><i class='fas fa-arrow-right fa-3x'></i> Home/test/package-form</a>
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
                        <a href="<?php echo base_url() . 'admin-patien-portal' ?>" type='button'
                            class='btn btn-outline-primary w-100 fa fa-plus'>Add \ Manage test</a>
                    </div>

                </div>
                <hr>
                <div class="py-2">
                    <form action="<?= base_url() . 'delete-multiple-testlist' ?>" method="post">
                        <input id="itemID" type="text" name="itemID" value="" hidden>
                        <div class="d-flex flex-column">
                            <div class="col-3 p-0 m-0 d-flex gap-3">
                                <select class="form-select" name="bulkAction" id="">
                                    <option value="" hidden>Bulk Action</option>
                                    <option value="1">Move to trash</option>
                                </select>
                                <button type="submit" class="btn btn-outline-dark">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-sm-12 col-md-12 col-lg-12 p-3'>

                <div class='card-header py-3'>
                    <h6 class="txt-blue"><b> <i class="fas fa-bars"></i> Test List</b></h6>
                </div>
                <div class='card-body border'>

                    <table class="table table-striped" id="myTable">
                        <thead>
                            <th><input class="ml-1 selectAll" type="checkbox"></th>
                            <th>S.N</th>
                            <th>Test Name</th>
                            <th>Specimen</th>
                            <th>Collection</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php if (!empty($testList)): $i = 0;
                                foreach ($testList as $tl): $i++; ?>

                            <?php $testLID = [];
                                    if (!empty($tl['testCategoryId'])): $testLID = explode(',', $tl['testCategoryId']);

                                    endif ?>
                            <tr>
                                <td><input type="checkbox" class="ml-1 checkBoxClass selectItem"
                                        value="<?php if (!empty($tl['test_id'])) : echo $tl['test_id'];
                                                                                                                endif ?>">
                                </td>
                                <td><?= $i ?? '' ?></td>
                                <td><?= $tl['testName'] ?? '' ?></td>
                                <td><?= $tl['specimen'] ?? '' ?></td>
                                <td><?= $tl['collection'] ?? '' ?></td>

                                <td><?= $tl['testPrice'] ?? '' ?></td>
                                <td>
                                    <a class="fa fa-edit text-success"
                                        href="admin-patien-portal?test_id=<?= $tl['test_id'] ?? '' ?>"></a>
                                    <a class="fa fa-trash text-danger"
                                        href="delete-test?test_id=<?= $tl['test_id'] ?? '' ?>"></a>

                                </td>
                            </tr>
                            <?php endforeach;
                            endif ?>
                        </tbody>



                    </table>
                </div>

            </div>

        </div>
    </div>
</div>