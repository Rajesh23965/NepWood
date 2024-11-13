<?php
if (isset($staffDetails)):

    extract($staffDetails);

endif
?>

<div class='container '>


    <div class='card bg-light'>
        <div class='card-header'>
            <div class='col row'>
                <div class='col'>
                    <h5><b>Manage Staff List</b></h5>
                </div>
                <div class='col-2 text-right'>
                    <a href=''><i class='fas fa-arrow-right fa-3x'></i> Home/staff-form</a>
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
                        <a href="<?php echo base_url() . 'get-stafflist' ?>" type='button'
                            class='btn btn-outline-primary w-100'>View
                            Staff List <i class="fa fa-eye"></i></a>
                    </div>
                    <div class="col">

                        <form action='<?php echo base_url() . 'save-staff-category' ?>' method='POST'
                            class='form-horizontal' role='form' enctype='multipart/form-data'>
                            <div class="col row">
                                <div class="col  p-2">
                                    <input type='text' class='form-control' name="cat_name"
                                        placeholder='Enter Staff category...' required>
                                </div>
                                <div class="col-2 p-2">
                                    <button class='btn btn-outline-primary w-100' type='submit'>Add <i
                                            class='fa fa-plus'></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class='col-sm-8 col-md-8 col-lg-8 p-3'>

                <div class='card-header py-3'>
                    <h6 class="txt-blue"><b> <i class="fas fa-bars"></i> Create Staff list</b></h6>
                </div>
                <div class='card-body border'>

                    <form action="<?php echo base_url() . 'save-staff-list' ?><?php if (isset($staff_id)): echo '?staffId='.$staff_id;
                                                                                endif ?>" method='POST' role='form'
                        enctype='multipart/form-data'>
                        <div class='modal-body'>
                            <div class='container'>
                                <div class='col-md-12 row'>
                                    <div class='col-md-4'>
                                        <label class='w-100 pb-3' for='name'>Name : <input id='staff_name' type='text'
                                                class='form-control' name='staff_name' value="<?php if (isset($staff_name)): echo $staff_name;
                                                                                                endif ?>"
                                                placeholder="Enter staff name..."></label class='w-100 pb-3' required>
                                    </div>

                                    <div class='col-md-4'>
                                        <label class='w-100 pb-3' for='Specialist'>Specialist: <input id='Specialist'
                                                type='text' class='form-control' name='specialist' value="<?php if (isset($staf_speciyalities)): echo $staf_speciyalities;
                                                                                                            endif ?>"
                                                placeholder="Enter Sepciality..."></label class='w-100 pb-3'>
                                    </div>

                                    <div class='col-md-4'>
                                        <label class='w-100 pb-3' for='Category'>Category:
                                            <select class='form-control' name='category' id='staff_category' required>
                                                <option value='' hidden>Select Category...</option>

                                                <?php $i = 0;
                                                foreach ($staff_category as $sc): $i++ ?>
                                                <option value="<?php if ($sc['staff_cat_id']): echo $sc['staff_cat_id'];
                                                                    endif ?>" <?php if (!empty($staf_category)  && $sc['staff_cat_id'] == $staf_category): echo 'selected';
                                                                                endif ?>>
                                                    <?php if ($sc['staff_title']): echo $sc['staff_title'];
                                                        endif ?>
                                                </option>

                                                <?php endforeach ?>
                                            </select>
                                        </label class='w-100 pb-3'>
                                    </div>
                                    <div class='col-md-4'>
                                        <label class='w-100 pb-3' for='name'>Image: <input type='file'
                                                name='staff_image' class='form-control'></label>
                                        <input type='text' name='staff_image_old' value="<?php if (isset($staff_image)): echo $staff_image;
                                                                                            endif ?>" hidden>
                                    </div>

                                    <div class='col-md-5'>
                                        <label class='w-100 pb-3' for='name'>Insert staff <b
                                                class='text-danger'>before</b>
                                            Selected person

                                            <input type='text' id='searchBox' class='combobox form-control'
                                                placeholder='Search...' name='selected_id' value=''>
                                            <div id='dropdown' class='dropdown-content'>
                                                <?php foreach ($staff_list as $sl) : ?>
                                                <div class='dropdown-item form-control' data-staff-id="<?php if (isset($sl['order_id'])): echo $sl['order_id'];
                                                                                                            endif ?>">
                                                    <?php if (isset($sl['staff_name'])): echo $sl['staff_name'];
                                                        endif ?>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </label>
                                    </div>


                                    <div class='col-md-5 d-none'>
                                        <label class='w-100 pb-3' for='name'>Order: <input type='text'
                                                name='order_old_id' class='form-control' value="<?php if (isset($order_id)): echo $order_id;
                                                                                                endif ?>"></label>
                                    </div>


                                    <?php if (isset($staff_image)): ?>

                                    <div class='col-md-3'>
                                        <img class='circle rounded'
                                            src="<?php echo base_url() . 'assets/image/' . $staff_image ?>"
                                            alt="<?php echo $staff_image ?>"
                                            style='width: 55px; margin: 3px 0px 0px 0px;' />
                                    </div>

                                    <?php endif ?>
                                </div>

                            </div>

                        </div>
                        <div class='card-footer'>
                            <a href='<?php echo base_url() . "get-stafflist" ?>' type='button'
                                class='btn btn-outline-danger mx-2'>Cancel</a>
                            <button type='submit' class='btn btn-outline-primary'>Save changes</button>


                        </div>
                    </form>

                </div>

            </div>

            <div class='col-sm-4 col-md-4 col-lg-4 py-3 mx-0 px-0'>
                <div class='card-header py-3'>
                    <h6 class="txt-blue"><b><i class="fas fa-bars"></i> Staff Category List</b></h6>
                </div>
                <div class='card-body border'>

                    <table class='table table-striped table-hover border'>
                        <thead>
                            <tr>
                                <th class="text-center">S.n</th>
                                <th>Title</th>
                                <th class="text-center ">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($staff_category as $sc): $i++ ?>
                            <tr>
                                <td class="text-center"><?php if (isset($i)): echo $i;
                                                            endif ?></td>
                                <td><?php if (isset($sc['staff_title'])): echo $sc['staff_title'];
                                        endif ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url() . 'admin/Mainadmin/delete_staff_category/' ?><?php if (isset($sc['staff_cat_id'])): echo $sc['staff_cat_id'];
                                                                                                                    endif ?>"
                                        class="btn btn-outline-danger px-2 py-1 m-1"><i class="fa fa-trash"></i></a>

                                </td>



                            </tr>

                            <?php endforeach ?>

                            <tr>

                            </tr>
                        </tbody>
                    </table>

                </div>


            </div>

        </div>
    </div>
</div>