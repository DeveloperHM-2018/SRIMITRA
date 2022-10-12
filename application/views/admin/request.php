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
                                                    <th>CCH</th>
                                                    <th>Request ID </th>
                                                    
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if (!empty($request)) {
                                                    $i = 1;
                                                    foreach ($request as $orderrow) {
                                                        $orphane =  getWhereData('tbl_orphanage', array('id' => $orderrow['orphan_id']));
                                                        $count = getNumRows('tbl_orphange_order_product', array('o_id' => $orderrow['oid']));
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><a href="<?= base_url() ?>child_care_home_profile/<?= encryptId($orphane[0]['id']) ?>/<?= url_title($orphane[0]['name']) ?>" target="_blank">
                                                                    <?= $orphane[0]['name']; ?></a></td>
                                                            
                                                            <td>#<?= $orderrow['timestamp']; ?></td>
                                                            <td> <?= convertDatedmy($orderrow['create_date']); ?> </td>
                                                            <td>
                                                                <?php if ($orderrow['status'] == '0') {
                                                                ?>

                                                                    <button class="btn btn-success status accept<?= $orderrow['oid']; ?> status<?= $orderrow['oid']; ?>" data-id="<?= $orderrow['oid']; ?>" data-status="accept">ACCEPT IT</button>
                                                                    <!-- <button class="btn btn-danger status reject<?= $orderrow['oid']; ?> status<?= $orderrow['oid']; ?>" data-id="<?= $orderrow['oid']; ?>" data-status="reject">REJECT IT</button> -->
                                                                    <button class="btn btn-danger reject<?= $orderrow['oid']; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#rejectcollapseExample<?= $orderrow['oid']; ?>" aria-expanded="false" aria-controls="rejectcollapseExample<?= $orderrow['oid']; ?>">
                                                                        REJECT IT
                                                                    </button>
                                                                    <div class="collapse  " id="rejectcollapseExample<?= $orderrow['oid']; ?>">

                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <h4 class="card-title">Reason for rejection</h4>
                                                                                        <div>
                                                                                            <form action="<?= base_url('admin_Dashboard/reject_request') ?>" method="POST">
                                                                                                <div class="mb-3">
                                                                                                    <label class="form-label">Reason here</label>
                                                                                                    <input class="form-control form-control-sm" type="text" name="reason" placeholder="Reason " required>
                                                                                                    <input class="form-control form-control-sm" type="hidden" value="<?= $orderrow['oid']; ?>" name="oid" required>
                                                                                                </div>
                                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                                                                    Submit
                                                                                                </button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- End Cardbody -->
                                                                                </div>
                                                                                <!-- End Card -->
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="btn btn-<?= (($orderrow['status'] == '0') ? 'primary' : (($orderrow['status'] == '1') ? 'success' : (($orderrow['status'] == '2') ? 'danger' : ''))) ?>">
                                                                        <?= (($orderrow['status'] == '0') ? 'NEW' : (($orderrow['status'] == '1') ? 'ACCEPTED' : (($orderrow['status'] == '2') ? 'REJECTED' : ''))) ?>
                                                                    </span>
                                                                    <br>
                                                                    <?= (($orderrow['status'] == '2') ?  'Reason - ' . $orderrow['reason'] : '') ?>
                                                                <?php
                                                                }
                                                                ?>

                                                            </td>
                                                            <td> 
                                                            
                                                            
                                                            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $orderrow['oid']; ?>" 
                                                            aria-expanded="false" aria-controls="collapseExample<?= $orderrow['oid']; ?>">
                                                                    View products (<?= $count ?>)
                                                                </button>
                                                                <div class="collapse  " id="collapseExample<?= $orderrow['oid']; ?>">
                                                                    <div class="card card-body mb-0 p-0">
                                                                        <table class="table mb-0">

                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Product</th>
                                                                                    <th>Qty.</th>
                                                                                    <th>Total req.</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                 <?php
                                                                                $j = 1;
                                                                                $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['oid']);
                                                                                if (!empty($data)) {
                                                                                    foreach ($data as $datarow) {
                                                                                        $merchant = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                                                        $product = getSingleRowById('products', array('product_id' => $merchant['product_id']));
                                                                                ?>
                                                                                        <tr>
                                                                                            <th scope="row"><?= $j ?></th>
                                                                                            <td><?= $product['pro_name']; ?><br>(<?= $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?>)</td>
                                                                                            <td><?= $datarow['quantity']; ?></td>
                                                                                            <td><?= $datarow['quantity']* $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?></td>
                                                                                        </tr>
                                                                                <?php
                                                                                        $j++;
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($orderrow['status'] == '0') {
                                                                ?>
                                                                    <a href="<?= base_url('admin_Dashboard/edit_order_request/' . encryptId($orderrow['oid'])) ?>">
                                                                        <button class="btn btn-success float-right mt-1 ml-1" type="button">
                                                                            <i class="fa fa-edit"></i> Edit
                                                                        </button>
                                                                    </a>
                                                                <?php
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
                $(document).on('click', '.status', function(){

                    // $('.status').click(function() {
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
                                    window.location.href="<?= base_url('admin_Dashboard/new_request') ?>"
                                    // if (response == '0') {
                                    //     $('.reject' + id).hide();
                                    // } else if (response == '1') {
                                    //     $('.accept' + id).hide();
                                    // } else if (response == '2') {
                                    //     alert('Server Error');
                                    // } else {}
                                }
                            });
                        }

                    // }); 
                    
                });
                </script>

</body>

</html>