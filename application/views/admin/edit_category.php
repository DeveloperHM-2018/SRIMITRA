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
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> Edit</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/view_category') ?>" class="btn btn-light"> <?= $title ?> List</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php foreach ($categoryInfo as $row) {
                                        ?>

                                            <form action="<?php echo base_url() . 'admin_Dashboard/editcategory' ?>" method="post" enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                                        <div class="">
                                                            <input class="form-control" type="hidden" name="id" value="<?= $row->category_id; ?>">


                                                            <div class="form-group">
                                                                <label class="">Category Name</label>
                                                                <input class="form-control" type="text" name="cat_name" value="<?= $row->cat_name; ?>">
                                                            </div>
                                                            <?php
                                                            if ($row->image != '' && $row->image != 0) {
                                                            ?>
                                                                <img src="<?php echo base_url();
                                                                            ?>uploads/category/<?php echo $row->image ?>" width="130px" />
                                                            <?php
                                                            } else {
                                                            ?>
                                                            <?php
                                                            }
                                                            ?>


                                                            <div class="form-group">
                                                                <label class=""> Image</label>
                                                                <div class="pos-relative">
                                                                    <input class="form-control pd-r-80" type="file" name="image" accept="image/*" />
                                                                    <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <br>
                                                                <button name="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- content-wrapper ends -->
                            <!-- partial:partials/_footer.html -->
                            <?php $this->load->view('admin/template/footer'); ?>
                            <!-- partial -->
                        </div>
                    </div>
                </div>

                <!-- page-body-wrapper ends -->
            </div>

        </div>
    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>