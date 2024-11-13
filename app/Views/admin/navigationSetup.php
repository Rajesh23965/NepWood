

<form action="<?php echo base_url() . 'save-navigation' ?>" method='post'
    enctype='multipart/form-data'>

    <div class='card p-3'>
        <div class='col row'>
            <div class='col'>
                <h4 class='txt-blue'><b>Navigation Setup</b></h4>
            </div>
            <div class='col text-right'>

                <a class='' href=''><i class='fas fa-arrow-right fa-3x'></i> Home/navigation-setup</a>
            </div>
        </div>
        <hr>
        <div class='card-body'>
            <div class='row col-12 mb-4 border rounded p-2'>
                <div class="col-3 card shadow-none border-bottom-0 border-top-0  ">
                    <label for="" class=" border-bottom ">
                        <h5>Navigation Type</h5>
                    </label><br>
                    <div class="d-flex">
                        <label for="" class="d-flex"><input type="radio" class="mx-2 navBtn" name="nav_type" value="1"
                                checked>
                            <h6>Page</h6>
                        </label>
                        <label for="" class="d-flex"><input type="radio" class="mx-2 navBtn" name="nav_type" value="2">
                            <h6>Custom</h6>
                        </label>
                    </div>

                </div>

                <div class="col">
                    <div class='col pageColumn'>
                        <label for=''>Select Page</label>
                        <div class='multiselect'>
                            <div class='selectBox' id='showCheckboxes'>
                                <select class='form-control'>
                                    <option class="pageOption">Select an option</i></option>
                                </select>

                                <div class='overSelect'><i class='fas fa-caret-down'></i></div>
                            </div>
                            <div id='checkboxes' class='p-3'>
                                <?php foreach ( $page_list as $nav ) : ?>
                                <label for='one' class="pageTitle">
                                    <input class='mr-2' type='radio'  name='nav_pg_id' value="<?php if (!empty($nav['pg_id'])) : echo $nav['pg_id'];
                                                                                                endif ?>" /><?php if ( !empty( $nav[ 'page_title' ] ) ) : echo $nav[ 'page_title' ];
                                                                                                endif ?></label>
            
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>

                    <div class='col customColumn dd-none'>
                        <label for=''>Custom Field</label>
                        <div class='d-flex align-center'>
                            <input id="custom_field" type='text' name='custom_field' class='form-control' placeholder="Enter Navigation Title">
                            <input id="custom_url" type="text" name="custom_url"class="form-control mx-2" placeholder="Enter Url">
                        </div>
                    </div>
                </div>

            </div>

            <div class='col-12 row border rounded p-2'>
                <div class='col'>
                    <label class='from-group' for='link_icon'>Link Icon:</label>
                    <p class='form-control mb-0 i-box' type='' data-bs-toggle='collapse' data-bs-target='#demo'>Select
                        icon... <i class='fa fa-caret-square-down pt-1 float-right'></i></p>
                    <div id='demo' class='collapse mt-0'>

                        <?php foreach ( $icon_list as $icl ) : ?>
                        <div class='border pl-2 mt-0 i-tab iconBox'>
                            <label for=''><i class="fas <?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                                endif ?>"></i>
                                <input type='radio' value="<?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                            endif ?>" name='link_icon' <?php if ( !empty( $link_icon ) ) : if ( $icl[ 'icon_class' ] == $link_icon ) : echo 'checked';
endif;
endif ?>>
                                <?php if ( !empty( $icl[ 'icon_class' ] ) ) : echo $icl[ 'icon_class' ];
endif ?></label>
                        </div>

                        <?php endforeach ?>
                    </div>
                </div>

                <div class='col'>
                    <label for=''>Navigation Category</label>
                    <div class='d-flex align-center'>

                        <select name='nav_category' id="" class="form-control">
                            <option value="1">Button</option>
                            <option value="2">Card</option>
                        </select>

                    </div>
                </div>
                <div class='col-1'>
                    <label for=''>Order</label>
                    <div class='d-flex align-center'>
                        <input type='number' name='pg_order' class='form-control' min='1' required>

                    </div>
                </div>
                <div class='col-1 mt-3'>
                    <button class='btn btn-primary mt-2'>Save +</button>
                </div>
            </div>

            <div class='row'>
                <?php if (!empty(session('error'))) : ?>
                <div class='alert alert-error text-danger d-flex bold'>
                    <?= 'Image not uploaded.'.' '.session( 'error' ).'  '.'Please try adding again';?>
                </div>
                <?php endif;?>
            </div>
            <div class='row'>
                <?php if (!empty(session('success'))) : ?>
                <div class='alert alert-success text-success d-flex bold'>
                    <?= 'Image not uploaded.'.' '.session( 'success' ).'  '.'Please try adding again';?>
                </div>
                <?php endif;?>
            </div>
            <hr>

            <table class='table table-condensed table-hover'>
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Navigation Type</th>
                        <th>Selected Page</th>
                        <th>Uploaded Icon</th>
                        <th>Navigation Category</th>
                        <th>Page Order</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
foreach ( $nav_list as $nl ) : $i++ ?>
                    <tr>
                        <td>
                            <?php echo $i ?>
                        </td>
                        <td><?php if ( !empty( $nl[ 'nav_typ' ] ) ) :if($nl[ 'nav_typ' ]=='1'): echo "Page"; else: echo "Custom"; endif;;
endif ?></td>
                        <td><?php if ( !empty( $nl[ 'page_title' ] ) ) : echo $nl[ 'page_title' ];elseif($nl['custom_field']):?><a href="<?php if(!empty($nl['custom_url'])): echo $nl['custom_url']; endif?>"><?php echo $nl['custom_field'];?></a><?php endif ?></td>
                        <td><i class="fas <?php if (!empty($nl['img_icon'])) : echo $nl['img_icon'].' ';
                                                                endif ?>"></i><span><?php if (!empty($nl['img_icon'])) : echo ' '.$nl['img_icon'];
                                                                endif ?></span>
                        </td>

                        <td><?php if ( !empty( $nl[ 'navigation_category' ] ) ) :if($nl[ 'navigation_category' ]=='1'): echo "Button"; else: echo "Card"; endif;;
endif ?></td>

                        <td><?php if ( !empty( $nl[ 'page_order' ] ) ) : echo $nl[ 'page_order' ];
endif ?></td>
                        <td>

                            <a class='text-danger' href="<?php if ($nl['nav_id']) : echo base_url() . 'delete-nav-item?id='.$nl['nav_id'];
                                                                endif ?>"><i class='fa fa-trash'></i></a>

                        </td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

    </div>
</form>