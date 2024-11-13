<div class="wrapper-body">
    <div class="container-fluid mx-auto px-0 featured-area">
        <div class="bread-holder">
            <div class="bread-con">
                <div class="container-fluid px-5 py-4">
                    <h5 class="page-title text-light px-1">Department Details</h5>
                    <ul class="bread-list d-flex px-1">
                        <li class="list-item">
                            <a href="<?= base_url() ?>"><b>Home</b></a>
                            <small><i class="fa fa-angle-double-right text-light px-2"></i></small>
                        </li>
                        <li class="list-item">
                            <a href="#"><b><?= $departmentName ?? '' ?></b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container-fluid">
            <div class="row border px-3 py-5">
                <div class="col-md-3 border">
                    <ul class="list-unstyled py-2 department">
                        <?php foreach ($departments ?? [] as $dep): ?>
                        <li class="w-100">
                            <a class="p-2 flex-button border mb-1 w-100  rounded <?= $request->getGet('department_id') == $dep['department_id'] ? 'active' : '' ?>"
                                href="get-doctors-of-department?department_id=<?= $dep['department_id'] ?>&title=<?= createCustomSlug($dep['department_name']) ?>">
                                <?= $dep['department_name'] ?>
                                <i class="fa fa-arrow-right border rounded-circle p-2"></i>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-md-9 border">
                    <?php if (!empty($allSubdepartment)): ?>
                    <div class="row border p-2 mx-0">
                        <?php foreach ($allSubdepartment as $allSub): ?>
                        <div class="col-md-4 subdepartment">
                            <a class="p-2 flex-button border mb-1 w-100  rounded-2 <?= $request->getGet('subdepartmentId') == $allSub['subdepartment_id'] ? 'active' : '' ?>"
                                href="get-doctors-of-department?department_id=<?= $allSub['department_name'] ?>&subdepartmentId=<?= $allSub['subdepartment_id'] ?>&title=<?= createCustomSlug($allSub['sub_department_name']) ?>">
                                <?= $allSub['sub_department_name'] ?>
                                <i class="fa fa-arrow-right border rounded-circle p-2"></i>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($subdepartmentDetails)): extract($subdepartmentDetails); ?>
                    <div class="col-12 border p-3">
                        <h3><?= $sub_department_name ?? '' ?></h3>
                        <hr>
                        <p>Head of Sub-Department: <?= $head_of_sub_department ?? '' ?></p>
                        <p>Contact Number: <?= $contact_number ?? '' ?></p>
                        <p>Description: <?= $department_description ?? '' ?></p>
                        <hr>
                    </div>
                    <?php endif; ?>

                    <div class="card-header mx-0 border p-2">
                        <h3>Our Doctors</h3>
                        <hr>
                        <div class="row mx-0 px-0 pb-5">
                            <?php foreach ($alldoctors ?? [] as $alldoc): ?>
                            <div class="col-md-3 mx-0 px-2">
                                <div class="card doctor-img-box">
                                    <img src="<?= base_url() . 'assets/uploads/' . ($alldoc['profilePicture']) ?>"
                                        class="card-img-top rounded-2 w-100 h-100 object-fit-fill" alt="Doctor Image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $alldoc['first_name'] . $alldoc['last_name'] ?? 'Doctor Name' ?></h5>
                                        <p class="card-text"><?= $alldoc['specialization'] ?? '' ?></p>
                                        <a class="border px-3 py-2 border-success rounded-2" href="">viewmore <i
                                                class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <?php foreach ($allsubdepartmentdoctors ?? [] as $allsubdepartdoc): ?>
                            <div class="col-md-3 mx-0 px-2">
                                <div class="card doctor-img-box">
                                    <img src="<?= base_url() . 'assets/uploads/' . ($allsubdepartdoc['profilePicture']) ?>"
                                        class="card-img-top rounded-2 w-100 h-100 object-fit-fill" alt="Doctor Image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $allsubdepartdoc['first_name'] . $allsubdepartdoc['last_name'] ?? 'Doctor Name' ?>
                                        </h5>
                                        <p class="card-text">
                                            <?= $allsubdepartdoc['specialization'] ?? 'specialization' ?>
                                        </p>
                                        <a class="border px-3 py-2 border-success rounded-2" href="">viewmore <i
                                                class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>