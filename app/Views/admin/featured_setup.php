<div class="card mx-1">
    <div class="card-header">

        <h4>Featured Section</h4>
        <hr>


    </div>
    <div class="card-body">

        <form method="post" action="<?php echo base_url() . 'admin/Mainadmin/save_featured_section' ?>"
            enctype="multipart/form-data">
            <div class="col row">
                <div class="col-5 row">


                    <label class="label">Header title</label>

                    <input class="form-control" type="text" name="featured_title" id="" placeholder="Enter Title">
                    <div class="col">
                        <?php if ($this->session->flashdata('success')) : ?>
                        <small>

                            <div class="alert alert-success p-2 m-0">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        </small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-5">

                    <label class="pages" for="pages">Pages</label>
                    <div class="dropdown-select">
                        <div class="select-header d-flex border rounded p-2">
                            <div class="selected-items w-100">Select items</div>
                            <div class="dropdown-icon float-right">&#9660;</div>
                        </div>
                        <div class="select-options border ml-0 p-2 col-12 row">
                            <?php foreach ($pages as $page) : ?>
                            <div class="option col-4">
                                <input type="checkbox" id="" name="pages[]" value="<?php if (isset($page['pg_id'])) : echo $page['pg_id'];
                                                                                        endif ?>">
                                <label for="page"><?php if (isset($page['pg_id'])) : echo $page['page_title'];
                                                        endif ?></label>
                            </div>
                            <?php endforeach ?>

                        </div>
                    </div>



                </div>
                <div class="col-2 pt-4">

                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div>
            </div>
        </form>


    </div>
    <div class="card-footer">
        <div class="card">
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Features Title</th>
                            <th>Added pages Id</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($featured as $ff) : ?>
                        <tr>
                            <td>
                                <b><?php echo $i . '.'; ?></b>
                            </td>
                            </td>

                            <td><b class="pl-2"><?php if (isset($ff['featured_id'])) : echo $ff['featured_title'];
                                                    endif ?></b></td>

                            <td>
                                <?php if (isset($ff['featured_pages'])) : echo $ff['featured_pages'];
                                    endif ?>
                            </td>
                            <td>

                                <a class="text-danger"
                                    href="<?php echo base_url() . 'admin/Mainadmin/delete_feature/' . $ff['featured_id'] ?>"><i
                                        class="fa fa-trash mr-1"></i></a>

                            </td>
                        </tr>
                        <?php $i++;
                        endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>