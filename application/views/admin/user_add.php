<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="<?= base_url('admin_Dashboard/orphanage') ?>" class="btn btn-light"> orphanage List</a>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="number"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email"  />
                                                </div>
                                                 
                                              
                                                 <div class="col-md-4">
                                                    <label class="form-label">Images</label>
                                                    <input class="form-control pd-r-80" type="file" name="img"   accept="image/*" />
                                                                <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                </div>


                                                <div class="col-md-4">
                                                    <label class="form-label">Linkedin</label>
                                                    <input class="form-control pd-r-80" type="text" name="linkedin">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">facebook</label>
                                                    <input type="text" class="form-control" name="fb"  />
                                                </div>
                                                 <div class="col-md-4">
                                                    <label class="form-label">Whatsapp</label>
                                                    <input class="form-control pd-r-80" type="text" name="whatsapp">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">twitter</label>
                                                    <input type="text" class="form-control" name="twitter"  />
                                                </div>
                                                 <div class="col-md-4">
                                                    <label class="form-label">Instagram</label>
                                                    <input class="form-control pd-r-80" type="text" name="insta">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Google Plus</label>
                                                    <input class="form-control pd-r-80" type="text" name="google_plus">
                                                </div>
                                                </br>

                                              

                                            </div>

                                            <div class="mb-0">
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Form -->
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>

                        </div>

                    </div>
                </div>



            </div>

        </div>


        <?php include 'template/footer_link.php'; ?>


</body>

</html>
