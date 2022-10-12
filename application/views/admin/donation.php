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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <!-- <a href="<?= base_url('admin_Dashboard/add_category') ?>" class="btn btn-light">Add <?= $title ?></a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

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

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                            border-collapse: collapse;
                                            border-spacing: 0;
                                            width: 100%;
                                            ">
                                            <thead>
                                                <tr>
                                                    <th>S No</th>
                                                    <th>ORDER id</th>
                                                    <th>CCH</th>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Status</th>
                                                    <!-- <th>payment </th> -->
                                                    <th>View </th>
                                                    <th>issued Payment</th>
                                                    <!-- <th>View</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($donation)) {                                                                                                                       
                                                    $i = 1;
                                                    foreach ($donation as $orderrow) {
                                                        $count = getNumRows('checkout_product', array('checkoutid' => $orderrow['id']));
                                                        $user = getSingleRowById('tbl_user', array('uid' => $orderrow['user_id']));
                                                        $cch = getSingleRowById('tbl_orphanage', array('id' => $orderrow['orphane_id']));
                                                        $merchant = getSingleRowById('tbl_merchant_registration', array('id' => $orderrow['merchant_id']));
                                                        $data = getRowById('checkout_product', 'checkoutid', $orderrow['id']);
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td> <a  href="<?= base_url('admin_Dashboard/donation_view/' . $orderrow['id']); ?>"><?= str_replace('-', '', $orderrow['create_date_only']) . $orderrow['id'] ?></a></td>

                                                            <td><?= (($cch == '') ? '' : $cch['name']); ?></td>
                                                            <td> <?= convertDatedmy($orderrow['create_date']); ?> </td>
                                                            <td> User nm - <?= (($user == '') ? 'Guest User' : $user['name']); ?><br>Merchant - <?= (($merchant == '') ? '' : $merchant['shop_name']); ?>
                                                                <br>
                                                                <?php
                                                                if ($orderrow['status'] == '1' && ($orderrow != '')) {
                                                                    if ($orderrow['chechout_status'] == 6) {
                                                                        if ($orderrow['certificate'] == '') {
                                                                ?>
                                                                            <div class="modal fade bs-example-modal-center<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                                Upload Certificate
                                                                                            </h5>
                                                                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                                                                            <!-- <span aria-hidden="true">&times;</span> -->
                                                                                            <!-- </button> -->
                                                                                        </div>
                                                                                        <form action="<?= base_url('admin_Dashboard/uploadcertificate') ?>" method="POST" enctype="multipart/form-data">
                                                                                            <div class="modal-body">

                                                                                                <input type="text" name="email" value="<?= $orderrow['email'] ?>" required />
                                                                                                <input type="hidden" name="checkout_id" value="<?= $orderrow['id'] ?>" required />

                                                                                                <label>Upload file</label>
                                                                                                <input type="file" class="form-control" name="cert" required accept="image/*,.pdf" />
                                                                                                <br>



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
                                                                                Upload Tax benefit certificate
                                                                            </button>
                                                                        <?php
                                                                        } else {

                                                                        ?>
                                                                            <a href="<?= base_url('uploads/certificate/' . $orderrow['certificate']) ?>" target="_blank">
                                                                                View Tax benefit certificate
                                                                                </button>
                                                                    <?php
                                                                        }
                                                                    }
                                                                }
                                                                    ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($orderrow['status'] == '0') {
                                                                ?>

                                                                    <button class="btn btn-success status accept<?= $orderrow['id']; ?> status<?= $orderrow['id']; ?>" data-id="<?= $orderrow['id']; ?>" data-status="accept">ACCEPT IT</button>
                                                                    <button class="btn btn-danger status reject<?= $orderrow['id']; ?> status<?= $orderrow['id']; ?>" data-id="<?= $orderrow['id']; ?>" data-status="reject">REJECT IT</button>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="btn btn-<?= (($orderrow['status'] == '0') ? 'primary' : (($orderrow['status'] == '1') ? 'success' : (($orderrow['status'] == '2') ? 'danger' : ''))) ?>">
                                                                        <?= (($orderrow['status'] == '0') ? 'NEW' : (($orderrow['status'] == '1') ? 'ACCEPTED' : (($orderrow['status'] == '2') ? 'REJECTED' : ''))) ?>
                                                                    </span>
                                                                <?php
                                                                }
                                                                ?>

                                                            </td>
                                                            <!-- <td> payment_id - <?= $orderrow['payment_id']; ?> <br>Amount - Rs. <?= $orderrow['totalamount']; ?> </td> -->
                                                            <td> <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $orderrow['id']; ?>" aria-expanded="false" aria-controls="collapseExample<?= $orderrow['id']; ?>">
                                                                    Products (<?= $count ?>)
                                                                </button>
                                                                <a class="btn btn-warning mt-1" type="button" href="<?= base_url('admin_Dashboard/donation_view/' . $orderrow['id']); ?>">
                                                                    Full Info
                                                                </a>
                                                                <div class="collapse" id="collapseExample<?= $orderrow['id']; ?>">
                                                                    <div class="card card-body mb-0 p-0">
                                                                        <table class="table mb-0">

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
                                                                                $k = 1;
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
                                                                                        <tr>
                                                                                            <th scope="row"><?= $k ?></th>
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
                                                                                        $j = 1;
                                                                                        if ($datarow['product_status'] == 1) {
                                                                                            $data = getRowById('order_request_template_product', 'ort_id', $datarow['product_id']);
                                                                                            if (!empty($data)) {
                                                                                                foreach ($data as $datarow) {
                                                                                                    $product_combo = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                                                        ?>
                                                                                                    <tr>
                                                                                                        <th scope="row"><?= $k ?>.<?= $j ?></th>
                                                                                                        <td> <img src="<?= setImage($fetchrow['img'], 'uploads/merchant_products/')  ?>" style="width: 30px;height: 30px;" /></td>
                                                                                                        <td><?= $product_combo['product_name']; ?></td>
                                                                                                        <td><?= $product_combo['quantity']; ?> <?= $product_combo['quantity_type']; ?> X <?= $datarow['quantity']; ?></td>
                                                                                                        <td> Rs. <?= $product_combo['srimitra_price']; ?></td>
                                                                                                    </tr>
                                                                                        <?php
                                                                                                    $j++;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                <?php
                                                                                        $k++;
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $is_paid = '';
                                                                if ($orderrow['status'] == '1') {

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
                                                                                        <input type="hidden" name="checkout_id" value="<?= $orderrow['id'] ?>" required />

                                                                                        <input type="hidden" name="merchant_id" value="<?= $orderrow['merchant_id'] ?>" required />

                                                                                        <input type="text" class="form-control" name="payment_id" value="" placeholder="XXXXXX234234234" required />
                                                                                        <br>
                                                                                        <label>Amount</label>
                                                                                        <input type="text" class="form-control" name="amount" value="<?= $orderrow['totalamount']; ?>" required placeholder=" " />
                                                                                        <br>
                                                                                        <h5>Payment History</h5>
                                                                                        <?php
                                                                                        $payment = getRowById('checkout_payment_to_merchant',  'checkout_id', $orderrow['id']);
                                                                                        if (!empty($payment)) {
                                                                                            $is_paid = 1;


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


                                                                                        } else {
                                                                                            $is_paid = 0;
                                                                                            echo 'Payment pending';
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss=".modal">Close</button> -->
                                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-<?= (($is_paid == 0) ? 'danger' : 'info') ?>">
                                                                        <?= (($is_paid == 0) ? 'Payment pending' : 'Issued Payment') ?>
                                                                    </button>
                                                                <?php

                                                                } else {
                                                                    echo '--';
                                                                }
                                                                ?>
                                                            </td>

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
                    </section>
                    <!--END PAGE CONTENT -->
                </div>

                <?php include 'template/footer_link.php'; ?>
                <script>
                    $(document).on('click', '.status', function() {
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
                                        $('.reject' + id).hide();
                                    } else if (response == '1') {
                                        $('.accept' + id).hide();
                                    } else if (response == '2') {
                                        alert('Server Error');
                                    } else {}
                                    window.location.href="<?= base_url('admin_Dashboard/new_donation') ?>";

                                }
                            });
                        }

                    });
                </script>

</body>

</html>