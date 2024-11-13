<div class='container'>
    <div class='card bg-light'>
        <div class='card-header'>
            <div class='col row'>
                <div class='col'>
                    <h5><b>Manage Staff List</b></h5>
                </div>
                <div class='col-2 text-right'>
                    <a href=''><i class='fas fa-arrow-right fa-3x'></i> Home/staff-list</a>
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
                        <a href="<?php echo base_url() . 'manage-staff' ?>" type='button'
                            class='btn btn-outline-primary w-100'>Add Staff <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <hr>
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Staff Name</th>
                            <th>Specialities</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($staff_list)): $i = 0;
                            foreach ($staff_list as $sl): $i++; ?>
                                <tr>
                                    <td><?= $i ?? '' ?></td>
                                    <td><?= $sl['staff_name'] ?? '' ?></td>
                                    <td><?= $sl['staf_speciyalities'] ?? '' ?></td>
                                    <td>
                                        <?php if (!empty($staff_category)): foreach ($staff_category as $sc): ?>

                                                <?php if ($sl['staf_category'] === $sc['staff_cat_id']): echo $sc['staff_title'];
                                                endif ?>
                                        <?php endforeach;
                                        endif ?>


                                    <td>
                                        <a class="border p-1" href="manage-staff?staffId=<?= $sl['staff_id'] ?? '' ?>">
                                            <i class="fa fa-edit text-success"></i></a>
                                        <a class="border p-1" href="deleteStaff?staffId=<?= $sl['staff_id'] ?? '' ?>"><i
                                                class="fa fa-trash text-danger"></i></a>

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