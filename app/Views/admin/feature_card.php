<?php
if (!empty($featured_card)) {


    extract($featured_card);
}

?>
<div class="col card p-3">
    <div class="col row">
        <div class="col">
            <h4 class="txt-blue"><b>Featured Card Setup</b></h4>
        </div>
        <div class="col text-right">

            <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/featured-card</a>
        </div>
    </div>
    <hr>


    <div class="card-body">

        <form action="<?php echo base_url() . 'admin/Mainadmin/save_featured_card' ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <h3 class="m-0 p-0 my-2">Featured Title</h3>
                <input class="form-control" type="text" placeholder="Please enter title here" name="featured_title" value="<?php if (!empty($featured_title)) : echo $featured_title;
                                                                                                                            endif ?>">

            </div>
            <hr>
            <div class="col row">
                <div class="col-6 border form-group">
                    <label for="">First Card</label>
                    <hr>
                    <input class="form-control mb-1" type="text" name="first_title" placeholder="First Title" value="<?php if (!empty($first_title)) : echo $first_title;
                                                                                                                        endif ?>">
                    <input class="form-control mb-1" type="file" name="first_icon">
                    <input type="hidden" name="updated_first_icon" value="<?php if (!empty($first_icon)) : echo $first_icon;
                                                                            endif ?>">
                    <textarea id="" cols="10" rows="10" name="first_desc"><?php if (!empty($first_desc)) : echo $first_desc;
                                                                                    endif ?></textarea>
                </div>
                <div class="col-6 border form-group">
                    <label for="">Second Card</label>
                    <hr>
                    <input class="form-control mb-1" type="text" name="second_title" placeholder="second Title" value="<?php if (!empty($second_title)) : echo $second_title;
                                                                                                                        endif ?>">
                    <input class="form-control mb-1" type="file" name="second_icon">
                    <input type="hidden" name="updated_second_icon" value="<?php if (!empty($second_icon)) : echo $second_icon;
                                                                            endif ?>">
                    <textarea id="" cols="10" rows="10" name="second_desc"><?php if (!empty($sec_desc)) : echo $sec_desc;
                                                                                    endif ?></textarea>
                </div>
            </div>
            <div class="col row">
                <div class="col-6 border form-group">
                    <label for="">Third Card</label>
                    <hr>
                    <input class="form-control mb-1" type="text" name="third_title" placeholder="third Title" value="<?php if (!empty($third_title)) : echo $third_title;
                                                                                                                        endif ?>">
                    <input class="form-control mb-1" type="file" name="third_icon" >
                    <input type="hidden" name="updated_third_icon" value="<?php if (!empty($third_icon)) : echo $third_icon;
                                                                                            endif ?>">
                    <textarea id="" cols="10" rows="10" name="third_desc"><?php if (!empty($third_desc)) : echo $third_desc;
                                                                                    endif ?></textarea>
                </div>
                <div class="col-6 border form-group">
                    <label for="">Fourth Card</label>
                    <hr>
                    <input class="form-control mb-1" type="text" name="fourth_title" placeholder="fourth Title" value="<?php if (!empty($fourth_title)) : echo $fourth_title;
                                                                                                                        endif ?>">
                    <input class="form-control mb-1" type="file" name="fourth_icon">
                    <input type="hidden" name="updated_fourth_icon" value="<?php if (!empty($fourth_icon)) : echo $fourth_icon;
                                                                            endif ?>">
                    <textarea id="" cols="10" rows="10" name="fourth_desc"><?php if (!empty($fourth_des)) : echo $fourth_des;
                                                                                    endif ?></textarea>
                </div>
            </div>
            <div class="col row">

                <div class="col-6 border form-group">
                    <label for="">Fifth Card</label>
                    <hr>
                    <input class="form-control mb-1" type="text" name="fifth_title" placeholder="fifth Title" value="<?php if (!empty($fifth_title)) : echo $fifth_title;
                                                                                                                        endif ?>">
                    <input class="form-control mb-1" type="file" name="fifth_icon">
                    <input type="hidden" name="updated_fifth_icon"  value="<?php if (!empty($fifth_icon)) : echo $fifth_icon;
                                                                                    endif ?>">
                    <textarea id="" cols="10" rows="10" name="fifth_desc"><?php if (!empty($fifth_desc)) : echo $fifth_desc;
                                                                                    endif ?></textarea>
                </div>
            </div>

            <div class="col row text-right">
                <button class="btn btn-primary w-25 float-right">save</button>
            </div>
        </form>






    </div>
</div>
</div>