<div class="card p-3">
        <div class="col row">
            <div class="col">
                <h4 class="txt-blue"><b>Officer List</b></h4>
            </div>
            <div class="col text-right">

                <a class="" href=""><i class="fas fa-arrow-right fa-3x"></i> Home/officer-list</a>
            </div>
        </div>
        <hr>
        <div class="col row">
            <div class="col">
                <div class="form-group col">
                    <a href="<?php echo base_url() . 'officer-setup' ?>" class=" w-25"><span><i class="fas fa-arrow-right fa-3x pr-2"></i></span><span><b>Add Officer</b></span></a>
                    <hr>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S.n</th>
                                <th>Officer Name</th>
                                <th>Officer Designation</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Display Order</th>
                                <th>Action</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach ($off_list as $ol) : $i++?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php if($ol['officer_id']): echo $ol['officer_name']; endif?></td>
                                    <td><?php if($ol['officer_id']): echo $ol['designation']; endif?></td>
                                    <td><?php if($ol['officer_id']): echo $ol['mobile']; endif?></td>
                                    <td><?php if($ol['officer_id']): echo $ol['email']; endif?></td>
                                    <td><img class="img-thumbnail object-fit-cover w-25" src="<?php if($ol['officer_id']): echo base_url().'assets/uploads/'.$ol['officer_image']; endif?>" alt="" width="50px"></td>
                                    <td><?php if($ol['officer_id']): echo $ol['order_num']; endif?></td>
                                    <td>
                                        <a href="<?php echo base_url().'edit-officer-details/'.$ol['officer_id']?>"><i class="fa fa-edit p-2 text-success"></i></a>
                                        <a href="<?php echo base_url().'delete-officer/'.$ol['officer_id']?>"><i class="fa fa-trash text-danger p-2"></i></a>

                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>


            </div>


        </div>

    </div>
