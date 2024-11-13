<?php if (isset($adminheader)): extract($adminheader);
endif?>

<div class="card m-2">

    <?php if (session()->has('success')): ?>
    <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
        <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
    </div>
    <?php elseif(session()->has('errors')): ?>
    <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
        <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
    </div>
    <?php endif; ?>
    <form action="<?php echo base_url() . 'save-header' ?>" method="POST" enctype="multipart/form-data">
        <div class="card-header">
            <div class="col row">
                <div class="col">
                    <h4 class="txt-blue"><b>Header Settings</b></h4>
                </div>
                <div class="col text-right">
                    <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/Header</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="card-body">
            <div class="col row">
                <div class="col-2">
                    <div class="frame">
                        <div class="center">
                            <div class="title">
                                <p>Drop or click here to upload</p>
                            </div>
                            <div class="dropzone">
                                <img id="llogo"
                                    src="<?php if (isset($left_logo)): echo base_url() . 'assets/uploads/' . $left_logo; else:echo "http://100dayscss.com/codepen/upload.svg";endif?>"
                                    class="upload-icon object-fit" />
                                <input id="imgInp" type="file" class="upload-input" name="left_logo" />
                                <input type="hidden" name="new_left_logo"
                                    value="<?php if (isset($left_logo)): echo $left_logo; endif?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="frame">
                        <div class="center">
                            <div class="title">
                                <p>Drop or click here to upload</p>
                            </div>

                            <div class="dropzone">
                                <img id="blah2" src="<?php if (isset($right_logo)) : echo  base_url().'assets/uploads/' . $right_logo;
                                                    else : echo "http://100dayscss.com/codepen/upload.svg";
                                                    endif ?>" class="upload-icon object-fit" />
                                <input id="imgInpp" type="file" class="upload-input" name="right_logo" />
                                <input type="hidden" name="new_right_logo" value="<?php if (isset($right_logo)) : echo $right_logo;
                                                                                    endif ?>" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">

                    <div class="col row py-2">

                        <div class="col">

                            <input class="form-control" type="text" placeholder="Province name"
                                value="<?php if (isset($province_name)) : echo $province_name;                                                                                                                            endif ?>"
                                name="province_name">
                        </div>
                        <div class="col">

                            <input class="form-control" type="text" placeholder="Ministry"
                                value="<?php if (isset($ministry)) : echo $ministry;                                                                                                                            endif ?>"
                                name="ministry">
                        </div>
                        <div class="col">

                            <input class="form-control" type="text" placeholder="निर्देशनालय"
                                value="<?php if (isset($nirdeshnalaya)): echo $nirdeshnalaya; endif?>"
                                name="nirdeshnalaya">
                        </div>


                    </div>
                    <div class="col row py-2">
                        <div class="col">

                            <input class="form-control" type="text" placeholder="कार्यालयको नाम || Office Name"
                                value="<?php if (isset($office_name)): echo $office_name; endif?>" name="office_name">
                        </div>
                        <div class="col">

                            <input class="form-control" type="text" placeholder="कार्यालयको ठेगाना || Office Location"
                                value="<?php if (isset($office_location)): echo $office_location; endif?>"
                                name="office_location">
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-success w-100" type="submit">Save++</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">

        </div>
    </form>
</div>