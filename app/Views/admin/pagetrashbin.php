<div class="card bg-light">
    <div class="card-header position-relative">
        <div class="col row">
            <div class="col">
                <h5 class="text-danger">Recycle Bin</h5>

            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/trashbin-list</a>
            </div>
        </div>
        <?php if (session()->has('changemsg')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0  my-3 successMessage">
            <p class="m-0 p-1"><?=session('changemsg') ?? ''?></p>
        </div>
        <?php elseif (session()->has('dltmsg')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?=session('dltmsg') ?? ''?></p>
        </div>
        <?php endif;?>
    </div>

    <div class="card-body">
        <div class="py-2">
        <a href="<?=base_url() . 'view-all-page-list'?>" class="btn btn-outline-primary my-2">Back</a>
            <form action="<?=base_url() . 'delete-multiple-selected-page-permanenlty'?>" method="post">
                <input id="itemID" type="text" name="itemID" value="" hidden>
                <div class="d-flex flex-column">
                    
                    <div class="col p-0 m-0 d-flex gap-3 justify-content-between">
                        <div class="d-flex gap-3">
                            <select class="form-select" name="bulkAction" id="">
                                <option value="" hidden>Bulk Action</option>
                                <option value="1">Delete Permanently</option>
                                <option value="2">Restore</option>

                            </select>
                            <button type="submit" class="btn btn-outline-dark">Apply</button>
                        </div>
                        <div class="">
                            <a href="<?php echo base_url().'delete-all-page-permanently'?>" class="btn btn-outline-danger">Delete All</a>
                        </div>
                    </div>
                    <hr>

                </div>


            </form>
        </div>

        <table id="myTable" class="table table-striped border-right-1">
            <thead>
                <tr>
                    <th>
                        <input class="ml-1 selectAll" type="checkbox">
                    </th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>created on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getDeletePages as $pl): ?>
                <tr>
                    <td><input class="checkBoxClass selectItem" type="checkbox" class="ml-1 mr-2" value="<?php if (!empty($pl['pg_id'])): echo $pl['pg_id'];
endif?>"></td>
                    <td><?php if (!empty($pl['pg_id'])): echo $pl['page_title'];
endif?></td>
                    <td>ithome</td>
                    <td><?php if (!empty($pl['pg_id'])): if ($pl['page_status'] == 1): echo "<p class='text-success'>Active</p>";
    else:echo "<p class='text-danger'>Deactive</p>";
    endif;
endif?></td>
                    <td><?php if (!empty($pl['pg_id'])): echo $pl['added_on'];
endif?></td>
                    <td class="d-flex">

                        <a href="<?php echo base_url() . 'delete-page-permanently?page_id='.$pl['pg_id'] ?? '' ?>"><i
                                class="fa fa-trash border p-2 text-danger" title="Delete Page"></i></a>





                    </td>
                </tr>
                <?php endforeach?>

            </tbody>
        </table>

    </div>

</div>