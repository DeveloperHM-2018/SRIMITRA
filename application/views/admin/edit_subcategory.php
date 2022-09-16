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
                                    <a href="<?= base_url('admin_Dashboard/view_subcategory') ?>" class="btn btn-light"> <?= $title ?> List</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        // print_r($categoryInfo);
                                        foreach ($categoryInfo as $row) {
                                        ?>
                                            <form action="<?php echo base_url() . 'admin_Dashboard/editsubcategory' ?>" method="post" enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                                        <div class="">
                                                            <input class="form-control" type="hidden" name="id" value="<?= $row['sub_category_id']; ?>">

                                                            <div class="form-group">
                                                                <label class="">Main Category </label>
                                                                <select class="form-control" name="cat_id">
                                                                    <?php
                                                                    foreach ($category as $cat) {
                                                                    ?>
                                                                        <option value="<?= $cat['category_id'] ?>" <?= (($row['cat_id'] == $cat['category_id']) ? 'selected' : '') ?>><?= $cat['cat_name'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </div>

                                                            <div class="form-group">
                                                                <label class="">Sub Category Name</label>
                                                                <input class="form-control" type="text" name="subcat_name" value="<?= $row['subcat_name'] ?>">
                                                            </div>





                                                            <div class="form-group">
                                                                <label class=""> Image</label>
                                                                <div class="pos-relative">
                                                                    <input class="form-control pd-r-80" type="file" name="image" accept="image/*" />
                                                                    <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if ($row['image'] != '' && $row['image'] != 0) {
                                                            ?>
                                                                <img src="<?php echo base_url();
                                                                            ?>uploads/subcategory/<?php echo $row['image'] ?>" width="130px" />
                                                            <?php
                                                            } else {
                                                            ?>
                                                            <?php
                                                            }
                                                            ?>

<br>
<br>
                                                            <button name="submit" class="btn btn-primary">Update</button>
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
                            </section>

                        </div>
                        <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
</div>