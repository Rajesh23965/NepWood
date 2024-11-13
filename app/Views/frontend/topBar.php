<!DOCTYPE html>
<html lang="en">
<?php if (isset($topbar)): extract($topbar);
endif ?>
<?php if (isset($header)): extract($header);
endif ?>
<?php if (isset($intro)): extract($intro);
endif ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="<?= htmlspecialchars(trim(($office_name ?? '') . (!empty($office_name) && !empty($description) ? ' - ' : '') . ($description ?? '')), ENT_QUOTES, 'UTF-8') ?>">

    <meta name="keywords" content="<?= $office_name ?? '' ?><?= $office_location ?? '' ?>">
    <meta name="robots" content="...">
    <meta property="og:title" content="<?= $office_name ?? '' ?>">
    <meta property="og:description" content="<?= $office_name ?? '' ?>">
    <meta property="og:image" content="<?= base_url() . 'assets/uploads/' . $left_logo ?? '' ?>">
    <meta property="og:url" content="<?= base_url() ?>">

    <link rel="canonical" href="...">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&family=Open+Sans:wght@300&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">


    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() . 'style.php' ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/media.css'); ?>" />



    <link rel="shortcut icon" type="image/x-icon"
        href="<?= base_url() . 'assets/uploads/1716529437_a56ffc8d2e888921f7b8.png' ?>" />
    <title>
        <?php if (isset($office_name)): echo $office_name;
        endif ?><?php if (isset($office_location)): echo "||" . ' ' . $office_location;
                endif ?>
    </title>
</head>

<body>
    <main>
        <?php echo view('frontend/popup') ?>
        <section class="top-bar text-light ps-lg-5 ps-md-5 pe-lg-0 pe-md-0">
            <div class="col-sm-12 col-md-12 col-lg-12 row align-items-center ">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 row ">
                    <div
                        class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex flex-row mx-sm-0 flex-wrap gap-2 justify-content-start align-items-center ">
                        <span
                            class="d-flex flex-row mx-sm-0 flex-wrap gap-2 justify-content-start align-items-center skew-bg px-3">
                            <span class="skew-25"><i class="fa fa-calendar"></i></span>
                            <span class="ms-2 skew-25"><?= $today ? $today : ''; ?></span>
                        </span>
                        <span>
                            <?php if (!empty($email)): echo '<i class="px-2 fa fa-envelope"></i>' . $email;
                            endif ?>
                        </span>
                        <span class="ms-md-2 ms-lg-2">
                            <?php if (!empty($mobile_number)): echo '<i class="px-md-2 px-lg-2 pe-2 fa fa-mobile pr-1"></i>' . $mobile_number;
                            endif ?>
                        </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 row mx-0 px-0">
                    <div
                        class="col-xs-6 col-sm-6 col-md-8 col-lg-8 d-flex flex-row gap-3 align-items-center justify-content-lg-end justify-content-md-end ps-sm-2 ">
                        <a target="blank" href="<?php if (isset($facebook)): echo $facebook;
                                                endif ?>"><i class="text-light my-auto fab fa-facebook-f"></i></a>

                        <a target="blank" href="<?php if (isset($twitter)): echo $twitter;
                                                endif ?>"><i class="text-light my-auto fab fa-twitter"></i></a>

                        <a target="blank" href="<?php if (isset($yotube)): echo $yotube;
                                                endif ?>"><i class="text-light my-auto fab fa-youtube"></i></a>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 d-flex flex-row justify-content-end py-sm-2">
                        <select name="" id="" class="form-select text-light py-2 bg-red shadow border-0 rounded-2 me-1">

                            <option class="border-0 rounded-0 " value="nepali">Nepali</option>
                            <option class="border-0 rounded-0 " value="english">English</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>