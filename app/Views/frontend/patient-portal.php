<div class='wrapper-body'>
    <div class="container-fluid mx-auto px-0 featured-area">
        <div class="bread-holder">
            <div class="bread-con">
                <div class=" container-fluid px-5  py-4">
                    <h5 class="page-title text-main h2 px-1">Patient-Portal</h5>
                    <ul class="bread-list d-flex px-1">
                        <li class="list-item"><a href="<?php echo base_url() ?>"><b>Home</b></a><small><i
                                    class="fa fa-angle-double-right text-light px-2"></i></small></li>
                        <li class="list-item"><a href="#"><b>Patient-Portal</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='content-section p-5 '>
        <div class='col-sm-12 col-md-12 col-lg-12 border-0 rounded-0 mt-3 py-4 bg-light'>
            <div class='row gx-0 gy-0'>
                <div class='col-sm-12 col-md-4 col-lg-3 mt-0 mx-auto'>
                    <div class='card test-btn-box shadow mx-auto'>

                        <div class='btn-img-box text-center'>
                            <img class="mx-auto" src="<?php echo base_url() . 'assets/uploads/Untitled.png' ?>" alt=''>

                        </div>
                        <div class='btn-title-box text-center'>
                            <h4 class='txt-blue'><b>View test Report</b></h4>
                            <p class='txt-blue pl-2'>How to View Online Report ?<br>
                                For report related issues<br>
                                Call : 977-1-5352421</p>

                        </div>
                        <div class='text-center'>
                            <a href='https://report.nphl.mavorion.com/'
                                class='btn btn-success w-50 mt-4 mb-5 py-2 bg-blue' target='_blank'>Click here <i
                                    class='fa fa-arrow-right'></i></a>

                        </div>

                    </div>
                </div>
                <div class='col-sm-12 col-md-8 col-lg-9'>
                    <div id='package' class="">
                        <div class='slideshow-container'>
                            <div class='row col-12'>
                                <section id="testPackageCarousel" class="splide" aria-label="Beautiful Images">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <?php if (!empty($packageTest)): ?>
                                            <?php foreach ($packageTest as $pt): ?>
                                            <?php
                                                    $incTest = !empty($pt['includedTest']) ? explode(',', $pt['includedTest']) : [];
                                                    ?>
                                            <li class="splide__slide">
                                                <div class="card shadow">
                                                    <div class="card-header packgeTitle">
                                                        <span
                                                            class="txt-blue"><?= htmlspecialchars($pt['categoryName'] ?? '') ?></span>
                                                    </div>
                                                    <div class="card-body m-0 p-0">
                                                        <div class="pckg-img-box">
                                                            <img src="<?= base_url('assets/uploads/' . ($pt['packageImage'] ?? '')) ?>"
                                                                alt="" />
                                                        </div>
                                                        <div class="pckg-test-box">
                                                            <ul>
                                                                <?php if (!empty($alltestList)): ?>
                                                                <?php foreach ($alltestList as $alt): ?>
                                                                <?php if ($alt['testName'] && in_array($alt['test_id'], $incTest)): ?>
                                                                <li><?= htmlspecialchars($alt['testName']) ?></li>
                                                                <?php endif; ?>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex flex-row justify-content-between">
                                                        <span>Price:</span>
                                                        <span><?= htmlspecialchars($pt['packagePrice'] ?? '') ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>

                                    </div>
                                </section>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>

        <div class='col-sm-12 col-md-12 col-lg-12 border-0 rounded mt-3 p-4 bg-light'>
            <div class='col-sm-12 col-md-12 col-lg-12 row mx-0 px-0'>
                <div class='col-sm-12 col-md-4 col-lg-3 border m-0 p-0'>
                    <div class='card-text card p-3 m-0 bg-main rounded-0 pb-1'>
                        <b class='text-light py-1'><i class='fa fa-calendar mr-2'></i> Office Routine</b>
                    </div>

                    <div class='container m-0 p-0'>
                        <div class='bg-light py-3 card rounded-0'>
                            <div class='col-12 mb-3'>
                                <h5 class='text-main ps-2 card-footer'><b>Collection Time: </b></h5>

                                <ul class='list-group px-2'>
                                    <li class='list-group-item rounded-0'>Sunday to Thursday:</li>
                                    <li class='list-group-item rounded-0'>8:00 AM – 2:00 PM
                                    </li>
                                    <li class='list-group-item rounded-0'>Friday: 8:00 AM – 12:00 PM</li>

                                    <li class='list-group-item rounded-0 txt-red'>Closed on Saturday & other public
                                        holidays</li>
                                </ul>
                            </div>
                            <div class='col-12 '>
                                <h5 class='text-main ps-2 card-footer'><b>Report Distribution Time: </b></h5>

                                <ul class='list-group px-2'>
                                    <li class='list-group-item rounded-0'>Sunday to Thursday:</li>
                                    <li class='list-group-item rounded-0'>9:30 AM – 4:00 PM

                                    </li>
                                    <li class='list-group-item rounded-0'>Friday: 9:30 AM – 2:00 PM</li>
                                    <li class='list-group-item rounded-0 txt-red'>Closed on Saturday & other public
                                        holidays</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class='col-sm-12 col-md-8 col-lg-9 '>
                    <div class='bg-blue text-light col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap gap-4'>
                        <div class='form-group mx-1 col-sm-6 col-md-4 col-lg-4 pt-2 pb-2'>
                            <select name="" id="" class="form-select text-muted onSelectDepartment">
                                <option value="all">--All--</option>
                                <?php if ($alldepartmentList): foreach ($alldepartmentList as $tdl): ?>
                                <option value="<?= $tdl['departmentId'] ?? '' ?>"><?= $tdl['departmentName'] ?? '' ?>
                                </option>
                                <?php endforeach;
                                endif ?>
                            </select>
                        </div>
                        <div class='form-group col-sm-6 col-md-7 col-lg-7 pt-2 pb-2'>
                            <!--<label for = ''><b> Test Name</b></label>-->
                            <input type='text' class='form-control' id='typedText' placeholder='Type to search...' />
                        </div>

                    </div>
                    <div class="testTable">
                        <table class='table table-striped table-hover'>
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Test Name</th>
                                    <th>Speciman</th>
                                    <th>Collection</th>
                                    <th>Reporting</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="customtestTable">

                                <?php $i = 0;
                                if (!empty($alltestList)) : foreach ($alltestList as $alltl): $i++ ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $alltl['testName'] ?? '-' ?></td>
                                    <td><?= $alltl['specimen'] ?? '-' ?></td>
                                    <td><?= $alltl['collection'] ?? '-' ?></td>
                                    <td><?= $alltl['reporting'] ?? '-' ?></td>
                                    <td><?= $alltl['testPrice'] ?? '-' ?></td>

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
</div>