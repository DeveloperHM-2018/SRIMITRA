<!doctype html>
<html lang="en">
<?php $this->load->view('admin/template/header_link'); ?>
<style>
    #click_to_call_bar {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #222;
        z-index: 1000;
        text-align: center;
        display: block;
        z-index: 10000;
        /* height: 40px; */
        font-size: 18px;
        font-weight: 600;
        line-height: 50px;
        text-decoration: none !important;
        max-width: 1300px;
    }
</style>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('orphanage/template/header'); ?>
        <div class="">

            <div class="page-content">
                <div class="container-fluid ">
                    <div class="page-title-box">
                        <div class="row ">
                            <div class="col-md-10">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"><?= $title; ?> <?= sessionId('marchid'); ?></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    ">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Order Date</th>
                                                <th>Orphanage Contact details </th>
                                                <th>View Order details</th>
                                                <th>Order Status</th>
                                                <th>Payment Details</th>
                                                <!-- <th>Delete </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($checkout)) {
                                                foreach ($checkout as $row) {
                                                    $orphane =  $this->CommonModal->getRowById('tbl_orphanage', 'id',  $row['orphane_id']);
                                            ?>

                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td style="word-wrap: break-word;"><?php echo convertDatedmy($row['create_date']); ?>

                                                        </td>
                                                        <td style="word-wrap: break-word;">
                                                            <?php echo $row['name']; ?><?= $orphane[0]['name']; ?><br>Cont. - <?= $orphane[0]['number']; ?><br>Add. - <?php echo $orphane[0]['address']; ?>
                                                        </td>
                                                        <td><a href="<?php echo base_url() . 'Merchant/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger edit"><i class="fas fa-eye"></i></a></td>
                                                        <td>
                                                            <?php

                                                            if ($row['status'] == '1') {
                                                                if ($row['chechout_status'] == 0) {
                                                            ?>
                                                                    <button class="btn btn-success status accept<?= $row['id']; ?> status<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-status="accept">Start Packing</button>
                                                                    <button class="btn btn-danger status reject<?= $row['id']; ?> status<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-status="reject">Restocking</button>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 3) {
                                                                ?>
                                                                    <button class="btn btn-success status deliver<?= $row['id']; ?> status<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-status="deliver">Delivered</button>
                                                                    <p id="delivermsg<?= $row['id']; ?>" style="display:none">Delivered by merchant </p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 4) {
                                                                ?>
                                                                    <button class="btn btn-success status accept<?= $row['id']; ?> status<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-status="accept">Start Packing</button>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 5) {
                                                                ?>
                                                                    Delivered By you -Confirmation pending
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 6) {
                                                                ?>
                                                                    <button class="btn btn-success">Delivered</button>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $is_paid = '';
                                                            if ($row['status'] == '1') {
                                                                if ($row['chechout_status'] == 0 || $row['chechout_status'] == 3 || $row['chechout_status'] == 4 || $row['chechout_status'] == 5 || $row['chechout_status'] == 6) {
                                                            ?>

                                                                    <div class="modal fade bs-example-modal-center<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                                        Payment History
                                                                                    </h5>
                                                                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                                                                    <!-- <span aria-hidden="true">&times;</span> -->
                                                                                    <!-- </button> -->
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <?php
                                                                                    $payment = getRowById('checkout_payment_to_merchant',  'checkout_id', $row['id']);
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


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-<?= (($is_paid == 0) ? 'danger' : 'info') ?>">
                                                                        <?= (($is_paid == 0) ? 'Payment pending' : 'Issued Payment') ?>
                                                                    </button>
                                                            <?php
                                                                }
                                                            } else {
                                                                echo '--';
                                                            }
                                                            ?>
                                                        </td>
                                                        <!-- <td><a href="<?php echo base_url() . 'Merchant/orderdelete/' . $row['id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></a></td> -->
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
                <!-- container-scroller -->
                <?php $this->load->view('admin/template/footer_link'); ?>

            </div>
        </div>
    </div>
</body>

</html>