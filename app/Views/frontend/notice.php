<div class="w-100 pt-2 m-0 p-0">
    <div class="card-text card px-3 py-2 m-0 bg-red rounded-0">
        <b class="text-light"><i class="fa fa-bell mr-2"></i> Notices</b>
    </div>

    <div class="link-box">
        <ul class="list-group border">
            <?php foreach ($get_post_list as $gpl) : ?>
                <li class="list-group-item mb-1">
                    <div class="row link-items">
                        <div class="col-1 align-content-center">
                            <span><i class="fa fa-link text-danger"></i></span>

                        </div>
                        <div class="col">
                            <a class="notice-title text-dark" href="<?php if ($gpl['post_id']) : echo base_url() . 'post?id=' . $gpl['post_id'] . '&title=' . ($gpl['slug'] ?? '');
                                                                    endif ?>">
                                <span><?php if ($gpl['post_title']) : echo $gpl['post_title'];
                                        endif ?></span>
                            </a><br>
                            <small class="mx-auto fw-light"><i class="fa fa-calendar"></i> Published on: <span class=""><?php if ($gpl['noticeDate']) : echo $gpl['noticeDate'];
                                                                                                                        endif  ?></span></small>

                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>