<div class="wrapper-body">
    <div class="container-fluid mx-auto px-0 featured-area">
        <div class="bread-holder">
            <div class="bread-con">
                <div class=" container-fluid px-5  py-4">
                    <h5 class="page-title text-light px-1">video Gallery</h5>
                    <ul class="bread-list d-flex px-1">
                        <li class="list-item"><a href="<?php echo base_url() ?>"><b>Home</b></a><small><i
                                    class="fa fa-angle-double-right text-light px-2"></i></small></li>
                        <li class="list-item"><a href="#"><b>video-gallery</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="">
            <?php if (!empty($videos)): ?>
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-row flex-wrap py-3">
                <?php foreach ($videos as $video): ?>
                <?php if (!empty($video['video_url'])): ?>
                <?php $videoId = getYoutubeVideoID($video['video_url']); ?>
                <div class="col-sm-12 col-md-3 col-lg-3 d-flex flex-column align-items-start gap-2 px-2 py-3 bg-light">
                    <iframe class="rounded-4" src="https://www.youtube.com/embed/<?= esc($videoId) ?>" frameborder="0"
                        allowfullscreen style="height: 300px; width:100%;">
                    </iframe>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>