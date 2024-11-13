<section class="news-section">
    <div class="updates"><b> <i class="far fa-bell"></i> Updates</b></div>
    <div class="update-news marquee">
        <ul class="list-box">
            <?php foreach ($news_ticker_post as $nt): ?>
            <li>
                <a class="text-red"
                    href="<?php if (!empty($nt)): echo base_url() . 'post?id=' . $nt['post_id'] . '&title=' . $nt['slug'];
                                                endif ?>"><?php if (isset($nt['post_title'])) echo $nt['post_title']; ?></a>
            </li>

            <?php endforeach ?>
        </ul>
    </div>
</section>