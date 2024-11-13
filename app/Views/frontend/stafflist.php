<div class="wrapper-body">
    <div class="container-fluid mx-auto px-0 featured-area">
        <div class="bread-holder">
            <div class="bread-con">
                <div class=" container-fluid px-5  py-4">
                    <h5 class="page-title text-main h2 px-1">Our Team Members</h5>
                    <ul class="bread-list d-flex px-1">
                        <li class="list-item"><a href="<?php echo base_url() ?>"><b>Home</b></a><small><i
                                    class="fa fa-angle-double-right text-light px-2"></i></small></li>
                        <li class="list-item"><a href="#"><b>Staff List</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="custom-section py-5">
        <div class="col-sm-12 col-md-12 col-lg-12 mx-0 px-0 mb-3 card">
            <?php foreach ($staff_cat_list as $scl): ?>
            <div class="staff-title py-2 shadow">
                <h5><?php echo !empty($scl['staff_title']) ? $scl['staff_title'] : ''; ?></h5>
            </div>

            <div class="staff-grid-box py-2 bg-light">
                <?php foreach ($staff_list as $st):
                        if ($st['staf_category'] === $scl['staff_cat_id']):
                            $image_url = !empty($st['staff_image']) ? base_url() . 'assets/uploads/' . $st['staff_image'] : base_url() . 'assets/uploads/no_image.jpg';
                    ?>
                <?php if ($scl['staff_cat_id'] == 1 || $scl['staff_cat_id'] == 2): ?>
                <div class="col p-3 cw-20">
                    <div class="card card-block shadow staffcard">
                        <div class="staff-image-box">
                            <img class="w-100" src="<?php echo $image_url; ?>" alt="Photo of staff">
                        </div>
                        <div class="staff-details-box">
                            <span class="my-3 txt-blue"><b><?php echo htmlspecialchars($st['staff_name']); ?></b></span>
                            <p class="staff-card-text"><?php echo htmlspecialchars($st['staf_speciyalities']); ?></p>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="col-sm-12 col-md-12 col-lg-12 staff-detail-box mt-3">
                    <div class="staff-card-text">
                        <div class="tech-title">
                            <span><?php echo htmlspecialchars($st['staff_name']); ?></span>
                        </div>
                        <div class="tech-desc">
                            <span><?php echo htmlspecialchars($st['staf_speciyalities']); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif;
                    endforeach; ?>
            </div>
            <?php endforeach ?>
        </div>
    </section>
</div>