<?php
if (!empty($edit_tab)) {

    extract($edit_tab);
}
?>
<form action="<?php echo base_url() . 'save-tab-details/' ?><?php if (!empty($tab_id)): echo $tab_id;
                                                            endif ?>" method="post" enctype="multipart/form-data">

    <div class="card p-3">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Tabs Setup</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/tabs-setup</a>
            </div>
        </div>
        <hr>
        <div class="card">

            <?php if (session()->has('success')): ?>
                <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
                    <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
                </div>
            <?php elseif (session()->has('errors')): ?>
                <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
                    <p class="m-0 p-1"><?= session('errors') ?? '' ?></p>
                </div>
            <?php endif; ?>
            <div class="card-body col row">
                <div class="form-group col">
                    <label for="input" class="col control-label">Order</label>
                    <div class="col">
                        <input type="number" name="order_by" id="input" class="form-control" value="<?php if (!empty($tab_id)): echo $order_by;
                                                                                                    endif ?>" required="required" title="Enter order number"
                            placeholder="Enter order number" min="1">
                    </div>
                </div>
                <div class="form-group col">

                    <label for="input" class="col control-label">Tabs Item</label>

                    <div class="col">
                        <input type="text" name="tab_items" id="input" class="form-control" value="<?php if (!empty($tab_id)): echo $tab_items;
                                                                                                    endif ?>" required="required" title="Enter tab name" placeholder="Enter Tab Name">
                    </div>
                </div>

                <div class="form-group col">
                    <label for="input" class="col control-label">Tabs Icon</label>
                    <div class="col">
                        <select name="tab_icon" id="" class="form-control">
                            <option value="" hidden>Select icon...</option>
                            <?php foreach ($icon_list as $icl): ?>
                                <option value="<?php if (!empty($icl['icon_class'])): echo $icl['icon_class'];
                                                endif ?>" <?php if (!empty($icl['icon_class']) && !empty($tab_icon) && $icl['icon_class'] == $tab_icon): echo 'Selected';
                                                            endif ?>>
                                    <label for="">
                                        <?php if (!empty($icl['icon_class'])): echo $icl['icon_class'];
                                        endif ?>
                                    </label>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col">
                    <label for="input" class="col control-label">Category List</label>
                    <div class="col">

                        <select name="category" id="inputcategory" class="form-control text-muted" required="required">
                            <option value="" hidden>--Select Category--</option>
                            <?php if (!empty($category_list)): ?>
                                <?php foreach ($category_list as $cat_list): ?>
                                    <option value="<?php echo isset($cat_list['cat_id']) ? $cat_list['cat_id'] : ''; ?>"
                                        <?php if (!empty($category_id) && $cat_list['cat_id'] == $category_id) {
                                            echo "selected";
                                        }
                                        ?>>
                                        <?php echo isset($cat_list['cat_name']) ? $cat_list['cat_name'] : ''; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                    </div>
                </div>

                <div class="form-group col d-flex gap-2 my-auto">
                    <label for="input" class="col control-label"></label>
                    <div class="col my-auto ">
                        <button class="btn btn-outline-success">Save++</button>
                    </div>

                    <div class="col my-auto ">
                        <a href="<?= base_url() . 'tabs-setup' ?>" class="btn btn-outline-danger">cancel</a>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class="col mx-0 px-0 py-2">
                    <h4 class="txt-blue"><b>Tabs List</b></h4>
                </div>


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Tabs Item</th>
                            <th>Selected category</th>
                            <th>Order by</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        if (!empty($tabs_list)): ?>
                            <?php foreach ($tabs_list as $tl): ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php if (!empty($tl['tab_id'])): echo '<i class="fa fa-' . $tl['tab_icon'] . '"></i> ' . $tl['tab_items'];
                                        endif; ?>
                                    </td>
                                    <td><?php if (!empty($tl['tab_id'])): echo $tl['cat_name'];
                                        endif; ?></td>
                                    <td><?php if (!empty($tl['tab_id'])): echo $tl['order_by'];
                                        endif; ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'tabs-setup/' . $tl['tab_id']; ?>"><i
                                                class="fa fa-edit text-success"></i></a>
                                        <a href="<?php echo base_url() . 'delete_tab/?id=' . ($tl['tab_id'] ?? '') ?>"><i
                                                class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                </table>


            </div>

        </div>

    </div>
</form>


<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
            <caption>
                Table Name
            </caption>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr class="table-primary">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
            <tr class="table-primary">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>