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
    <div class="account-pages" style="background-image: url(<?= base_url('assets/admin/images/obg.jpg') ?>);"></div>
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

                    <h4 class="text-muted font-size-18 text-center">Welcome Back Child care Homes!</h4>
                    <p class="text-muted text-center">Sign in to continue to <b>Srimitra</b> .</p>
                    <h3> <?php if ($this->session->userdata('login_error') != '') {
                            ?>
                            <div class="alert alert-danger">
                                <span><?= $this->session->userdata('login_error') ?></span>
                            </div>
                        <?php
$this->session->unset_userdata('login_error');
                            }
                            
                        ?>
                    </h3>

                    <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'admin/orphanagelogin'; ?>">
                        <div class="mb-3">
                            <label class="form-label" for="username">Contact Number</label>
                            <!--<input type="text" class="form-control" name="number" id="" placeholder="Contact no.">-->
                            <input type="text" class="form-control phoneval" name="number" id="" placeholder="Contact no." maxlength="10" required>
                       
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
                            <a href="<?= base_url('Index/cch_forget_password') ?>" class="text-center"> Forget password ?? </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center">
            <p class="text-white-50">

                <a href="<?= base_url() ?>" class="btn btn-light"> Back To Website </a>
            </p>
            <p class="text-muted">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                . All rights reserved by <i class="mdi mdi-heart text-primary"></i> by
                Srimitra
            </p>
        </div>
    </div>


    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('.phoneval').keypress(function(evt) {
             if (evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
    }
        });
    </script>
</body>

</html>