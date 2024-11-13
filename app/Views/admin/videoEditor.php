<div class="row col  p-3">
    <div class="col p-3">
        <div class="container card p-3">
            <div class="card-header">
                <h5>Video Setup</h5>
                <?php if (session()->has('success')): ?>
                <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
                    <p class="m-0 p-1"><?=session('success') ?? ''?></p>
                </div>

                <?php elseif (session()->has('errors')): ?>
                <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                        <li><?=esc($error)?></li>
                        <?php endforeach?>
                    </ul>
                </div>
                <?php endif;?>
                <hr>
            </div>
            <div class="card-body">
                <form id="myForm" action="<?php echo base_url() . 'save-video/' ?>" enctype="multipart/form-data"
                    method="POST">
                    <div class="col d-flex gap-3">
                        <div class="col">
                            <input class="form-control" id="videoFileInput" type="file" accept="video/*"
                                name="videoFileInput">
                            <span>or</span>
                            <input class="form-control" id="videoUrlInput" type="text" placeholder="Enter url"
                                name="videoUrlInput">
                        </div>
                        <div class="col">
                            <video id="videoPreview" controls style="display:none;" width="360" height="215"></video>
                            <iframe id="youtubePreview" style="display:none;" width="360" height="215" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col m-2">
                        <input type="submit" class="btn btn-primary" value="Save +">
                    </div>
                </form>
            </div>

            <div class="card-footer">
                <?php if (!empty($videos)): ?>
                <div class="col d-flex flex-row flex-wrap">
                    <?php foreach ($videos as $video): ?>
                    <?php if (!empty($video['video_url'])): ?>
                    <?php $videoId = getYoutubeVideoID($video['video_url']);?>
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <iframe src="https://www.youtube.com/embed/<?=esc($videoId)?>" frameborder="0" allowfullscreen
                            style="height: 340px; width:100%;">
                        </iframe>
                        <a href="<?=base_url().'delete-video?videoId='.$video['videoId']?>" class="p-2 bg-light text-muted w-100 m-0 ">Delete Video</a>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
                <?php endif;?>

            </div>
        </div>
    </div>
</div>