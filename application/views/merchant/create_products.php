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
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Add <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/create_products') ?>" class="btn btn-light"> not in list ? create new product</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <form action="<?php echo base_url() . 'merchant/addproducts' ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">



                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Category Name</label>
                                                            <select class="form-control" name="category_id" id="category_id">
                                                                <option>Select Product Category</option>
                                                                <?php foreach ($category as $row) {
                                                                ?>
                                                                    <option value="<?= $row['category_id']; ?>"><?= $row['cat_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Sub Category Name</label>
                                                            <select class="form-control" name="subcategory_id" id="sub_category_id">
                                                                <option>Select Product Category</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Name</label>
                                                            <input class="form-control" required="" type="text" name="pro_name">
                                                        </div>

                                                        <div class="col-md-4 form-group">

                                                            <label class="">Quantity</label>
                                                            <input type="text" placeholder="Enter Product Quantity" name="quantity" required value="" class="form-control">


                                                        </div>
                                                        <div class="col-md-4 form-group">

                                                            <label class="">Quantity Type</label>

                                                            <select class="form-control" name="quantity_type" required>
                                                                <option value="">Select type</option>
                                                                <?php $getType = getAllData('tbl_quantity_type');
                                                                foreach ($getType as $type) { ?>
                                                                    <option value="<?= $type['quantity_name'] ?>"><?= $type['quantity_name'] ?></option><?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Price</label>
                                                            <input class="form-control" type="text" name="price">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Sale Price</label>
                                                            <input type="text" class="form-control" name="sale_price" placeholder="sale price" value="">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Purchase Price</label>
                                                            <input type="text" class="form-control" name="purchase_price" placeholder="price" value="">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="">Add Product Image </label>
                                                            <div class="pos-relative">
                                                                <input class="form-control pd-r-80" required="" type="file" name="img">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="">Product Description</label>
                                                            <textarea cols="80" id="editor1" name="description" rows="10"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button class="btn  btn-primary ">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
                                    url: '<?= base_url('ajax/get_subcategory') ?>',
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