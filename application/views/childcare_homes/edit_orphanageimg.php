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
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                </div>
                            </div>
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
                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label class=""> Upload Image </label>
                                                            <div class="pos-relative">
                                                                <input class="form-control pd-r-80" required="" type="file" name="img" accept="image/*"/>
                                                                <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                            </div>
                                                        </div>


                                                        <div class="mb-0">
                                                            <div class="col-md-6">
                                                                <br>
                                                                <button name="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            foreach ($orphanageimg as $img) {
                                            ?>
                                                <div class="col-md-3 col-lg-3 col-xl-3 p-1">
                                                    <img src="<?= base_url('uploads/orphange/gallery/') . $img['img'] ?>" style="width: 100%;" class="shadow" />
                                                    <a href="<?= base_url() ?>admin_Dashboard/edit_orphanageimg?BdID=<?= $img['gid'] ?>&&pid=<?= $img['orphanage_id'] ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>

                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </section>
                            <!-- main-panel ends -->
                        </div>
                        <!-- page-body-wrapper ends -->
                    </div>
                    <!-- container-scroller -->
                    <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>