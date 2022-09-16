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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <!-- <a href="<?= base_url('admin_Dashboard/merchant_add') ?>" class="btn btn-light">Add <?= $title ?></a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="title" class="form-control" value="<?= $title_data ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                                        <div class="col-md-10">
                                                            <textarea name="description" id="editor1"  style="width: 100%"><?= $description ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="save" class="btn btn-primary w-md">Save</button>
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