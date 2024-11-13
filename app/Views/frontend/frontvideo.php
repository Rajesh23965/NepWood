<?php if (!empty($videoList)): ?>
<div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-row flex-wrap px-3 py-3">
    <?php foreach ($videoList as $video): ?>
    <?php if (!empty($video['video_url'])): ?>
    <?php $videoId = getYoutubeVideoID($video['video_url']); ?>
    <div class="col-sm-12 col-xsm-12 col-md-3 col-lg-3 d-flex flex-column align-items-start gap-2 p-2">
        <iframe class="rounded-3 shadow" src="https://www.youtube.com/embed/<?= esc($videoId) ?>" frameborder="0"
            allowfullscreen style="height: 300px; width:100%;">
        </iframe>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

</div>
<div class="col d-flex flex-end justify-content-end bg-light border border-white">
    <a class="icon-box-btn my-5" href="<?= base_url() . 'video-gallery' ?>">Viewall <i class="fa fa-arrow-right"></i>
    </a>
</div>


<?php endif; ?>