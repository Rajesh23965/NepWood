<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .header-box,
        .login-form {

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* align-content: center; */
            height: 100%;
            background: #ffffffa8;
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

<?php if (isset($public_header)) : extract($public_header);
endif ?>

<body class="py-auto bg-light">
    <div class="container border card m-auto">
        <section class="vh-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 px-0 d-none d-sm-block" style="background:url('<?php echo base_url() . 'assets/image/3.jpg' ?>'); background-size:cover; height:100vh;">

                        <div class="container header-box">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                <img class="logo text-center" src="<?php echo base_url() . 'assets/image/' ?><?php if (isset($left_logo)) : echo $left_logo;
                                                                                                                endif ?>" alt="" width="150px">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">

                                <?php if (!empty($province_name)) : ?> <small><b class="txt-red"><?php echo $province_name ?></b></small><br class="my-1"><?php endif ?>

                                <?php if (!empty($ministry)) : ?> <small><b class="txt-red"><?php echo $ministry ?></b></small><br class="my-1"><?php endif ?>
                                <?php if (!empty($nirdeshnalaya)) : ?> <small><b class="txt-red"><?php echo $nirdeshnalaya ?></b></small><br class="my-1"><?php endif ?>
                                <?php if (!empty($office_name)) : ?> <h5><b class="txt-blue"><?php echo $office_name ?></b></h5><?php endif ?>
                                <?php if (!empty($office_location)) : ?> <small><b class="txt-red"><?php echo $office_location ?></b></small><br class="my-1"><?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-black">

                        <div class="d-flex align-items-center login-form h-custom-2 px-5 ms-xl-4  pt-xl-0 mt-xl-n5">



                            <form method="post" action="<?php echo base_url() . 'admin/Reset/requestTopasswordReset' ?>" style="width: 23rem;">


                                <h3 class="fw-normal mb-3 pb-3 text-danger" style="letter-spacing: 1px;">Reset Password</h3>
                                <hr>

                                <div class="form-outline mb-4">
                                    <label class="form-label text-primary" for="form2Example18">Email</label>
                                    <input type="email" id="form2Example18" class="form-control form-control-lg" name="email" placeholder="Please Enter valid Email.!!!" />
                                </div>
                                <div class="row m-auto">
                                    <button class="btn btn-outline-success">Send</button>
                                </div>

                                <a class="pmy-3" href="<?php echo base_url() . 'admin/login' ?>">Login <i class="fa fa-arrow-right ml-1"></i></a>



                                <div class="row my-2">
                                    <?php if ($this->session->flashdata('success')) : ?>
                                        <small>

                                            <div class="alert alert-success p-2 m-0">
                                                <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        </small>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('error')) : ?>
                                        <small>

                                            <div class="alert alert-danger p-2 m-0">
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        </small>
                                    <?php endif; ?>
                                </div>




                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>



</body>

</html>