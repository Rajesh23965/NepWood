<div class="card">
    <div class="card-header">
        <div class="col row">
            <div class="col">
                <h5>Add Category</h5>

            </div>
            <div class="col text-right">
                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/add-category</a>
            </div>
        </div>
        <hr>
    </div>
    <div class="card-body col row border p-2 mx-auto">
        <div class="col border p-2 bg-light m-2">

            <div class="col">
                <label for="">Category Name</label>
                <input class="form-control" type="text" id="caty_title">
                <input class="form-control" type="hidden" id="cat_id">

            </div>
            <div class="col">
                <label for="">Category Slug (Optional)</label>
                <input class="form-control" type="text" id="caty_slug">
            </div>

            <div class="m-2 text-right">

                <button class="btn btn-otline-success w-25 border bg-blue" id="save_category">Save Changes <i
                        class="fa fa-plus"></i></button>

            </div>

        </div>
        <div class="col border p-2 bg-light m-2">

            <table class="table table-condensed table-hover">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>id</th>
                        <th>slug</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="category_list_items">

                    <?php $i = 0;
foreach ($getCatyList as $gcl): $i++?>

	                    <tr class="data-row" data-cat-id='<?php if ($gcl['cat_id']): echo $gcl['cat_id'];
    endif?>'>
                            
	                        <td class="cat_title">
	                            <?php if ($gcl['cat_name']): echo $gcl['cat_name'];
    endif?></td>
	                        <td class="cat_id"><?php if ($gcl['cat_id']): echo $gcl['cat_id'];
    endif?>
	                        </td>

	                        <td class="cat_slug"><?php if ($gcl['cat_slug']): echo $gcl['cat_slug'];
    endif?>
	                        </td>

	                        <td>
	                            <a href="" id="" class="edit_cat"><i class="fa fa-edit text-success px-1"></i></a>
	                            <a href="" class="delete_cat"><i class="fa fa-trash txt-red px-1"></i></a>

	                        </td>



	                    </tr>

	                    <?php endforeach?>

                </tbody>
            </table>


        </div>

    </div>

</div>