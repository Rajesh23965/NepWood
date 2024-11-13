<div class="wrapper-body">
    <div class="container-fluid mx-auto px-0 featured-area">
        <div class="bread-holder">
            <div class="bread-con">
                <div class=" container-fluid px-5  py-4">
                    <h5 class="page-title text-main h2 px-1">Complaint and Feedback</h5>
                    <ul class="bread-list d-flex px-1">
                        <li class="list-item"><a href="<?php echo base_url() ?>"><b>Home</b></a><small><i
                                    class="fa fa-angle-double-right text-light px-2"></i></small></li>
                        <li class="list-item"><a href="#"><b>complaint-feedback</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid d-flex col-sm-12 col-md-6 col-lg-12 bg-light p-3 mt-3">
        <div class="col-sm-12 col-md-5 col-lg-5 ">
            <div class="container border py-4 bg-white">
                <h2 class="txt-red">Complaint and Feedback Form</h2>
                <hr class="pb-2 pt-2">
                <form action="<?php echo base_url() . 'Home/save_feedback' ?>" method="post" id="feedbackForm">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name"><br>

                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email"><br>

                    <label for="subject">Subject:</label>
                    <input class="form-control" type="text" id="subject" name="subject"><br>

                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" rows="5" cols="50"></textarea><br><br>

                    <input type="text" disabled class="form-control captch_preview captchaBox" name="random_captcha"
                        id="random_captcha">

                    <label for="" class="d-flex">
                        <input class="form-control text-muted" type="text" name="captchaBox" id="captchaBox"
                            placeholder="Enter Captacha Here">
                        <i class="fas fa-refresh border p-2 pointer" id="refresh"></i>
                    </label>

                    <input class="form-control" type="submit" value="Submit">
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-7 ">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex border py-4 bg-white">
                <div class=" col-sm-12 col-md-6 col-lg-6 text-center">
                    <div class="address-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="font-weight-bold txt-blue">Our location</span>
                        <span>Teku, Kathmandu, Nepal</span>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 text-center">
                    <div class="address-box">
                        <i class="fas fa-blender-phone"></i>
                        <span class="font-weight-bold txt-blue">Our Phone / email</span>
                        <span>+977-1-5352421 || nphl@nphl.gov.np</span>
                    </div>
                </div>


            </div>


            <div class="col-sm-12 col-md-12 col-lg-12 bg-white border">
                <div style="max-width:100%;overflow:hidden;color:red;width:867px;height:414px;">
                    <div id="my-map-display" style="height:100%; width:100%;max-width:100%;"><iframe
                            style="height:100%;width:100%;border:0;" frameborder="0"
                            src="https://www.google.com/maps/embed/v1/place?q=National+Public+Health+Laboratory,+Tripura+Marg,+Kathmandu,+Nepal&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                    </div><a class="googlecoder" href="https://www.bootstrapskins.com/themes" id="get-map-data">premium
                        bootstrap themes</a>
                    <style>
                        #my-map-display img.text-marker {
                            max-width: none !important;
                            background: none !important;
                        }

                        img {
                            max-width: none
                        }
                    </style>
                </div>


            </div>
        </div>
    </div>
</div>