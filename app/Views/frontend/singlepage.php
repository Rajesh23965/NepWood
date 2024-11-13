<?php if (!empty($singlePage)): extract($singlePage);
endif ?>

<section class="wrapper-body px-0">
    <div class="container-fluid mx-auto px-0 featured-area">
        <div class="bread-holder">
            <div class="bread-con">
                <div class=" container-fluid px-5  py-4">
                    <h5 class="page-title text-main h2 px-1"><?= $page_title ?? '' ?></h5>
                    <ul class="bread-list d-flex px-1">
                        <li class="list-item"><a href="<?php echo base_url() ?>"><b>Home</b></a><small><i
                                    class="fa fa-angle-double-right text-light px-2"></i></small></li>
                        <li class="list-item"><a href="#"><b><?= $page_title ?? '' ?></b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-section p-5">
        <div class="col-sm-12 col-md-12 col-lg-12 pt-4">
            <div class="px-2 bg-banner py-4 border my-2">
                <div class="col-sm-12 col-md-12 col-lg-12 ps-3">
                    <?= $page_desc ?? '' ?>
                </div>
            </div>
        </div>
    </div>
</section>