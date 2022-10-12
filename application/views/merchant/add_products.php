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
                            <div class="col-md-8">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Add <?= $title; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('merchant/import_products') ?>" class="btn btn-light"> Import product</a>
                                </div>
                            </div>
                            <!--<div class="col-md-2">-->
                            <!--    <div class="d-flex align-items-center justify-content-between">-->
                            <!--        <a href="<?= base_url('merchant/create_products') ?>" class="btn btn-light"> not in list ? create new product</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">

                                        <?php
                                        // if (!empty($merchant_products)) {
                                        //     foreach ($merchant_products as $data_row) {
                                        //         print_R($data_row);
                                        ?>

                                        <!-- <div class="fieldGroup row">
                                                    <div class="card">
                                                        <div class="card-body row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Product Name</label>
                                                                    <select class="form-control" name="product_nm[]" id="product_nm">
                                                                        <option value="">Select Product name</option>
                                                                        <?php //foreach ($product as $row) {
                                                                        ?>
                                                                            <option value="<?= $row['product_id']; ?>" <?= (($data_row['product_id'] == $row['product_id']) ? 'selected' : '') ?>><?= $row['pro_name']; ?></option>
                                                                        <?php
                                                                        //}
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Image</label>
                                                                    <input class="form-control pd-r-80" type="file" name="img[]" multiple accept="image/*">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>MRP price</label>
                                                                    <input type="text" class="form-control" name="price[]" placeholder="price" value="<?= $data_row['product_price']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Sale Price</label>
                                                                    <input type="text" class="form-control" name="sale_price[]" placeholder="sale price" value="<?= $data_row['sale_price']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Purchase Price</label>
                                                                    <input type="text" class="form-control" name="purchase_price[]" placeholder="purchase price" value="<?= $data_row['purchase_price']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 form-group">

                                                                <label class="">Quantity</label>
                                                                <input type="text" placeholder="Enter Product Quantity" name="quantity[]"   class="form-control"  value="<?= $data_row['quantity']; ?>">

                                                            </div>
                                                            <div class="col-md-2 form-group ">

                                                                <label class="">Quantity Type</label>

                                                                <select class="form-control" name="quantity_type[]">
                                                                    <option value="">Select type</option>
                                                                    <?php
                                                                    // $getType = getAllData('tbl_quantity_type');
                                                                    // foreach ($getType as $type) { 
                                                                    ?>
                                                                        <option value="<?= $type['quantity_name'] ?>" <?= (($data_row['quantity_type'] == $type['quantity_name']) ? 'selected' : '') ?>><?= $type['quantity_name'] ?></option>
                                                                        <?php //} 
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-20">
                                                                <label class="">Product Description</label>
                                                                 
                                                                <textarea name="description[]" class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <br>
                                                                <a href="javascript:void(0)" class="btn btn-danger remove">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                        <?php
                                        //     }
                                        // }
                                        ?>
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="form-group col-md-3">
                                                        <label class="">  Category Name</label>
                                                        <select class="form-control" name="category_id" id="category_id_im" required>
                                                            <option value="">Select Product Category</option>
                                                            <?php foreach ($category as $row) {
                                                            ?>
                                                                <option value="<?= $row['category_id']; ?>"><?= $row['cat_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="">  Sub Category Name</label>
                                                        <select class="form-control" name="subcategory_id" id="sub_category_id_im" required>
                                                            <option value="">Select Product Category</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <select class="form-control" name="product_nm" id="product_nm" required>
                                                                <option value="">Select Product name</option>
                                                                <?php foreach ($product as $row) {
                                                                ?>
                                                                    <option value="<?= $row['product_id']; ?>"><?= $row['pro_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Product Title</label>
                                                            <input type="text" class="form-control" name="title" placeholder="Product title" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input class="form-control pd-r-80" type="file" name="img" id="imgInp" multiple accept="image/*">
                                                            <img id="blah" src="#" alt="  Image Preview here" style="width:150px;" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>MRP price</label>
                                                            <input type="text" class="form-control" name="price" placeholder="price" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sale Price</label>
                                                            <input type="text" class="form-control" name="sale_price" placeholder="sale price" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Purchase Price</label>
                                                            <input type="text" class="form-control" name="purchase_price" placeholder="purchase price" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label class="">Quantity</label>
                                                        <input type="text" placeholder="Enter Product Quantity" name="quantity" value="" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-3 form-group ">

                                                        <label class="">Quantity Type</label>

                                                        <select class="form-control" name="quantity_type" required>
                                                            <option value="">Select type</option>
                                                            <?php $getType = getAllData('tbl_quantity_type');
                                                            foreach ($getType as $type) { ?>
                                                                <option value="<?= $type['quantity_name'] ?>"><?= $type['quantity_name'] ?></option><?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-20">
                                                        <label class="">Product Description</label>

                                                        <textarea name="description" class="form-control"></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="fieldGroup row">
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <select class="form-control" name="product_nm[]" id="product_nm">
                                                                <option value="">Select Product name</option>
                                                                <?php foreach ($product as $row) {
                                                                ?>
                                                                    <option value="<?= $row['product_id']; ?>"><?= $row['pro_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input class="form-control pd-r-80" type="file" name="img[]" multiple accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>MRP price</label>
                                                            <input type="text" class="form-control" name="price[]" placeholder="price" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Sale Price</label>
                                                            <input type="text" class="form-control" name="sale_price[]" placeholder="sale price" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Purchase Price</label>
                                                            <input type="text" class="form-control" name="purchase_price[]" placeholder="purchase price" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label class="">Quantity</label>
                                                        <input type="text" placeholder="Enter Product Quantity" name="quantity[]" value="" class="form-control">
                                                    </div>
                                                    <div class="col-md-2 form-group ">

                                                        <label class="">Quantity Type</label>

                                                        <select class="form-control" name="quantity_type[]">
                                                            <option value="">Select type</option>
                                                            <?php $getType = getAllData('tbl_quantity_type');
                                                            foreach ($getType as $type) { ?>
                                                                <option value="<?= $type['quantity_name'] ?>"><?= $type['quantity_name'] ?></option><?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-20">
                                                        <label class="">Product Description</label>
                                                         
                                                        <textarea name="description[]" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <br>
                                                        <a href="javascript:void(0)" class="btn btn-success addMore">ADD </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fieldGroupCopy row" style="display: none;">
                                            <div class="card">
                                                <div class="card-body row">
                                                <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <select class="form-control" name="product_nm[]" id="product_nm">
                                                                <option value="">Select Product name</option>
                                                                <?php foreach ($product as $row) {
                                                                ?>
                                                                    <option value="<?= $row['product_id']; ?>"><?= $row['pro_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input class="form-control pd-r-80" type="file" name="img[]" multiple accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>MRP price</label>
                                                            <input type="text" class="form-control" name="price[]" placeholder="price" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Sale Price</label>
                                                            <input type="text" class="form-control" name="sale_price[]" placeholder="sale price" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Purchase Price</label>
                                                            <input type="text" class="form-control" name="purchase_price[]" placeholder="purchase price" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label class="">Quantity</label>
                                                        <input type="text" placeholder="Enter Product Quantity" name="quantity[]" value="" class="form-control">
                                                    </div>
                                                    <div class="col-md-2 form-group ">

                                                        <label class="">Quantity Type</label>

                                                        <select class="form-control" name="quantity_type[]">
                                                            <option value="">Select type</option>
                                                            <?php $getType = getAllData('tbl_quantity_type');
                                                            foreach ($getType as $type) { ?>
                                                                <option value="<?= $type['quantity_name'] ?>"><?= $type['quantity_name'] ?></option><?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-20">
                                                        <label class="">Product Description</label>
                                                        
                                                        <textarea name="description[]" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </br>
                                                        <a href="javascript:void(0)" class="btn btn-danger remove">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                    <br><br>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
                <?php $this->load->view('admin/template/footer_link'); ?>
                <script>
                    $(document).on('change', '#category_id', function() {
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
                <script type="application/javascript">
                    $(document).ready(function() {
                        //group add limit
                        var maxGroup = 200;
                        //add more fields group
                        $(".addMore").click(function() {
                            if ($('body').find('.fieldGroup').length < maxGroup) {
                                var fieldHTML = '<div class="fieldGroup row">' + $(".fieldGroupCopy").html() + '</div>';
                                $('body').find('.fieldGroup:last').after(fieldHTML);
                            } else {
                                alert('Maximum ' + maxGroup + ' groups are allowed.');
                            }
                        });
                        $("body").on("click",
                            ".remove",
                            function() {
                                $(this).parents(".fieldGroup").remove();
                            });
                    });
                    imgInp.onchange = evt => {
                        const [file] = imgInp.files
                        if (file) {
                            blah.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                <script>
                    $(document).on('change', '#category_id', function() {
                        // $('#category_id').change(function() {
                        var category_id = $('#category_id').val();

                        $.ajax({
                            method: "POST",
                            url: '<?= base_url('Ajax/get_subcategory') ?>',
                            data: {
                                category_id: category_id
                            },
                            success: function(response) {
                                $('#sub_category_id').html(response);
                            }
                        });
                    });
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
                                subcategory_id:subcategory_id
                            },
                            success: function(response) {
                                $('#product_nm').html(response);
                            }
                        });
                    });
                </script>
</body>

</html>