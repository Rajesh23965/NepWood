<?php if(!empty($popupById)): extract($popupById); endif ?>
<form action="<?php echo base_url() . 'save-popup' ?><?php if(!empty($popup_id)):echo '?popup_id='.$popup_id; endif?>"
    method="post" enctype="multipart/form-data">
    <div class="card p-3">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Popup Setup</b></h4>
            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/ticker</a>
            </div>
        </div>
        <hr>
        <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif(session()->has('errors')): ?>
        <div class="float-end alert notification alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
        </div>
        <?php endif; ?>

        <div class="col row">
            <div class="col row flex-row gap-0 align-item-center my-auto">
                <div class="col-7 mb-2">
                    <input class="form-control" type="text" name="poup_title" placeholder="Please enter title"
                        value="<?=$poup_title ?? ''?>">
                </div>
                <div class="col-5 mb-2">
                    <input id='feature_mage' class="form-control" type="file" name="popup_img" accept="image/*">
                </div>
                <div class="col-3 d-flex gap-3">
                    <span class="my-auto"> Width: </span>
                    <input class="form-control my-auto text-muted" type="number" name="popup_width"
                        placeholder="width e.g.600" value="<?=$popup_width ?? '600'?>">
                </div>
                <div class="col-3 d-flex gap-3">
                    <span class="my-auto"> Height: </span>
                    <input class="form-control my-auto text-muted" type="number" name="popup_height"
                        placeholder="Height e.g.700" value="<?=$popup_height ?? '700'?>">
                </div>
                <div class="col-3 d-flex bg-light align-items-center justify-content-between rounded-2">
                    <p for="" class="w-100 my-auto">Status</p>
                    <label class="switch my-auto">
                        <input type="checkbox"
                            <?php if(!empty($active_status) && $active_status == 1): echo "checked";  endif?>
                            name="active_status" value="1">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="col-2">
                    <button class="btn btn-danger" type="submit">Save++</button>
                </div>
            </div>

            <div class="col-1 bg-light align-item-center d-flex flex-row justify-content-center p-2 position-relative">
                <?php if(!empty($popup_img)):?>


                <?php $extension = pathinfo($popup_img, PATHINFO_EXTENSION);
                            if (in_array($extension, ['jpg', 'png', 'jpeg'])): ?>


                <img src="<?=(base_url('assets/uploads/')) . $popup_img ?? ''?>" alt="" style="width:50px;">
                <?php else:?>
                <a href="<?=(base_url('assets/uploads/')) . $popup_img ?? ''?>"><img class=""
                        src="<?=base_url().'assets/uploads/pdf.png'?>" alt="" style="width:50px; height:50px;"></a>
                <?php endif;?>
                <a class="position-absolute top-0 end-0 text-danger text-decoration-none"
                    title="Remove Image"><small>X</small></a>

                <?php endif?>
            </div>
        </div>
        <div class="col card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;foreach ($popuplist as $pl): $i++?>
                    <tr>
                        <td><?=$i . '.' ?? ''?></td>
                        <td>
                            <label class="switch my-auto popUpSwitch">
                                <input type="checkbox"
                                    <?=$pl['active_status'] && $pl['active_status'] == 1 ? 'checked' : ''?>
                                    name="btnactive_status" value="<?=$pl['popup_id'] ?? ''?>">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td><?=$pl['poup_title'] ?? ''?></td>
                        <td>
                            <?php $extension = pathinfo($pl['popup_img'], PATHINFO_EXTENSION);
                            if (in_array($extension, ['jpg', 'png', 'jpeg'])):
                            
                            ?>
                            <img src="<?=(base_url('assets/uploads/')) . $pl['popup_img'] ?? ''?>" alt=""
                                style="width:50px;">
                            <?php else:?>
                            <a href=""><img class="" src="<?=base_url().'assets/uploads/pdf.png'?>" alt=""
                                    style="width:50px; height:50px;"></a>
                            <?php endif;?>

                        </td>
                        <td>
                            <a href="<?=base_url('popup-setup?popupId=') . $pl['popup_id'] ?? ''?>"><i
                                    class="fa fa-edit text-success"></i></a>
                            <a href="<?=base_url('delete-popup?popupId=') . $pl['popup_id'] ?? ''?>"><i
                                    class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>

        </div>
    </div>
</form>