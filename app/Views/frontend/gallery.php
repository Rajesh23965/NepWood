<div class="col-sm-12 col-md-5 col-lg-4 card m-0 p-4 rounded-0">
    <span class='about-title'><i class="fa fa-clock me-2"></i>कार्यालय समय</span>

    <hr class="p-0 m-0 pb-2">
    <p><span><strong class="text-danger">आईतवार - विहिबार</strong></span></p>
    <hr class="p-0 m-0 pb-2">
    <p><span>विहान १०:०० देखि ५:०० सम्म</span></p>
    <hr class="p-0 m-0 pb-2">
    <p><span><strong class="text-danger">शुक्रवार&nbsp;</strong></span></p>
    <hr class="p-0 m-0 pb-2">
    <p><span>विहान १०:०० देखि ३:०० सम्म</span></p>
    <hr class="p-0 m-0 pb-2">
    <p><span>सार्वजनिक बिदाको दिन कार्यालय बन्द रहने छ</span></p>
    <b>
        <hr class="p-0 m-0 pb-2">

    </b>
</div>

<div class="col-sm-12 col-md-7 col-lg-8 card m-0 p-4 rounded-0">
    <span class='about-title'><i class="fa fa-images me-2"></i>हाम्रो ग्यालरी</span>
    <hr />
    <section id="thumbnail-carousel" class="splide carousell"
        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
        <div class="splide__track">
            <ul class="splide__list">
                <?php foreach ($galleryList as $gl): ?>
                <li class="splide__slide cusSlider">
                    <a href="<?= base_url() . ('post?id=' . $gl['post_id'] ?? '') . ('&title=' . $gl['slug'] ?? '') ?>">
                        <img class="w-100 object-fit-cover h-100 border border-4 border-light"
                            src="<?= 'assets/uploads/' . $gl['featured_image'] ?? '' ?>" alt=""></a>
                </li>
                <?php endforeach ?>

            </ul>
        </div>
    </section>
</div>