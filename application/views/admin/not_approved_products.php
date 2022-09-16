<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title ?></h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to Srimitra Dashboard</li>
                                    </ol>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4>Unapproved Product List</h4>
                                            </div>
                                        </div>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                            border-collapse: collapse;
                                            border-spacing: 0;
                                            width: 100%;
                                            ">
                                            <thead>
                                                <tr>
                                                    <th>S No</th>
                                                    
                                                    <th>Merchant</th>
                                                    <th>Product</th>
                                                    <th>Merchant price</th>
                                                    <th>Quantity</th>
                                                    <th>Srimitra Price</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($unapproved_products)) {
                                                    $i = 1;
                                                    foreach ($unapproved_products as $pro) {
                                                        $merchant = getSingleRowById('tbl_merchant_registration', array('id' => $pro['merchant_id']));
                                                        $product = getSingleRowById('products', array('product_id' => $pro['product_id']));
                                                        // $cat = getRowById('category', 'category_id', $fetch['category_id']);
                                                        // $subcat = getRowById('sub_category', 'sub_category_id', $fetch['subcategory_id']);

                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?= $merchant['shop_name']; ?><br><i>Add. <?= wordwrap($merchant['address'],40,'<br>'); ?></i></td>
                                                            <td><?= $product['pro_name']; ?><br><?= $pro['description']; ?></td>
                                                            <td>MRP- Rs. <?= $pro['product_price']; ?><br>
                                                            Sale Pr.- Rs. <?= $pro['sale_price']; ?><br>
                                                            Pur. Pr.- Rs. <?= $pro['purchase_price']; ?></td>
                                                            <td><?= $pro['quantity']; ?> <?= $pro['quantity_type']; ?></td>
                                                            <td> <form action="<?= base_url('Admin_Dashboard/') ?>update_srimitra_price" method="POST"><input type="hidden" name="mpid" value="<?= $pro['id'] ?>" class="form-control"/><br><input type="text" name="srimitra_price" value="" class="form-control"/><br><input type="submit" class="btn btn-info" value="Save" /></form></td>
<td> <form action="<?= base_url('Admin_Dashboard/') ?>update_status" method="POST"><input type="hidden" name="mpid" value="<?= $pro['id'] ?>" class="form-control"/><br><input type="submit" class="btn btn-danger" value="Decline" /></form></td>


                                                        </tr>

                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $(document).on('click', '.status', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            console.log(id);
            console.log(status);
            var msg = confirm('Are you sure ?');
            if (msg) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Ajax/requestStatus') ?>",
                    data: {
                        id: id,
                        status: status
                    },
                    beforeSend: function() {
                        $(this).text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == '0') {
                            $('.reject' + id).hide();
                        } else if (response == '1') {
                            $('.accept' + id).hide();
                        } else if (response == '2') {
                            alert('Server Error');
                        } else {}
                    }
                });
            }

        });
        $(document).on('click', '.donationstatus', function() {
            // $('.status').click(function() {
            var id = $(this).data('id');
            var status = $(this).data('status');

            var msg = confirm('Are you sure ?');
            if (msg) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Ajax/donationrequestStatus') ?>",
                    data: {
                        id: id,
                        status: status
                    },
                    beforeSend: function() {
                        $(this).text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == '0') {
                            $('.dreject' + id).hide();
                        } else if (response == '1') {
                            $('.daccept' + id).hide();
                        } else if (response == '2') {
                            alert('Server Error');
                        } else {}
                    }
                });
            }

        });
    </script>
</body>

</html>