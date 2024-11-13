<?php if (!empty($category)): extract($category);
endif ?>

<div class="wrapper-body">
    <div class="container-fluid mx-auto px-0 featured-area"
        style="background: url('<?php echo base_url() . 'assets/uploads/bg.jpg' ?>')">
        <div class="bread-holder ">
            <div class="bread-con">
                <div class="container-fluid  px-5 py-4">
                    <h5 class="page-title text-main"><?php if (isset($cat_name)) {
                                                            echo $cat_name;
                                                        } ?></h5>
                    <ul class="bread-list d-flex px-0">
                        <li class="list-item"><a class="text-red"
                                href="<?php echo base_url() ?>"><b>Home</b></a><small><i
                                    class="fa fa-angle-double-right px-2 text-red"></i></small></li>
                        <li class="list-item"><a class="text-red" href="#"><b><?php if (isset($cat_name)): echo $cat_name;
                                                                                endif ?></b></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <section class="content-section row py-3">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="border p-2 my-5">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="txt-red card-title">
                            <th class="text-center">S.n</th>
                            <th>Title</th>
                            <th class="text-center">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($get_post_by_category_id)): ?>
                            <?php $i = 0;
                            foreach ($get_post_by_category_id as $gplbi): $i++ ?>
                                <tr>
                                    <td class="pl-2 text-center text-dark"><?php echo convertToNepaliNumerals($i) . '.'; ?></td>
                                    <td>
                                        <span class="card-title"><a class="text-main"
                                                href="<?php if (!empty($gplbi['post_id'])): echo base_url() . 'post?id=' . $gplbi['post_id'] . '&title=' . $gplbi['slug'];
                                                        endif ?>"><?php if (!empty($gplbi['post_title'])): echo $gplbi['post_title'];
                                                                    endif ?></a></span>
                                    </td>
                                    <td class="text-dark text-center">
                                        <?php if (!empty($gplbi['downloadable_file'])): ?>

                                            <a class="" href="<?php if (!empty($gplbi['downloadable_file'])): echo base_url() . 'assets/uploads/' . $gplbi['downloadable_file'];
                                                                endif ?>"><i class="fa fa-download text-main "></i></a>
                                        <?php else: ?>
                                            <a class="text-dark" href="<?php if (!empty($gplbi['post_id'])): echo base_url() . 'post?id=' . $gplbi['post_id'] . '&title=' . $gplbi['slug'];
                                                                        endif ?>"><i class="fa fa-eye"></i></a>

                                        <?php endif ?>

                                    </td>
                                </tr>
                            <?php endforeach ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center"><b>No data Found</b></td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="border p-2 my-5">
                <!-- <h4 class=" text-success ">हलका कार्क्रम</h4> -->
                <hr class="m-0 p-0">
                <ul class=" list-unstyled list-group-item p-1">
                    <?php foreach ($category_list as $cl): ?>
                        <li class=" list-group-item-light py-2">
                            <a class="catList"
                                href="<?= $cl['cat_id'] ? base_url('category') . '?id=' . $cl['cat_id'] . '&title=' . $cl['cat_name'] : '' ?>"><?= $cl['cat_name'] ? '<i class="fa fa-hand-point-right pe-2"></i>' . $cl['cat_name'] : '' ?></a>
                        </li>
                        <hr class="m-0 p-0">

                    <?php endforeach ?>
                </ul>
            </div>


        </div>

    </section>