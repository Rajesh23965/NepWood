<?php if(!empty($previousData)): extract($previousData); endif?>
<div class="container">
    <h2>Sub Department</h2>
    <hr>
    <a class="btn btn-warning" href="doctors-setup">Add Doctor</a>
    <a class="btn btn-danger" href="sub-department-list">Sub-Department List</a>
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

    <form class="row" action="<?=base_url().'save-sub-department'?><?=!empty($subdepartment_id) ? '?subdepartment_id='.$subdepartment_id : ''?>" method="POST">
        <div class="col-md-12 form-group row">
            <div class="col-md-10">
                <input class="form-control" type="text" id="department_name" name="sub_department_name"
                    placeholder="Sub Department Name" required value="<?=$sub_department_name ?? ''?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-success w-100">submit</button>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="form-group col-md-4">
                <select class="form-select" name="department_name" id="">
                    <option hidden>Select Department</option>
                    <?php if(!empty($department)):?>
                    <?php foreach($department as $department):?>
                        <option value="<?=$department['department_id'] ?? ''?>" <?php if(!empty($department_name) && ($department_name === $department['department_id'])): echo "Selected"; endif?>><?=$department['department_name'] ?? ''?>
                        </option>
                        <hr>
                    <?php endforeach; endif?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <input class="form-control" type="text" id="head_of_sub_department_name" name="head_of_sub_department"
                    placeholder="Head of Sub-Department Name" value="<?=$head_of_sub_department ?? ''?>">
            </div>
            <div class="form-group col-md-4">
                <input class="form-control" type="text" id="contact_number" name="contact_number"
                    placeholder="Contact Number" value="<?=$contact_number ?? ''?>">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="department_description" rows="3"><?=$department_description ?? ''?></textarea>
        </div>

    </form>
</div>