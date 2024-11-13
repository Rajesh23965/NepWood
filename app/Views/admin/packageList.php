<?php if (!empty($testDetailsById)): extract($testDetailsById);
endif ?>
<div class='container '>
    <div class='card bg-light'>
        <div class='card-header'>
            <div class='col row'>
                <div class='col'>
                    <h5><b>Added Package List</b></h5>
                </div>
                <div class='col-3 text-right'>
                    <a href=''><i class='fas fa-arrow-right fa-3x'></i> Home >> test-package-list</a>
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
                        <a href="<?php echo base_url() . 'manage-package' ?>" type='button'
                            class='btn btn-outline-primary w-100'>Add Package <i class="fa fa-eye"></i></a>
                    </div>

                </div>

            </div>
            <div class='col-sm-8 col-md-12 col-lg-12 p-3'>

                <div class='card-header py-3'>
                    <h6 class="txt-blue"><b> <i class="fas fa-bars"></i> Package List</b></h6>
                </div>
                <div class='card-body border'>

                    <table class="table table-striped table-hovered">

                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Package Title</th>
                                <th>Included test</th>
                                <th>Package Image</th>
                                <th>Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            if (!empty($packageTestList)): foreach ($packageTestList as $pckList): $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $pckList['categoryName'] ?? '' ?></td>
                                        <td><?= $pckList['includedTest'] ?? '' ?></td>
                                        <td><?= $pckList['packageImage'] ?? '' ?></td>
                                        <td><?= $pckList['packagePrice'] ?? '' ?></td>
                                        <td>
                                            <a class="fa fa-edit text-success ps-1"
                                                href="manage-package<?= !empty($pckList['id']) ? '?packageId=' . $pckList['id'] : '' ?>"></a>
                                            <a class="fa fa-trash text-danger ps-1" href=""></a>

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