<section class="custom-section overflow-hiddenn">
    <?= view('frontend/newsTicker', $news_ticker_post); ?>
</section>
<section class="custom-section">
    <div class="col-sm-12 col-md-3 col-lg-3 border p-2">
        <?= view('frontend/notice'); ?>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 border p-2">
        <?= view('frontend/slider'); ?>
    </div>

    <div class=" col-sm-12 col-md-3 col-lg-3 border p-2">
        <?= view('frontend/directorTab'); ?>
    </div>
</section>


<section class="custom-section">
    <div class="col-sm-12 col-md-3 col-lg-3 card m-0 p-2 rounded-0 ">
        <?= view('frontend/testcard') ?>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 card m-0 p-2 rounded-0 ">
        <?= view('frontend/mainTab') ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 card m-0 p-2 rounded-0 ">
        <?= view('frontend/quicklinks') ?>
    </div>
</section>

<section class="custom-section overflow-hiddenn">
    <?= view('frontend/counter'); ?>
</section>





<section class="custom-section">
    <div class="col-sm-12 col-md-12 col-lg-12 card m-0 rounded-0">
        <span class='text-main text-center h1 pb-2 pt-4 bg-light'></i>Quick Information</span>

        <?= view('frontend/navigation') ?>
    </div>

</section>


<section class="custom-section">
    <div class="col-sm-12 col-md-12 col-lg-12 card m-0 rounded-0">
        <span class='text-main text-center h1 pb-2 pt-4 bg-light'></i>Video Gallery</span>

        <?= view('frontend/frontvideo') ?>
    </div>
</section>