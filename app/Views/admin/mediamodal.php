<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl h-75" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Media</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Upload Files</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="media-library-tab" data-bs-toggle="tab"
                            data-bs-target="#media-library" type="button" role="tab" aria-controls="media-library"
                            aria-selected="false">Media Library</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container m-auto">
                            <p class="text-danger"><b>Click below to upload file</b></p>
                            <input id="upload_file_btn" type="file" name="media_doc" multiple>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="media-library" role="tabpanel" aria-labelledby="media-library-tab">
                        <div class="container border p-2">
                            <ul class="list-unstyled" id="lists_box">
                                <?php if(count($uploaded_file)>0): foreach ($uploaded_file as $uf) :
                                    $extension = pathinfo($uf['doc_temp_name'], PATHINFO_EXTENSION);
                                ?>
                                <div class="col" data="<?php if(!empty($uf['doc_id'])): echo $uf['doc_id']; endif;?>">
                                    <li class="media-list appen" tabindex="0" role="checkbox" aria-checked="false">
                                        <span class="check"> <i class="fa fa-check"></i></span>

                                        <div class="attached_file">
                                            <div class="thumbnail">
                                                <?php if (in_array($extension,['jpg','jpeg','png','gif'])) : ?>

                                                <img class="w-100 object-fit-cover"
                                                    src="<?php echo base_url() . 'assets/uploads/' . $uf['doc_temp_name']; ?>"
                                                    alt="" width="auto" height="auto">


                                                <?php endif; ?>
                                            </div>
                                            <div class="file-name">

                                                <?php if (in_array($extension,['jpg','jpeg','png','gif'])) : ?>

                                                <a class="doc" href="<?php if (!empty($uf['doc_temp_name'])) : echo base_url() . 'assets/uploads/' . $uf['doc_temp_name'];
                                                                                    endif ?>" hidden>
                                                    <?php if (!empty($uf['doc_temp_name'])) : echo $uf['doc_name'];
                                                                endif ?>
                                                </a>
                                                <?php else : ?>
                                                <div class="position-relative d-flex flex-column">
                                                    <img class="w-100 h-100"
                                                        src="<?=base_url().'assets/uploads/pdf.png'?>" alt="">
                                                    <a class="doc position-absolute bottom-0 bg-light m-lib-a" href="<?php if (!empty($uf['doc_temp_name'])) : echo base_url() . 'assets/uploads/' . $uf['doc_temp_name'];
                                                                                        endif ?>" disabled="disabled"><?php if ($uf['doc_name']) : echo $uf['doc_name'];
                                                                                                    endif ?>
                                                    </a>
                                                </div>

                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </li>
                                    <div class="dlt_media">delete <small><i class="fa fa-trash"></i></small></div>
                                </div>
                                <?php endforeach ; endif ?>
                            </ul>

                            <div class="col d-flex flex-row gap-2">
                                <div class="col">
                                    <small class="text-danger">यदि pdf फाइलको लागि डाउनलोड आइकन आवश्यक छैन भने, यसलाई
                                        अनचेक
                                        गर्नुहोस्</small>
                                    <small class="text-danger">If a download icon is not required for a pdf file, uncheck
                                        it</small>
                                </div>
                                <div class="col">
                                    <input id="togetDownloadIcon" type="checkbox" value="1" checked>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light justify-content-between">
                            <div class="Paginator">
                                <?=$pagination->links() ;?>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="save_media_file" class="btn btn-primary"
                                    data-bs-dismiss="modal">Insert
                                    Media
                                </button>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>