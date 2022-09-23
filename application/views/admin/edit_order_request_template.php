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
                            <div class="col-md-8">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"><?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">


                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>General info </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="date" value="<?= convertDateymd($order[0]['create_date']) ?>" readonly>
                                                        <input type="hidden" class="form-control" name="requestid" value="<?= $order[0]['ortid'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="product_title" value="<?= $order[0]['product_title'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Combo Price</label>
                                                        <input type="text" class="form-control" name="combo_price" value="<?= $order[0]['combo_price'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cover Image</label>
                                                        <input type="file" class="form-control" name="cover" value="">
                                                        <img src="<?= base_url('uploads/ordercover/' . $order[0]['cover']) ?>" style="width:100px;" />
                                                    </div>
                                                </div>

                                                <div class="col-md-12 row ">
                                                    <div class="col-md-12">
                                                        <br>
                                                        <label>Select CCH </label>
                                                        <?php $cchstr = json_decode($order[0]['cch_id_list']); ?>
                                                    </div>
                                                    <?php foreach ($cch as $cchrow) {
                                                    ?>
                                                        <div class="col-md-4">
                                                            <input type="checkbox" name="cch[]" value="<?= $cchrow['id']; ?>" <?= ((is_array($cchstr)) ? ((in_array($cchrow['id'], $cchstr)) ? 'checked' : '') : '') ?>> <?= $cchrow['name']; ?>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group p-2 text-center">
                                                        <input type="submit" class="btn btn-primary" value="Send request">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add product</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('admin_dashboard/add_combo_product') ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" class="form-control" name="orderpro" value="<?= decryptId($ortid) ?>">
                                                <div class="fieldGroup row">
                                                    <div class="col-md-6 col-5">
                                                        <div class="form-group">
                                                            <label>Product</label>

                                                            <select class="form-control" name="product[]">
                                                                <option value="">Select product</option>
                                                                <?php
                                                                if (!empty($product)) {
                                                                    foreach ($product as $row) {
                                                                        $products = getRowById('products', 'product_id', $row['product_id']);
                                                                ?>
                                                                        <option value="<?= $row['id']; ?>"><?= $products[0]['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>) (MP: Rs. <?= $row['srimitra_price']; ?> ) (SP: Rs. <?= $row['srimitra_price']; ?>)</option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-4">
                                                        <div class="form-group">
                                                            <label>Qty.</label>
                                                            <input type="number" class="form-control" name="quantity[]" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-3">
                                                        <label> ADD</label>
                                                        <a href="javascript:void(0)" class="form-control btn btn-success addMore">+ </a>
                                                    </div>
                                                </div>
                                                <div class="fieldGroupCopy row" style="display: none;">
                                                    <div class="col-md-6 col-5">
                                                        <div class="form-group">
                                                            <label>Product</label>

                                                            <select class="form-control" name="product[]">
                                                                <option value="">Select product</option>
                                                                <?php
                                                                if (!empty($product)) {
                                                                    foreach ($product as $row) {
                                                                        $products = getRowById('products', 'product_id', $row['product_id']);
                                                                ?>
                                                                        <option value="<?= $row['id']; ?>"><?= $products[0]['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>) (MP: Rs. <?= $row['srimitra_price']; ?> ) (SP: Rs. <?= $row['srimitra_price']; ?>)</option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-4">
                                                        <div class="form-group">
                                                            <label>Qty.</label>
                                                            <input type="number" class="form-control" name="quantity[]" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-3">
                                                        </br>
                                                        <a href="javascript:void(0)" class="form-control btn btn-primary remove"> - </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group p-2 text-center">
                                                        <input type="submit" class="btn btn-primary" value="Add Product">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-header">
                                        <h4>Update product</h4>

                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('admin_dashboard/update_combo_product') ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <?php
                                                if (!empty($order)) {
                                                    $i = 1;
                                                    $data = getRowById('order_request_template_product', 'ort_id', $order[0]['ortid']);
                                                    if (!empty($data)) {
                                                        foreach ($data as $datarow) {
                                                            // print_R($datarow);
                                                            // $data = getSingleRowById('products', array('product_id' => $datarow['product']));
                                                ?>
                                                            <div class="row">
                                                                <div class="col-md-5 col-5">
                                                                    <div class="form-group">
                                                                        <label>Product</label>
                                                                        <input type="hidden" class="form-control" name="orderpro" value="<?= $datarow['id'] ?>">
                                                                        <select class="form-control" name="product">
                                                                            <option value="">Select product</option>
                                                                            <?php
                                                                            if (!empty($product)) {
                                                                                foreach ($product as $row) {
                                                                                    $products = getRowById('products', 'product_id', $row['product_id']);
                                                                            ?>
                                                                                    <option value="<?= $row['id']; ?>" <?= (($row['id'] == $datarow['product']) ? 'selected' : '') ?>><?= $products[0]['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>) (MP: Rs. <?= $row['product_price']; ?> ) (SP: Rs. <?= $row['srimitra_price']; ?>)</option>
                                                                            <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-4">
                                                                    <div class="form-group">
                                                                        <label>Qty.</label>
                                                                        <input type="number" class="form-control" name="quantity" value="<?= $datarow['quantity']; ?>">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-3">
                                                                    <br>
                                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                                </div>
                                                                <div class="col-md-2 col-3">
                                                                    <br>
                                                                    <a href="<?= base_url('admin_Dashboard/delete_combo_product/' . $datarow['id']) ?>" class="btn btn-primary" onclick="return confirm('Are you sure ?')"">Delete</a>
                                                                </div>
                                                            </div>
                                                <?php
                                                        }
                                                    }
                                                }

                                                ?>



                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>


                        </div>
                    </div>
                </div>
                <!-- container-scroller -->
                <?php $this->load->view('admin/template/footer_link'); ?>
                <script type=" application/javascript">
                                                                        $(document).ready(function() {
                                                                        //group add limit
                                                                        var maxGroup = 200;
                                                                        //add more fields group
                                                                        $(document).on('click', '.addMore', function() {
                                                                        //$(".addMore").click(function() {
                                                                        if ($('body').find('.fieldGroup').length < maxGroup) { var fieldHTML='<div class="fieldGroup row">' + $(".fieldGroupCopy").html() + '</div>' ; $('body').find('.fieldGroup:last').after(fieldHTML); } else { alert('Maximum ' + maxGroup + ' groups are allowed.'); } }); $("body").on("click", ".remove" , function() { $(this).parents(".fieldGroup").remove(); }); }); </script>
                                                                </div>
                                                            </div>
                                            </div>
</body>

</html>