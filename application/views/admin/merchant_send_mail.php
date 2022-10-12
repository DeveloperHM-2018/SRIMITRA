<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid ">
                    <div class="page-title-box">
                        <div class="row ">
                            <div class="col-md-10">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <!--<a href="<?= base_url('admin_Dashboard/merchant_add') ?>" class="btn btn-light">Add <?= $title ?></a>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <?php if ($msg = $this->session->flashdata('msg')) :
                                            $msg_class = $this->session->flashdata('msg_class') ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert <?= $msg_class; ?>"><?= $msg; ?></div>
                                                </div>
                                            </div>
                                        <?php
                                            $this->session->unset_userdata('msg');
                                        endif; ?>
                                        <form method="post" enctype="multipart/form-data" action="" class="custom-validation">
                                            <div class="row">
                                                 
                                                <div class="col-md-12">
                                                    <br>
                                                    <label class="form-label">Description for Child care homes</label>
                                                    <input type="text" name="email" id="vid" value="<?= $last_merchant[0]['email'] ?>" hidden/>
                                                    <input type="text" name="number" id="vid" value="<?= $last_merchant[0]['number'] ?>" hidden/>
                                                    <input type="text" name="password" id="vid" value="<?= sessionId('login_password') ?>" hidden/>
                                                    <div class="form-group">
                                                        <p>Do you want to send Welcome Marchant mail to <b><?= $last_merchant[0]['m_name'] ?></b> on <b><?= $last_merchant[0]['email'] ?></b></p>
                                                    </div>
                                                    <textarea id="editor1" name="message">
                                                     <p >Congratulations. We are excited to have you onboard.<br>
<b>Lets get you started Find the login credentials below -</b><br>
<b>User name : 9039005753</b><br>
<b>Password : sun903</b><br><br>

You can change your password any time by login in or from here - https://www.srimitraindia.com/new/Index/update_profile<br>
We are excited for the journey we would travel together.<br>
We started with 1 Mitra and today we are a family of 1000plus . Now that we have you, add more Mitras to our family.<br>
We are Proud to have you.</p> </textarea>
                                                </div>
                                            </div>
                                            <div class="mb-0">
                                                <div class="col-md-3">
                                                    <br>
                                                    <button type="submit" id="subcch" class="btn btn-primary waves-effect waves-light me-1">
                                                        Yes
                                                    </button>
                                                    <a href="<?= base_url('Admin_Dashboard/mail_confirmation') ?>">No</a>
                                                    <span class="phonemsg  " style="color:#9F0B0B;"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>

                    </div>
                </div>



            </div>

        </div>


        <?php include 'template/footer_link.php'; ?>

 

</body>

</html>