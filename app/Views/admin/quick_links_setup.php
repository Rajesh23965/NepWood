<?php
if ( $edit_by_id ) {
    extract( $edit_by_id );
}

?>
<div class='wrapper-body card p-2'>
    <div class='col row'>
        <div class='col'>
            <h4 class='txt-blue'><b>Quick Link Setup</b></h4>
        </div>
        <div class='col text-right'>

            <a class='' href=''><i class='fas fa-arrow-right fa-3x'></i> Home/introduction-setup</a>
        </div>
    </div>
    <hr>
    <div class='card-body'>
        <form
            action="<?php echo base_url() . 'admin/Admincontroller/save_qick_links/' ?><?php if(!empty($link_id)): echo $link_id; endif?>"
            method='post' class='d-flex'>
            <div class='col'>
                <label class='from-group' for='link_label'>Link Label:</label>
                <input class='form-control' type='text' id='link_label' name='link_label' value="<?php if (!empty($link_label)) : echo $link_label;
                                                                                                    endif ?>"
                    required><br><br>

                <label class='from-group' for='link_url'>Link URL:</label>
                <input class='form-control' type='text' id='link_url' name='link_url' value="<?php if (!empty($link_url)) : echo $link_url;
                                                                                                endif ?>"><br><br>
            </div>

            <div class='col'>
                <label class='from-group' for='link_icon'>Link Icon:</label>

                <p class='form-control mb-0 i-box' type='' data-bs-toggle='collapse' data-bs-target='#demo'>Select
                    icon... <i class='fa fa-caret-square-down pt-1 float-right'></i></p>
                <div id='demo' class='collapse mt-0'>

                    <?php foreach ( $icon_list as $icl ) : ?>
                    <div class='border pl-2 mt-0 i-tab'>
                        <label for=''><i class="fa fa-<?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                            endif ?>"></i></label>
                        <input type='radio' value="<?php if (!empty($icl['icon_class'])) : echo $icl['icon_class'];
                                                        endif ?>" name='link_icon' <?php if ( !empty( $link_icon ) ) : if ( $icl['icon_class'] == $link_icon ) : echo 'checked';
endif;
endif ?>>
                        <label for=''><?php if ( !empty( $icl['icon_class'] ) ) : echo $icl['icon_class'];
endif ?></label>
                    </div>

                    <?php endforeach ?>
                </div>

                <label for='' class='text-light'>.</label>
                <input class='btn btn-outline-primary w-100' type='submit' value='Submit' style='margin-top: 45px;'>
            </div>
        </form>
        <div class='col-sm-12 col-md-12 col-lg-12'>
            <?php if ( $this->session->flashdata( 'msg' ) ) : ?>
            <div class='alert alert-success'>
                <?php echo $this->session->flashdata( 'msg' );
?>
            </div>
            <?php endif;
?>
        </div>
    </div>

    <div class='quick_links_table m-5'>

        <table class='table table-condensed table-hover'>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Link Name</th>
                    <th>Link Url</th>
                    <th>Link Icon</th>
                    <th>Action</th>

                </tr>
            </thead>`
            <tbody>
                <?php $i = 0;
foreach ( $link_data as $ln ) : $i++ ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php if ( $ln['link_label'] ) : echo $ln['link_label'];
endif ?></td>
                    <td><?php if ( $ln['link_url'] ) : echo $ln['link_url'];
endif ?></td>
                    <td><?php if ( $ln['link_icon'] ) : ?>
                        <i class="fa fa-<?php echo $ln['link_icon'] ?>"></i>
                        <?php endif ?>
                    </td>

                    <td>
                        <a href="<?php if ($ln['link_id']) : echo base_url() . 'admin/quick-links/' . $ln['link_id'];
                                        endif ?>"><i class='fa fa-edit text-success px-1'></i></a>
                        <a href="<?php echo base_url() . 'admin/Admincontroller/delete_quick_link/'.$ln['link_id'] ?>"><i
                                class='fa fa-trash text-danger px-1'></i></a>

                    </td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>