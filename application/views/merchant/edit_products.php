<!doctype html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('merchant/template/header'); ?>

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
                                <div class=" d-flex align-items-center justify-content-between">
                              
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
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <?php
                                                    if ($productInfo['img'] != '' && $productInfo['img'] != 0) {
                                                    ?>
                                                        <img src="<?= base_url() ?>uploads/merchant_products/<?= $productInfo['img'] ?>" width="100%" />
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-9 col-lg-9 col-xl-9">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label class=""> Category </label>
                                                            <select class="form-control" name="category_id" id="category_id_im">
                                                                <option>Select Product Category</option>
                                                                <?php
                                                                foreach ($category as $rows) {
                                                                ?>
                                                                    <option value="<?= $rows['category_id']; ?>" <?= (($rows['category_id'] == $productInfo['category_id']) ? 'selected' : '') ?>>
                                                                        <?= $rows['cat_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class=""> Sub Category </label>
                                                            <select class="form-control" name="subcategory_id" id="sub_category_id_im">
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                $subcat = getRowById('sub_category', 'sub_category_id', $productInfo['subcategory_id']);
                                                                if ($subcat != '') {
                                                                ?>
                                                                    <option value="<?= $subcat[0]['sub_category_id']; ?>"><?= $subcat[0]['subcat_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="">Product Name</label>

                                                            <select class="form-control" name="product_id" id="product_nm">
                                                                <option value="">Select Product name</option>
                                                                <?php foreach ($product as $rows) {
                                                                ?>
                                                                    <option value="<?= $rows['product_id']; ?>" <?= (($productInfo['product_id'] == $rows['product_id']) ? 'selected' : '') ?>><?= $rows['pro_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="">Product Image</label>
                                                            <input type="file" class="form-control" name="img_temp" accept="image/*" id="imgInp" />
                                                            <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                            <img id="blah" src="#" alt="  Image Preview here" style="width:150px;" />

                                                            <input type="hidden" class="form-control" name="img" value="<?= $productInfo['img']  ?>" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>MRP price</label>
                                                                <input type="text" class="form-control" name="product_price" placeholder="price" value="<?= $productInfo['product_price']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Sale Price</label>
                                                                <input type="text" class="form-control" name="sale_price" placeholder="sale price" value="<?= $productInfo['sale_price']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Purchase Price</label>
                                                                <input type="text" class="form-control" name="purchase_price" placeholder="purchase price" value="<?= $productInfo['purchase_price']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <label class="">Quantity</label>
                                                            <input type="text" placeholder="Enter Product Quantity" name="quantity" class="form-control" value="<?= $productInfo['quantity']; ?>">
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <label class="">Quantity Type</label>
                                                            <select class="form-control" name="quantity_type">
                                                                <option value="">Select type</option>
                                                                <?php $getType = getAllData('tbl_quantity_type');
                                                                foreach ($getType as $type) { ?>
                                                                    <option value="<?= $type['quantity_name'] ?>" <?= ((strtolower($type['quantity_name']) == strtolower($productInfo['quantity_type'])) ? 'selected' : '') ?>><?= $type['quantity_name'] ?></option><?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="">Product Description</label>
                                                            <textarea cols="80" id="editor1" name="description" rows="10"><?= $productInfo['description']; ?></textarea>
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
                                    </section>
                                </div>
                                <!-- container-scroller -->
                                <?php $this->load->view('admin/template/footer_link'); ?>
                                <script>
                                    $(document).on('change', '#category_id_im', function() {
                                        // $('#category_id_im').change(function() {
                                        var category_id = $('#category_id_im').val();

                                        $.ajax({
                                            method: "POST",
                                            url: '<?= base_url('Ajax/get_subcategory') ?>',
                                            data: {
                                                category_id: category_id
                                            },
                                            success: function(response) {
                                                $('#sub_category_id_im').html(response);
                                            }
                                        });
                                    });
                                    $(document).on('change', '#sub_category_id_im', function() {
                                        // $('#category_id_im').change(function() {
                                        var subcategory_id = $('#sub_category_id_im').val();
                                        var category_id = $('#category_id_im').val();

                                        $.ajax({
                                            method: "POST",
                                            url: '<?= base_url('Ajax/get_product') ?>',
                                            data: {
                                                category_id: category_id,
                                                subcategory_id: subcategory_id
                                            },
                                            success: function(response) {
                                                $('#product_nm').html(response);
                                            }
                                        });
                                    });
                                    imgInp.onchange = evt => {
                                        const [file] = imgInp.files
                                        if (file) {
                                            blah.src = URL.createObjectURL(file)
                                        }
                                    }
                                </script>
</body>

</html>