<?php
if (!empty($previousData)): extract($previousData);
endif ?>
<div class="container p-2">
    <h3>Doctor Details</h3>
    <hr>
    <a href="get-doctor-list" class="btn btn-success">Doctor List</a>
    <a href="sub-department-setup" class="btn btn-danger">Sub Department</a>
    <?php if (session()->has('success')): ?>
    <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
        <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
    </div>
    <?php elseif (session()->has('error')): ?>
    <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2">
        <p class="m-0 p-1"><?= session('error') ?? '' ?></p>
    </div>
    <?php endif; ?>
    <hr>
    <form action="/save-doctor<?= !empty($doctor_id) ? '?doctor_id=' . $doctor_id : '' ?>" method="POST"
        enctype="multipart/form-data">
        <div class="col-md-12 row">
            <div class="form-group col-md-3">
                <label for="first_name">First Name:</label>
                <input class="form-control" type="text" id="first_name" name="first_name" required
                    value="<?= $first_name ?? '' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="last_name">Last Name:</label>
                <input class="form-control" type="text" id="last_name" name="last_name" required
                    value="<?= $last_name ?? '' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" required value="<?= $email ?? '' ?>">
            </div>
            <div class="form-group col-md-3 d-flex flex-column align-items-end justify-content-end">
                <button class="btn btn-success w-100" type="submit" class="submit-btn">submit +</button>
            </div>
            <div class="form-group col-md-3">
                <label for="phone_number">Phone Number:</label>
                <input class="form-control" type="tel" id="phone_number" name="phone_number" required
                    value="<?= $phone_number ?? '' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="specialization">Specialization:</label>
                <input class="form-control" type="text" id="specialization" name="specialization" required
                    value="<?= $specialization ?? '' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="department_id">Department:</label>
                <select class="form-select" id="department_id" name="department_id">
                    <option value="">Select Department</option>
                    <?php if (!empty($department)): foreach ($department as $dep): ?>

                    <option value="<?= $dep['department_id'] ?? '' ?>"
                        <?= (!empty($department_id) && ($dep['department_id'] == $department_id)) ? 'Selected' : '' ?>>
                        <?= $dep['department_name'] ?? '' ?>
                    </option>
                    <?php endforeach;
                    endif ?>


                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="sub_department_id">Sub-Department:</label>
                <select class="form-select" id="sub_department_id" name="sub_department_id">
                    <option hidden>Select Sub-Department</option>
                    <?php if (!empty($subdepartment)): foreach ($subdepartment as $subd): ?>

                    <option value="<?= $subd['subdepartment_id'] ?? '' ?>"
                        <?= (!empty($subdepartment_id) && ($subd['subdepartment_id'] == $subdepartment_id)) ? 'Selected' : '' ?>>
                        <?= $subd['sub_department_name'] ?? '' ?>
                    </option>
                    <?php endforeach;
                    endif ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="room_number">Room Number:</label>
                <input class="form-control" type="text" id="room_number" name="room_number"
                    value="<?= $room_number ?? '' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="room_number">Profile Picture:</label>
                <input class="form-control" type="file" id="room_number" name="profilephoto">
            </div>

            <div class="form-group col-md-3">

                <div class="doctor p-2">
                    <?php if (!empty($profilePicture)): ?>
                    <img class="object-fit-cover w-100 h-100 department"
                        src="<?= base_url() . 'assets/uploads/' . ($profilePicture ?? '') ?>" alt="">
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="schedule">Description:</label>
                <textarea id="schedule" name="schedule" rows="3"><?= $schedule ?? '' ?></textarea>
            </div>

        </div>
    </form>
</div>