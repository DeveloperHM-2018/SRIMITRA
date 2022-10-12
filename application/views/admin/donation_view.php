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
                            <div class="col-md-4">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <?php if ($msg = $this->session->flashdata('msg')) :
                                        $msg_class = $this->session->flashdata('msg_class') ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                            </div>
                                        </div>
                                    <?php
                                        $this->session->unset_userdata('msg');
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">

                                <?php
                                if (!empty($donation)) {
                                    $i = 1;
                                ?>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Order details</h4>
                                            <table class="table table-bordered dt-responsive nowrap" style="
                                                border-collapse: collapse;
                                                border-spacing: 0;
                                                width: 100%;
                                                ">
                                                <thead>
                                                    <tr>

                                                        <th>Date</th>

                                                        <th>Status</th>
                                                        <th>payment ID </th>
                                                        <th>Total Amount</th>

                                                        <th>issued Payment</th>
                                                        <!-- <th>View</th> -->

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>


                                                        <td> <?= convertDatedmy($donation['create_date']); ?> </td>

                                                        <td>
                                                            <?php if ($donation['status'] == '0') {
                                                            ?>

                                                                <button class="btn btn-success status accept<?= $donation['id']; ?> status<?= $donation['id']; ?>" data-id="<?= $donation['id']; ?>" data-status="accept">ACCEPT IT</button>
                                                                <button class="btn btn-danger status reject<?= $donation['id']; ?> status<?= $donation['id']; ?>" data-id="<?= $donation['id']; ?>" data-status="reject">REJECT IT</button>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="btn btn-<?= (($donation['status'] == '0') ? 'primary' : (($donation['status'] == '1') ? 'success' : (($donation['status'] == '2') ? 'danger' : ''))) ?>">
                                                                    <?= (($donation['status'] == '0') ? 'NEW' : (($donation['status'] == '1') ? 'ACCEPTED' : (($donation['status'] == '2') ? 'REJECTED' : ''))) ?>
                                                                </span>
                                                            <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td> <?= $donation['payment_id']; ?> </td>
                                                        <td>Rs. <?= $donation['totalamount']; ?> </td>

                                                        <td>
                                                            <?php
                                                            if ($donation['status'] == '1') {
                                                                if ($donation['chechout_status'] == 0) {
                                                            ?>

                                                                    <div class="modal fade bs-example-modal-center<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                                        Add transaction ID
                                                                                    </h5>
                                                                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                                                                    <!-- <span aria-hidden="true">&times;</span> -->
                                                                                    <!-- </button> -->
                                                                                </div>
                                                                                <form action="<?= base_url('admin_Dashboard/statusupdate') ?>" method="POST">
                                                                                    <div class="modal-body">
                                                                                        <label>Transaction id</label>
                                                                                        <input type="hidden" name="checkout_id" value="<?= $donation['id'] ?>" required />

                                                                                        <input type="hidden" name="merchant_id" value="<?= $donation['merchant_id'] ?>" required />

                                                                                        <input type="text" class="form-control" name="payment_id" value="" placeholder="XXXXXX234234234" required />
                                                                                        <br>
                                                                                        <label>Amount</label>
                                                                                        <input type="text" class="form-control" name="amount" value="<?= $donation['totalamount']; ?>" required placeholder=" " />
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss=".modal">Close</button> -->
                                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-info">
                                                                        Issued Payment
                                                                    </button>
                                                            <?php
                                                                }
                                                            } else {
                                                                echo '--';
                                                            }
                                                            ?>
                                                            <?php //echo (($row['razorpay_payment_id'] == '') ? '<a href="#" class="btn btn-warning">Payment Pending</a> ' : $row['razorpay_payment_id']); 
                                                            ?>
                                                        </td>

                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Product list</h4>
                                            <table class="table table-bordered dt-responsive nowrap" style="
                                                border-collapse: collapse;
                                                border-spacing: 0;
                                                width: 100%;
                                                ">

                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th colspan="2">Product</th>
                                                        <th>Qty.</th>
                                                        <th>Amount.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $data = getRowById('checkout_product', 'checkoutid', $donation['id']);

                                                    $j = 1;
                                                    if (!empty($data)) {
                                                        foreach ($data as $datarow) {

                                                            if ($datarow['product_status'] == 0) {
                                                                $orderProduct = getSingleRowById('tbl_orphange_order_product', array('id' => $datarow['product_id']));
                                                                $merchant = getSingleRowById('merchant_products', array('id' => $orderProduct['product']));
                                                            }
                                                            if ($datarow['product_status'] == 1) {
                                                                $merchant = getSingleRowById('order_request_template', array('ortid' => $datarow['product_id']));
                                                            }
                                                    ?>
                                                            <tr style="border-bottom: 1px solid black ;">
                                                                <th scope="row"><?= $j ?></th>
                                                                <th> <img src="<?= ((file_exists($datarow['product_img'])) ? $datarow['product_img'] : base_url() . 'uploads/default.jpg')  ?>" style="width: 30px;height: 30px;" /></th>
                                                                <td><?= (($datarow['product_status'] == 0) ? $merchant['product_name'] : $merchant['product_title']) ?><br>
                                                                    <?php
                                                                    if ($datarow['product_status'] == 0) {
                                                                    ?>
                                                                        ( <?= $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?>)
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?= $datarow['product_quantity']; ?></td>
                                                                <td> Rs. <?= $datarow['total_pro_amt']; ?></td>
                                                            </tr>
                                                            <?php
                                                            $i = 1;
                                                            if ($datarow['product_status'] == 1) {
                                                                $data = getRowById('order_request_template_product', 'ort_id', $datarow['product_id']);
                                                                if (!empty($data)) {
                                                                    foreach ($data as $datarow) {
                                                                        $product_combo = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                            ?>
                                                                        <tr>
                                                                            <th scope="row"><?= $j ?>.<?= $i ?></th>
                                                                            <td> <img src="<?= setImage($fetchrow['img'], 'uploads/merchant_products/')  ?>" style="width: 30px;height: 30px;" /></td>
                                                                            <td> <?= $product_combo['product_name']; ?></td>
                                                                            <td><?= $product_combo['quantity']; ?> <?= $product_combo['quantity_type']; ?> X <?= $datarow['quantity']; ?></td>
                                                                            <td> Rs. <?= $product_combo['srimitra_price']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                        $i++;
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                    <?php
                                                            $j++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>CCH Details</h4>

                                            <?php

                                            $cch = getSingleRowById('tbl_orphanage', array('id' => $donation['orphane_id']));
                                            if (!empty($cch)) {


                                            ?>
                                                <table class="table table-bordered dt-responsive nowrap" style="
                                                        border-collapse: collapse;
                                                        border-spacing: 0;
                                                        width: 100%;
                                                        ">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Category</th>
                                                            <th>Contact No.</th>
                                                            <th>Email </th>
                                                            <th>Address </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        <tr>

                                                            <td><?= $cch['category'] ?></td>
                                                            <td><?= $cch['name'] ?></td>
                                                            <td><?= $cch['number'] ?> </td>
                                                            <td><?= $cch['email'] ?>
                                                            </td>
                                                            <td><?= $cch['address'] ?></td>
                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/child_care_home_details/<?= encryptId($cch['id']) ?>" target="_blank" class="btn btn-danger">View Details</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php


                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Merchant details</h4>

                                            <?php
                                            $merchant = getSingleRowById('tbl_merchant_registration', array('id' => $donation['merchant_id']));
                                            if (!empty($merchant)) {
                                                $imgcount = getNumRows('tbl_orphanage_gallery', array('orphanage_id' => $merchant['id']));
                                            ?>
                                                <table class="table table-bordered dt-responsive nowrap" style="
                                                        border-collapse: collapse;
                                                        border-spacing: 0;
                                                        width: 100%;
                                                        ">
                                                    <thead>
                                                        <tr>

                                                            <th>Shop Name</th>
                                                            <th>Merchant Name</th>
                                                            <th>Number</th>
                                                            <th>Email</th>


                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        <tr>

                                                            <td><?= $merchant['shop_name'] ?></td>
                                                            <td><?= $merchant['m_name'] ?></td>
                                                            <td><?= $merchant['number'] ?></td>
                                                            <td><?= $merchant['email'] ?>
                                                            </td>
                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/merchant_details/<?= encryptId($merchant['id']) ?>" class="btn btn-danger">View Details</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php

                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            $user = getSingleRowById('tbl_user', array('uid' => $donation['user_id']));
                                            if (!empty($user)) {


                                            ?>
                                                <h4>User Details</h4>
                                                <table class="table table-bordered dt-responsive nowrap" style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    ">
                                                    <thead>
                                                        <tr>

                                                            <th>Name</th>
                                                            <th>Number</th>
                                                            <th>Email</th>
                                                            <th>Images</th>
                                                            <!-- <th>Social Links</th> -->

                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        <tr>

                                                            <td><?= $donation['name'] ?></td>

                                                            <td><?= $donation['number'] ?></td>
                                                            <td><?= $donation['email'] ?></td>
                                                            <td>
                                                                <img src="<?= setImage($user['img'], 'uploads/user/')  ?>" style="width: 50px;height: 50px;" />
                                                            </td>
                                                            <!-- <td> -->
                                                            <!-- <a href="<?php base_url() . $user['fb'] ?>" class="btn" target="_blank"><i class="fab fa-facebook-f"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $user['insta'] ?>" class="btn" target="_blank"><i class="fab fa-instagram"></i>
                                                                </a>

                                                                <a href="<?php base_url() . $user['whatsapp'] ?>" class="btn" target="_blank"><i class="fab fa-whatsapp"></i>
                                                                </a>

                                                                <a href="<?php base_url() . $user['twitter'] ?>" class="btn" target="_blank"><i class="fab fa-twitter"></i>
                                                                </a>

                                                                <a href="<?php base_url() . $user['linkedin'] ?>" class="btn" target="_blank"><i class="fab fa-linkedin"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $user['google_plus'] ?>" class="btn" target="_blank"><i class="fab fa-google-plus"></i>
                                                                </a> -->
                                                            <!-- </td> -->
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            <?php

                                            }
                                            ?>


                                        <?php
                                        $i++;
                                    }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Merchant Payment List</h4>
                                            <?php
                                            $payment = getRowById('checkout_payment_to_merchant',  'checkout_id', $donation['id']);
                                            if (!empty($payment)) {



                                            ?>

                                                <table class="table table-bordered dt-responsive nowrap" style="
                                                        border-collapse: collapse;
                                                        border-spacing: 0;
                                                        width: 100%;
                                                        ">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Payment ID</th>
                                                            <th>Amount</th>
                                                            <!-- <th>Delete</th> -->
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php
                                                        foreach ($payment as $datarow) {
                                                        ?>
                                                            <tr>

                                                                <td><?= $datarow['create_date'] ?></td>

                                                                <td><?= $datarow['payment_id'] ?></td>
                                                                <td>Rs. <?= $datarow['amount'] ?></td>
                                                                <!-- <td> </td> -->

                                                            </tr>
                                                        <?php

                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>

                                            <?php


                                            }
                                            ?>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    </section>
                    <!--END PAGE CONTENT -->
                </div>

                <?php include 'template/footer_link.php'; ?>

                <script>
                    $(document).on('click', '.status', function() {
                        // $('.status').click(function() {
                        var id = $(this).data('id');
                        var status = $(this).data('status');
                        console.log(id);
                        console.log(status);



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
                </script>

</body>

</html>