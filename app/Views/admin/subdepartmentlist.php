<div class="container">
    <h2>List of Sub Department</h2>
    <hr>
    <a class="btn btn-info" href="sub-department-setup">Add Sub-Department</a>
    <a class="btn btn-warning" href="doctors-setup">Add Doctor</a>
    <a class="btn btn-danger" href="department-setup">Add Department</a>
    <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif(session()->has('msg')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('error') ?? '' ?></p>
        </div>
        <?php endif; ?>
    <hr>

    <table class="table table-striped" id="myTable">

        <thead>
            <tr>
                <th class="p-2">S.N</th>
                <th>Department Name</th>
                <th>Sub Department Name</th>''
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; if(!empty($subdepartmentlist)): foreach($subdepartmentlist as $sdl): $i++; ?>

            <tr>
                <td class="p-2"><?=$i.'.'?></td>
                <td><?=$sdl['department_name']?></td>
                <td><?=$sdl['sub_department_name']?></td>

                <td>
                    <a class="btn btn-success" href="sub-department-setup?subdepartment_id=<?=($sdl['subdepartment_id']).'&title='.(createCustomSlug($sdl['sub_department_name']))?>">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-danger" href="delete-sub-department-item?subdepartment_id=<?=($sdl['subdepartment_id']).'&title='.(createCustomSlug($sdl['sub_department_name']))?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>

            <?php endforeach; endif?>
        </tbody>

    </table>
</div>