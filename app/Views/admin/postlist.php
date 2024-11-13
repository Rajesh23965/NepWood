<div class="card">
    <div class="card-header">
        <div class="col row">
            <div class="col">
                <h5>Post list</h5>
            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/vew-post-list</a>
            </div>
        </div>
        <hr>
    </div>
    <div class="card-body">
        <div class="py-2">
            <form action="<?=base_url().'delete-multiple-post'?>" method="post">
                <input id="itemID" type="text" name="itemID" value="" hidden>
                <div class="d-flex flex-column">
                    <div class="d-flex gap-1 flex-row">

                        <?php if(!empty($postList)):echo '<span>All('.count($postList).')</span>'; endif?>

                        <?php if(!empty($published)):echo '<span>|</span> <span>Published('.count($published).')</span>'; endif?>

                        <?php if(!empty($unpublished)):echo '<span>|</span><span>Unpublished('.count($unpublished).')</span>'; endif?>

                        <?php if(!empty($getDeletedItem)):echo '<span>|</span><a href="'.base_url().'deleted-posts">Trash('.count($getDeletedItem).')</a>'; endif?>
                    </div>
                    <hr>
                    <div class="col-3 p-0 m-0 d-flex gap-3">
                        <select class="form-select" name="bulkAction" id="">
                            <option value="" hidden>Bulk Action</option>
                            <option value="1">Move to trash</option>
                        </select>
                        <button type="submit" class="btn btn-outline-dark">Apply</button>
                    </div>
                    <hr>

                </div>


            </form>
        </div>
        <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
        <?php elseif(session()->has('msg')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('msg') ?? '' ?></p>
        </div>
        <?php endif; ?>
        <table id="myTable" class="table table-striped border-right-1">
            <thead>
                <tr>
                    <th>
                        <input class="ml-1" type="checkbox">
                    </th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>created on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($postList as $pl) : ?>
                <tr>
                    <td><input type="checkbox" class="ml-1 checkBoxClass" value="<?php if (!empty($pl['post_id'])) : echo $pl['post_id'];
                                                                        endif ?>"></td>


                    <td><?php if (!empty($pl['post_title'])) : echo $pl['post_title'];
                            endif ?></td>
                    <td><?php if (!empty($pl['post_caty_id'])) :

                                $arr = explode(",", $pl['post_caty_id']);

                                foreach ($categoryList as $caty) {

                                    if (in_array($caty['cat_id'], $arr)) {

                                        echo $caty['cat_name'] . ', ';
                                    }
                                }

                            else: echo "Uncategories";


                            endif ?></td>
                    <td>user</td>
                    <td><?php if (isset($pl['status_id'])) : if ($pl['status_id'] == '1') : echo "<p class='text-success'>Active</p>";
                                else : echo "<p class='text-danger'>Inactive</p>";
                                endif;
                            endif ?></td>
                    <td><?php if (!empty($pl['added_on'])) : echo $pl['added_on'];
                            endif ?></td>
                    <td class="d-flex">
                        <a href="<?php echo base_url() . 'edit-post/' ?><?php if (!empty($pl['post_id'])) : echo $pl['post_id'];
                                                                                endif ?>"><i
                                class="fa fa-edit border p-2 text-success mr-1" title="Edit Page"></i></a>


                        <a href="<?php echo base_url() . 'delete-post/' ?><?php if (!empty($pl['post_id'])) : echo $pl['post_id'];
                                                                                            endif ?>"><i
                                class="fa fa-trash border p-2 text-danger" title="Delete Page"></i></a>


                        <a class="<?php if (($pl['status_id']) == 1) : echo "d-block";
                                        else : echo "d-none";
                                        endif ?> mr-1"
                            href="<?php echo base_url() . 'deactivate-post/' ?><?php if (isset($pl['post_id'])) : echo $pl['post_id'];
                                                                                                                    endif ?>"><i
                                class="fas fa-eye-slash border p-2 text-warning" title="Dactivate page"></i></a>


                        <a class="<?php if (($pl['status_id']) == 0) : echo "d-block";
                                        else : echo "d-none";
                                        endif ?>"
                            href="<?php echo base_url() . 'activate-post/' ?><?php if (isset($pl['post_id'])) : echo $pl['post_id'];
                                                                                                            endif ?>"><i
                                class="fas fa-eye border p-2 text-info" title="Activate page"></i></a>



                    </td>
                </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>

</div>