<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset || Welcome to Reset Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="<?=base_url('assets/uploads/favicon.ico')?>">

    <style>
    .header-box {

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        background: #000c;
    }

    .login-form {

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* height: 100%; */
        background: #fff5e9;
    }

    .txt-red {

        color: #c7020c;
        padding: 20px 0px !important;
    }

    .txt-blue {

        color: #1f60ba;
        padding: 20px 0px !important;
    }
    </style>
</head>

<?php if (isset($public_header)): extract($public_header);
endif?>

<body class="bg-dark mt-5 h-100 w-100">
    <div class="container border card my-auto ">
        <section class="">
            <div class="container-fluid p-5">
                <div class="row">
                    <div class="col-sm-6 px-0 d-sm-block "
                        style="background:url('<?php echo base_url() . 'assets/uploads/reset.gif' ?>'); background-size:cover; background-position: center center;">

                        <div class="container header-box">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                <img class="logo text-center" src="<?php echo base_url() . 'assets/frontend/image/' ?><?php if (isset($left_logo)): echo $left_logo;
endif?>" alt="" width="150px">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">

                                <?php if (!empty($province_name)): ?> <small><b
                                        class="txt-red"><?php echo $province_name ?></b></small><br
                                    class="my-1"><?php endif?>

                                <?php if (!empty($ministry)): ?> <small><b
                                        class="txt-red"><?php echo $ministry ?></b></small><br
                                    class="my-1"><?php endif?>
                                <?php if (!empty($nirdeshnalaya)): ?> <small><b
                                        class="txt-red"><?php echo $nirdeshnalaya ?></b></small><br
                                    class="my-1"><?php endif?>
                                <?php if (!empty($office_name)): ?> <h5><b
                                        class="txt-blue"><?php echo $office_name ?></b></h5><?php endif?>
                                <?php if (!empty($office_location)): ?> <small><b
                                        class="txt-red"><?php echo $office_location ?></b></small><br
                                    class="my-1"><?php endif?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-black login-form py-5">

                        <div class="d-flex align-items-center  h-custom-2 px-5 ms-xl-4  pt-xl-0 mt-xl-n5">



                            <form method="post" action="<?php echo base_url() . 'create-Link-to-Change-Password' ?>"
                                style="width: 23rem;">

                                <h4 class="fw-normal mb-3 pb-3 text-danger" style="letter-spacing: 1px;">Reset Password
                                </h4>
                                <hr>
                                <?=Session('success') ? '<p class="text-success">' . Session('success') . '</p>' : ''?>
                                <?=Session('error') ? '<p class="text-danger">' . Session('error') . '</p>' : ''?>


                                <div class="form-outline mb-4">

                                    <input type="text" id="form2Example18" class="form-control" name="email"
                                        placeholder="Enter registered email address." />
                                </div>



                                <button type="submit" class="btn btn-warning w-100 ">Send</button>
                                <hr>
                                <a class="py-3 text-decoration-none "
                                    href="<?=base_url() . 'login'?>"><b>Login->></b></i></a>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>



</body>

</html>