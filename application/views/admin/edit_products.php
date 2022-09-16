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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?>  </h4>

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
                                        <?php foreach ($productInfo as $row) {
                                            // print_r($row);
                                        ?>

                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                                        <div class="row">

                                                            <div class="form-group col-md-3">
                                                                <label class="">Product Category Name</label>
                                                                <select class="form-control" name="category_id" id="category_id">
                                                                    <option>Select Product Category</option>
                                                                    <?php foreach ($category as $rows) {
                                                                    ?>
                                                                        <option value="<?= $rows['category_id']; ?>" <?= (($rows['category_id'] == $row['category_id']) ? 'selected' : '') ?>><?= $rows['cat_name']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="">Product Sub Category Name</label>
                                                                <select class="form-control" name="subcategory_id" id="sub_category_id">
                                                                    <?php
                                                                    $subcat = getRowById('sub_category', 'sub_category_id', $row['subcategory_id']);
                                                                    ?>
                                                                    <option value="<?= $subcat[0]['sub_category_id']; ?>"><?= $subcat[0]['subcat_name']; ?></option>

                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label class="">Product Name</label>
                                                                <input class="form-control" type="text" name="pro_name" value="<?= $row['pro_name']; ?>">
                                                            </div>


                                                            <div class="col-md-3 form-group d-none">

                                                                <label class="">Quantity</label>
                                                                <input type="text" placeholder="Enter Product Quantity" name="quantity" class="form-control" value="<?= $row['quantity']; ?>">


                                                            </div>
                                                            <div class="col-md-3 form-group  d-none">

                                                                <label class="">Quantity Type</label>

                                                                <select class="form-control" name="quantity_type">
                                                                    <option value="">Select type</option>
                                                                    <?php $getType = getAllData('tbl_quantity_type');
                                                                    foreach ($getType as $type) { ?>
                                                                        <option value="<?= $type['quantity_name'] ?>" <?= ((strtolower($type['quantity_name']) == strtolower($row['quantity_type'])) ? 'selected' : '') ?>><?= $type['quantity_name'] ?></option><?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3  d-none">
                                                                <label class="">Product Price</label>
                                                                <input class="form-control" type="text" name="price" value="<?= $row['price']; ?>">
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label class="">Product Image</label>

                                                                <input type="file" class="form-control" name="img_temp" accept="image/*" />
                                                                <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                                <input type="hidden" class="form-control" name="img" value="<?= $row['img']  ?>" />
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <?php
                                                                if ($row['img'] != '' && $row['img'] != 0) {
                                                                ?>
                                                                    <img src="<?= base_url() ?>uploads/products/<?= $row['img'] ?>" width="100px" />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                <?php
                                                                }
                                                                ?>

                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label class="">Product Description</label>
                                                                <textarea cols="80" id="editor1" name="description" rows="10"><?= $row['description']; ?></textarea>
                                                            </div>



                                                            <div class="form-group col-md-12">
                                                                <br>
                                                                <button type="submit" class="btn btn-primary">Update</button>
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
                                </section>

                            </div>
                            <!-- container-scroller -->
                            <?php $this->load->view('admin/template/footer_link'); ?>
                            <script>
                            $(document).on('change', '#category_id', function(){
                                //$('#category_id').change(function() {
                                    var category_id = $('#category_id').val();
                                    console.log(category_id);
                                    $.ajax({
                                        method: "POST",
                                        url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                                        data: {
                                            category_id: category_id
                                        },
                                        success: function(response) {
                                            $('#sub_category_id').html(response);
                                        }
                                    });
                                });
                            </script>
</body>

</html>