<!doctype html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('childcare_homes/template/header'); ?>
    <?php $this->load->view('childcare_homes/template/menu'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">

                            <div class="col-md-10">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper"> 

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">


                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <?php
                                                if ($this->session->has_userdata('msg')) {
                                                    echo '<p class="alert ' . $this->session->userdata('msg_class') . '">' . $this->session->userdata('msg') . '</p>';
                                                    $this->session->unset_userdata('msg');
                                                }
                                                ?>
                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label class="">Old Password</label>
                                                            <input class="form-control" type="password" name="oldpassword" value="">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="">New Password</label>
                                                            <input class="form-control" type="password" name="password" value="">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="">Confirm Password</label>
                                                            <input class="form-control" type="password" name="confirmpassword" value="">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <br>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                </section>

                            </div>
                            <!-- container-scroller -->
                            <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>