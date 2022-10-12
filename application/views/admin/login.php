<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <?php $this->load->view('admin/template/header_link'); ?>
    <link rel="shortcut icon" href="<?= $favicon ?>" />
</head>


<body data-topbar="colored">
    <div class="account-pages"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="auth-logo">
                    <h3 class="text-center">
                        <a href="<?= base_url() ?>" class=" logo d-block my-4">
                            <img src="<?= base_url() ?>assets/admin/images/logo.png" class="logo-dark mx-auto" height="30" alt="Srimitra" />
                            <img src="<?= base_url() ?>assets/admin/images/logo.png" class="logo-light mx-auto" height="30" alt="Srimitra" />
                        </a>
                    </h3>
                </div>

                <div class="p-3">

                    <h4 class="text-muted font-size-18 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to <b>Sri Mitra India</b> .</p>
                    <h3> <?php if ($this->session->userdata('login_error') != '') {
                            ?>
                            <div class="alert alert-danger">
                                <span><?= $this->session->userdata('login_error'); ?></span>
                            </div>
                        <?php

                            }
                            $this->session->unset_userdata('login_error');;
                        ?>
                    </h3>

                    <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'admin/adminlogin'; ?>">
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="" placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="mb-3 row">

                            <div class="col-6">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                    Log In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>