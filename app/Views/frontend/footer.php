<?php if (isset($header)): extract($header);
endif ?>



<footer class="bg-light ">
    <section class="row custom-section pt-5">
        <?php $i = 0;
        foreach ($footer_tbl as $ft) : $i++; ?>

        <?php if ($i == 2) : ?>
        <div class="col-sm-12 col-md-6 col-lg-6 footer-box footer footer-section">
            <p class="title text-dark"><?php if (!empty($ft['footer_id'])) : echo $ft['footer_title'];
                                                endif ?></p>
            <hr>
            <?php if (!empty($ft['footer_id'])) : echo $ft['footer_description'];
                    endif ?>

        </div>
        <?php else : ?>
        <div class="col-sm-12 col-md-3 col-lg-3 footer-box footer footer-section">
            <p class="title text-dark"><?php if (!empty($ft['footer_id'])) : echo $ft['footer_title'];
                                                endif ?></p>
            <hr>
            <?php if (!empty($ft['footer_id'])) : echo $ft['footer_description'];
                    endif ?>

        </div>
        <?php endif  ?>

        <?php endforeach ?>
    </section>
    <section class="custom-section px-4">
        <div class="row col-sm-12 col-md-12 col-lg-12">

            <div class="footer-link-box col-sm-12 col-md-8 col-lg-9">
                <div class="extended-header">
                    <h3>
                        अन्य लिङ्क
                    </h3>
                    <hr>
                </div>

                <div>
                    <ul>
                        <li>

                            हाम्रो बारेमा
                        </li>
                        <li>
                            संगठनात्मक संरचना

                        </li>
                        <li>

                            कार्य विवरण
                        </li>

                        <li>
                            बजेट विवरण

                        </li>

                        <li>

                            नसर्ने रोगबारे जानकारी
                        </li>

                        <li>

                            नेपाली युनिकोड रोमनाइज
                        </li>

                        <li>

                            बिदा फारम
                        </li>

                        <li>

                            माग फारम
                        </li>
                    </ul>

                </div>
            </div>
            <div class="footer-office-title col-sm-12 col-md-4 col-lg-3">

                <div class="extended-header">
                    <h3>सामाजिक सन्जालमा मन्त्रालय</h3>
                    <hr>
                </div>

                <div>
                    <ul class="footer-social-icons">
                        <a href="https://www.facebook.com/nphlOfficial/">
                            <li class="fab fa-facebook txt-blue"></li>
                        </a>
                        <a href="https://www.youtube.com/@nationalpublichealthlabora9916">
                            <li class="fab fa-youtube text-danger"></li>
                        </a>
                        <a href="https://twitter.com/Nphl1968">
                            <li class="fab fa-twitter text-primary"></li>
                        </a>
                        <a href="mailto:">
                            <li class="fa fa-envelope text-info"></li>
                        </a>


                    </ul>
                </div>
            </div>

        </div>
    </section>
    <div class="container-fluid bg-blue text-center mb-0">
        <p class="text-light mb-0 py-2">&copy National Public Health Laboratory</p>
    </div>
</footer>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
<script src=" <?= base_url('assets/admin/js/config.js') ?>"></script>
<script src=" <?= base_url('assets/frontend/js/maintab.js') ?>"></script>
<script src=" <?= base_url('assets/frontend/js/splide.js') ?>"></script>
<script src=" <?= base_url('assets/frontend/js/frontend.js') ?>"></script>
<script src=" <?= base_url('assets/frontend/js/counter.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>