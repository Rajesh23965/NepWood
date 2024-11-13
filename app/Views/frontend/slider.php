<div class="banner-center">
    <div class="splide mainSlider" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <?php foreach ($mainSlider as $ms): ?>
                <li class="splide__slide"><img src="<?php echo base_url() . 'assets/uploads/';
                                    if (isset($ms['slider_image'])): echo $ms['slider_image'];
                                    endif ?>" alt="slider"></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>