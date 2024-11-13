<?php if (isset($topbar)): extract($topbar);
endif?>
<form action="<?=base_url() . 'admin/Mainadmin/save_footer/'?><?php if (isset($topbar_id)): echo $topbar_id;
endif?>" method="POST" enctype="multipart/form-data">

    <div class="card p-3">

        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Footer List</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/footer-list</a>
            </div>
        </div>
        <hr>

        <div class="col-2 row mb-2">
            <a class="btn btn-primary-outline border mx-2" href="<?php echo base_url() . 'footer-setup' ?>"><i
                    class="fas fa-arrow-right fa-3x pr-2"></i> Add footers</a>

        </div>
        <?php if (session('dlmsg')): ?>
        <small>

            <div class="alert alert-success p-2 mt-2">
                <b><?php echo session('dltmsg'); ?></b>
            </div>
        </small>
        <?php endif;?>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Footer title</th>
                        <th>Description</th>
                        <th>Order by</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
foreach ($footer_list as $fl): $i++?>
	                    <tr>
	                        <td><?php echo $i ?></td>

	                        <td><?php if (!empty('footer_id')): echo $fl['footer_title'];endif?></td>
	                        <td><?php if (!empty('footer_id')): echo $fl['footer_description'];endif?></td>
	                        <td><?php if (!empty('footer_id')): echo $fl['order_by'];endif?></td>
	                        <td>
	                            <a
	                                href="<?php echo base_url() . 'footer-setup/' ?><?php if (!empty('footer_id')): echo $fl['footer_id'];endif?>"><i
	                                    class="fa fa-edit text-success"></i></a>
	                            <a
	                                href="<?php echo base_url() . 'delete-footer/' ?><?php if (!empty('footer_id')): echo $fl['footer_id'];endif?>"><i
	                                    class="fa fa-trash text-danger"></i></a>

	                        </td>
	                    </tr>
	                    <?php endforeach?>
                </tbody>
            </table>

        </div>
    </div>
</form>