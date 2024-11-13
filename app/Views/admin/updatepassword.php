<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password || Welcome to Login Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="<?=base_url('assets/uploads/favicon.ico')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-hXQ6o5ahUNYR2wv4DWVv5PIvzCxhdq8gjrNMu/S+JbMrNc8h6wVqDq5SrF43n9YbY7BJgQfhsI7dPxktRQnK4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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

<?php if (isset($data)): extract($data);
endif?>

<body class="bg-dark mt-5">
    <div class="container border card ">
        <section class="">
            <div class="container-fluid p-5">
                <div class="row">
                    <div class="col-sm-6 px-0 d-sm-block "
                        style="background:url('<?php echo base_url() . 'assets/uploads/loginImage.gif' ?>'); background-size:cover; background-position: center center;">


                    </div>
                    <div class="col-sm-6 text-black login-form py-5">

                        <div class="d-flex align-items-center  h-custom-2 px-5 ms-xl-4  pt-xl-0 mt-xl-n5">



                            <form method="post" action="<?php echo base_url() . 'update-password' ?>"
                                style="width: 23rem;">


                                <h4 class="fw-normal mb-3 pb-3 text-danger" style="letter-spacing: 1px;">Change Password
                                </h4>
                                <hr>
                                <?php if (!empty($token)): ?>

                                <div class="form-outline mb-4">

                                    <input class="form-control" hidden type="text" name="token" id=""
                                        value="<?=$token ? $token : ''?><?=$id ? $id : ''?>">

                                </div>

                                <?php endif?>

                                <div class="form-outline mb-4">

                                    <input type="text" id="form2Example18" class="form-control" name="newpassword"
                                        placeholder="New password" />

                                </div>
                                <div class="form-outline mb-4">

                                    <input type="text" id="form2Example28" class="form-control" name="cnfrmpassword"
                                        placeholder="Confirm password" />
                                </div>

                                <button type="submit" class="btn btn-warning w-100 ">Save</button>

                                <?php
                                        $errorMessages = session('error');

                                        if (is_array($errorMessages)) {
                                            echo '<p class="text-danger">' . implode("<br>", $errorMessages) . '</p>';
                                        } elseif (!empty($errorMessages)) {
                                            // If it's a string, convert it to an array with a single element
                                            echo '<p class="text-danger">' . $errorMessages . '</p>';
                                        }
                                        ?>

                                <?=Session('success') ? '<p class="text-success">' . Session('success') . '</p>' : ''?>
                                <hr />
                                <p class="small mb-1 pb-lg-2">Click here to <a class="text-muted"
                                        href="<?php echo base_url() . 'login' ?>"><b>Login</b></a>
                                </p>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>



</body>

</html>