
<?php if(!empty($linktoedit)): extract($linktoedit);  endif?>
<?php if (session()->has('success')): ?>
<div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
    <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
</div>
<?php elseif(session()->has('errors')): ?>
<div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
    <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
</div>
<?php endif; ?>
<form action="<?=base_url() . 'save-related-links'.((!empty($linkId)) ?'?linkId='.$linkId : '')?>" method="POST" enctype="multipart/form-data">
    <div class="card p-3 m-2">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Related Setup</b></h4>
            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/related-links</a>
            </div>
        </div>  
        <hr>
        
        <div class="col-lg-12 row">
            <div class="col-lg-5">
                <input type="text" class="form-control" placeholder="Enter Link title e.g Google" name="linkTitle" value="<?=$linkTitle ?? ''?>">
            </div>
            <div class="col-lg-5">
                <input type="text" class="form-control" placeholder="Enter Link url e.g https://google.com" name="linkUrl" value="<?=$linkUrl ?? ''?>">
            </div>

            <div class="col-lg-2">
                <input type="number" class="form-control" placeholder="Order" min="1" name="orderBy" value="<?=$orderBY ?? ''?>">
            </div>

        </div>        

        <div class="text-right p-3 m-3">
            <button class="btn btn-outline-success w-25" type="submit"><?=(!empty($linkId)) ? "SAVE CHANGES" : 'ADD++'?></button>
        </div>

        <div class="card-footer">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(!empty($listData)): $i=0; foreach($listData as $listData) : $i++?>
                    <tr>
                        <td><?= $i ?? ''?></td>
                        <td><?= $listData['linkTitle'] ?? ''?></td>
                        <td><?= $listData['linkUrl'] ?? ''?></td>
                        <td>
                            <a href="<?=base_url().'related-links-setup?linkId='.($listData['linkId'] ?? '')?>"><i class="fa fa-edit text-success"></i></a>
                            <a href="<?=base_url().'delete-link?linkId='.($listData['linkId'] ?? '')?>"><i class="fa fa-trash text-danger"></i></a>

                        </td>
                    </tr>
                <?php endforeach; else:?>
                    <tr><td colspan="4" class="text-center">No data Found</td></tr>
                <?php endif?>

                </tbody>
            </table>
        </div>
    </div>

</form>