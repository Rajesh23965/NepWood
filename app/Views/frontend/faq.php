<div class="container-fluid">
    <div class="container m-auto">
        <div class="faq-box text-center py-5">
            <span class="faq-title-box"><strong>Do You Have Questions?</strong></span><br>
            <span class="faq-desc-box">We have answers (well, most of the times!)</span><br>
            <img src="<?php echo base_url() . 'assets/uploads/faq.png' ?>" alt="" width="200px">
            <hr>
        </div>


        <div class="container mb-5">
            <div class="col-sm-12 col-md-12 col-lg-12 row">
                <div class="col-sm-6 col-md-6 col-lg-6 p-2 border card">
                    <div class="card-header bg-main text-light">
                        <h6><b><i class="fa fa-bars"></i> Billing</b></h6>
                    </div>
                    <div class="accordion pt-2" id="accordionExample">
                        <?php $i = 0;
                        foreach ($faq_list as $fq): $i++;
                            if ($fq['faq_category'] == 1): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php if ($i > 1): echo 'collapsed';
                                                                        endif ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?php if ($fq['faq_id']): echo 'collapsed' . $fq['faq_id'];
                                                                                        endif ?>" aria-expanded="true"
                                    aria-controls="<?php if ($fq['faq_id']): echo 'collapsed' . $fq['faq_id'];
                                                            endif ?>">
                                    <?php if (isset($fq['faq_title'])): echo $fq['faq_title'];
                                            endif ?>
                                </button>
                            </h2>
                            <div id="<?php if ($fq['faq_id']): echo 'collapsed' . $fq['faq_id'];
                                                endif ?>" class="accordion-collapse collapse <?php if ($i == 1): echo 'show';
                                                                                                endif ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php if (isset($fq['faq_description'])): echo $fq['faq_description'];
                                            endif ?>

                                </div>
                            </div>
                        </div>
                        <?php endif;
                        endforeach ?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 p-2 border card">
                    <div class="card-header bg-main text-light">
                        <h6><b><i class="fa fa-bars"></i> Collection</b></h6>
                    </div>
                    <div class="accordion pt-2" id="accordionExample">
                        <?php $i = 0;
                        foreach ($faq_list as $fq): $i++;
                            if ($fq['faq_category'] == 2): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php if ($i > 2): echo 'collapsed';
                                                                        endif ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?php if ($fq['faq_id']): echo 'collapsed' . $fq['faq_id'];
                                                                                        endif ?>" aria-expanded="true"
                                    aria-controls="<?php if ($fq['faq_id']): echo 'collapsed' . $fq['faq_id'];
                                                            endif ?>">
                                    <?php if (isset($fq['faq_title'])): echo $fq['faq_title'];
                                            endif ?>
                                </button>
                            </h2>
                            <div id="<?php if ($fq['faq_id']): echo 'collapsed' . $fq['faq_id'];
                                                endif ?>" class="accordion-collapse collapse <?php if ($i == 2): echo 'show';
                                                                                                endif ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php if (isset($fq['faq_description'])): echo $fq['faq_description'];
                                            endif ?>

                                </div>
                            </div>
                        </div>
                        <?php endif;
                        endforeach ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>