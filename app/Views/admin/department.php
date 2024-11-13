<?php if(!empty($previousData)): extract($previousData); endif?>
<div class="container">
    <h2>Department</h2>
    <hr>
    <a class="btn btn-info" href="sub-department-setup">Add Sub-Department</a>
    <a class="btn btn-warning" href="doctors-setup">Add Doctor</a>
    <a class="btn btn-danger" href="department-list">Department List</a>
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

    <form action="<?= base_url() . 'save-department' . (!empty($department_id) ? '?department_id='.$department_id : '') ?>" method="POST">
        <div class="form-group d-flex flex-row align-items-end gap-2 pe-2">
            <span class="col-10">
                <label for="department_name">Department Name:</label>
                <input class="form-control" type="text" id="department_name" name="department_name" value="<?=$department_name ?? ''?>" required>
            </span>
            <button type="submit" class="btn btn-outline-success col-2">submit</button>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="department_description" rows="3"><?=$department_description ?? ''?></textarea>
        </div>

    </form>
</div>