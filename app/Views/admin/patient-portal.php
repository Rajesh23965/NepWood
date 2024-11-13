<?php if (!empty($testDetailsById)): extract($testDetailsById);
endif ?>

<?php if (!empty($departmentdetailsbyId)): extract($departmentdetailsbyId);
endif ?>
<div class='container '>
    <div class='card bg-light'>
        <div class='card-header'>
            <div class='col row'>
                <div class='col'>
                    <h5><b>Manage Department/Test</b></h5>
                </div>
                <div class='col-2 text-right'>
                    <a href=''><i class='fas fa-arrow-right fa-3x'></i> Home/test-department-form</a>
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
                        <a href="<?php echo base_url() . 'test-list' ?>" type='button'
                            class='btn btn-outline-primary w-100'>Test
                            List <i class="fa fa-eye"></i></a>
                    </div>
                    <div class="col">

                        <form
                            action='<?php echo base_url() . 'save-test-department' . (!empty($departmentId) ? '?departmentId=' . $departmentId : '') ?>'
                            method='POST' class='form-horizontal' role='form' enctype='multipart/form-data'>
                            <div class="col row">
                                <div class="col  p-2">
                                    <input type='text' class='form-control' name="departmentName"
                                        placeholder='Enter Test category/Department...'
                                        value="<?= $departmentName ?? '' ?>" required>
                                </div>
                                <div class="col-3 p-2">
                                    <div class="form-select" id="categoryToggle">
                                        <label for="" class="fw-bold text-muted mb-0">Select Test for department</label>
                                    </div>
                                    <div class="category-selection my-3">

                                        <ul id="categoryList">
                                            <input type="text" id="categorySearch" placeholder="Search category...">



                                            <?php $incdl = [];


                                            if (!empty($includedTestinDepartment)) {
                                                $incdl = explode(',', $includedTestinDepartment);
                                            } ?>

                                            <?php foreach ($testList as $ttl): ?>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="includedTestinDepartment[]"
                                                        value="<?php echo $ttl['test_id']; ?>" <?php if (in_array($ttl['test_id'], $incdl)): echo "checked";
                                                                                                    endif; ?>>
                                                    <?php echo $ttl['testName']; ?>
                                                </label>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3 p-2 d-flex gap-1">
                                    <button class='btn btn-outline-primary w-100 h-75 fa fa-plus'
                                        type='submit'><?= !empty($departmentId) ? 'UPDATE' : 'ADD' ?></button>

                                    <button class='btn btn-outline-danger w-100 h-75'
                                        href="admin-patien-portal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class='col-sm-8 col-md-8 col-lg-8 p-3'>

                <div class='card-header py-3'>
                    <h6 class="txt-blue"><b> <i class="fas fa-bars"></i> Add Test</b></h6>
                </div>
                <div class='card-body border'>
                    <form action="save-test<?= !empty($test_id) ? '?testId=' . $test_id : '' ?>" method="post">

                        <div class="container mt-3">
                            <div class="mb-3 mt-3">
                                <label for="Test Name">Test Name:</label>
                                <input type="text" class="form-control" id="Test Name" placeholder="Enter Test Name"
                                    name="testName" required value="<?= $testName ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="specimen">Specimen</label>
                                <input type="text" class="form-control" id="specimen" placeholder="Enter specimen"
                                    name="specimen" value="<?= $specimen ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Collection">Collection</label>
                                <input type="text" class="form-control" id="Collection" placeholder="Enter Collection"
                                    name="collection" value="<?= $collection ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Reporting">Reporting</label>
                                <input type="text" class="form-control" id="Reporting" placeholder="Enter Reporting"
                                    name="reporting" value="<?= $reporting ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Price">Price</label>
                                <input type="number" class="form-control" id="Price" placeholder="Enter Price"
                                    name="testPrice" value="<?= $testPrice ?? '' ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>

                    </form>


                </div>

            </div>

            <div class='col-sm-4 col-mmethcol-lg-4 py-3 mx-0 px-0'>
                <div class='card-header py-3'>
                    <h6 class="txt-blue"><b><i class="fas fa-bars"></i> Category / Department List</b></h6>
                </div>
                <div class='card-body border'>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.n</th>
                                <th>Category/Department title</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($alldepartment)): $i = 0;
                                foreach ($alldepartment as $td): $i++ ?>
                            <tr>
                                <td><?= $i ?? '' ?></td>
                                <td><?= $td['departmentName'] ?? '' ?></td>
                                <td class="text-center">
                                    <a class="fa fa-edit text-success"
                                        href="admin-patien-portal<?= '?departmentId=' . $td['departmentId'] ?? '' ?>"></a>
                                    <a class="fa fa-trash text-danger"
                                        href="delete-test-department<?= '?departmentId=' . $td['departmentId'] ?? '' ?>"></a>
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