<?php
if ($get_counter_by_id) {
    extract($get_counter_by_id);
}

?>
<div class="wrapper-body card p-2">
    <div class="col row">
        <div class="col">
            <h4 class="txt-blue"><b>Counter Setup</b></h4>
        </div>
        <div class="col text-right">

            <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/counter-setup</a>
        </div>
    </div>
    <hr>
    <div class="card-body">
        <form action="<?php echo base_url() . 'admin/Mainadmin/save_counter/' ?><?php if (!empty($counter_id)) : echo $counter_id;
                                                                                    endif ?>" method="post" class="d-flex">
            <div class="col row">
                <div class="col">
                    <label for="">Counter Title</label>
                    <input type="text" class="form-control" placeholder="Counter Title" name="counter_title" value="<?php if(!empty($counter_title)): echo $counter_title; endif?>">
                </div>
                <div class="col">
                    <label for="">Counter Icon</label>
                    <p class="form-control mb-0" type="" data-bs-toggle="collapse" data-bs-target="#demo">Select icon <i class="fa fa-caret-square-down pt-1 float-right"></i></p>
                    <div id="demo" class="collapse mt-0">

                        <?php foreach ($icon_list as $icl) : ?>
                            <div class="border pl-2 mt-0">
                                <label for=""><i class="fa fa-<?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                                endif ?>"></i></label>
                                <input type="radio" value="<?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                            endif ?>" name="counter_icon" <?php if (!empty($counter_icon)) : if ($icl['icon_class'] == $counter_icon) : echo "checked";
                                                                                                endif;
                                                                                            endif ?>>
                                <label for=""><?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                endif ?></label>
                            </div>

                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col">
                    <label for="">Counter Number</label>
                    <input type="number" min="0" class="form-control" placeholder="Counter Number" name="counter_number" value="<?php if(!empty($counter_number)): echo $counter_number; endif?>">
                </div>
                <div class="col m-auto pt-4">

                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>

    <div class="quick_links_table m-5">

        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Counter Title</th>
                    <th>Counter Number</th>
                    <th>Counter Icon</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php $i=0; foreach ($counter as $count): $i++ ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php if(!empty($count['counter_title'])): echo $count['counter_title']; endif?></td>
                    <td><?php if(!empty($count['counter_number'])): echo $count['counter_number']; endif?></td>
                    <td><?php if(!empty($count['counter_icon'])): echo $count['counter_icon']; endif?></td>
                    <td>
                        <a href="<?php echo base_url().'admin/counter/'.$count['counter_id']?>"><i class="fa fa-edit text-success pr-2"></i></a>
                        <a href="<?php echo base_url().'admin/Mainadmin/delete_counter/'.$count['counter_id']?>"><i class="fa fa-trash text-danger pr-2"></i></a>

                    </td>

                </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>
</div>