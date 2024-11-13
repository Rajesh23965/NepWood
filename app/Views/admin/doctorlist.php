<div class="container">
    <h2>Doctor List</h2>
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
                <th>Doctor Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Specialization</th>
                <th>Room number</th>
                <th>schedule</th>
                <th>Department</th>
                <th>Sud Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; if($doctorlist): foreach($doctorlist as $doc): $i++; ?>

            <tr>
                <td class="p-2"><?=$i.'.'?></td>
                <td><?=$doc['first_name'] ?? ''?>  <?=$doc['last_name'] ?? ''?></td>
                <td><?=$doc['email'] ?? ''?></td>
                <td><?=$doc['phone_number'] ?? ''?></td>
                <td><?=$doc['specialization'] ?? ''?></td>
                <td><?=$doc['room_number'] ?? ''?></td>
                <td><?=$doc['schedule'] ?? ''?></td>
                <td><?=$doc['department_name'] ?? ''?></td>
                <td><?=$doc['sub_department_name'] ?? ''?></td>

                <td>
                    <a class="btn btn-success" href="doctors-setup?doctor_id=<?=($doc['doctor_id']) ?? ''?>">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-danger" href="delete-doctor?doctor_id=<?=($doc['doctor_id']) ?? ''?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>

            <?php endforeach; endif?>
        </tbody>

    </table>
</div>