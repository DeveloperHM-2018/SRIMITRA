<!doctype html>
<html lang="en">
<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('childcare_homes/template/header'); ?>
        <?php $this->load->view('childcare_homes/template/menu'); ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid ">
                    <div class="page-title-box">
                        <div class="row ">
                            <div class="col-md-8">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
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
                                                    <th>Order ID</th>
                                                    <th>Order Date</th>
                                                    <th>Merchant details </th>
                                                    <th>User details </th>
                                                    <th>View Order details</th>
                                                    <th>Order Status</th>
                                                    <!--<th> </th>-->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($checkout)) {
                                                    foreach ($checkout as $row) {
                                                        $merchant =  $this->CommonModal->getRowById('tbl_merchant_registration', 'id',  $row['merchant_id']);
                                                        $user =  $this->CommonModal->getRowById('tbl_user', 'uid',  $row['user_id']);
                                                ?>

                                                        <tr>
                                                            <td><?php //echo $i; ?><?= str_replace('-', '', $row['create_date_only']) . $row['id'] ?></td>
                                                            <td style="word-wrap: break-word;"><?php echo convertDatedmy($row['create_date']); ?>

                                                            </td>
                                                            <td style="word-wrap: break-word;">
                                                                <?= $merchant[0]['shop_name']; ?><br>Add. - <?php echo $merchant[0]['address']; ?>
                                                            </td>
                                                            <td style="word-wrap: break-word;">
                                                                <?= (($user != '') ? $user[0]['name'] : 'Contribute Anonymously') ?>
                                                                <br>
                                                                <?php

                                                                if ($row['status'] == '1' && ($user != '')) {
                                                                    if ($row['chechout_status'] == 6) {
                                                                        if ($row['certificate'] == '') {

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
                                                                                        <form action="<?= base_url('childcare_homes/uploadcertificate') ?>" method="POST" enctype="multipart/form-data">
                                                                                            <div class="modal-body">

                                                                                                <input type="hidden" name="checkout_id" value="<?= $row['id'] ?>" required />

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
                                                                            <a href="<?= base_url('uploads/certificate/' . $row['certificate']) ?>" target="_blank">
                                                                                View Tax benefit certificate
                                                                                </button>
                                                                    <?php
                                                                        }
                                                                    }
                                                                }
                                                                    ?>
                                                            </td>
                                                            <td><a href="<?php echo base_url() . 'childcare_homes/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger edit"><i class="fas fa-eye"></i></a></td>
                                                            <td>
                                                                <?php


                                                                if ($row['chechout_status'] == 0) {
                                                                ?>


                                                                <?php
                                                                } elseif ($row['chechout_status'] == 3) {
                                                                ?>
                                                                    <p class="text-warning"><b>Packing on process</b></p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 4) {
                                                                ?>
                                                                    <p class="text-primary"><b>Stock unavailable</b></p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 5) {
                                                                ?>
                                                                    <button class="btn btn-success status delivered<?= $row['id']; ?> status<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-status="delivered">
                                                                        Delivered </button>
                                                                    <p class="deliveredmsg<?= $row['id']; ?>" style="display:none">Delivered</p>
                                                                    <br>
                                                                    <p class="deliveredmsgs<?= $row['id']; ?>">Confirmation required</p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 6) {
                                                                ?>
                                                                    <p class="text-success"><b>Delivered</b></p>
                                                                <?php
                                                                }

                                                                ?>
                                                            </td>
                                                            <!--<td>-->
                                                            <!--</td>-->

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
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- container-scroller -->
                    <?php $this->load->view('admin/template/footer_link'); ?>
                    <script>
                        $(document).on('click', '.status', function() {
                            // $('.status').click(function() {
                            var id = $(this).data('id');
                            var status = $(this).data('status');
                            var msg = confirm('Are you sure ?');
                            if (msg) {
                                $.ajax({
                                    method: "POST",
                                    url: "<?= base_url('Ajax/cchdonationrequestStatus') ?>",
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
                                            $('.delivered' + id).hide();
                                            $('.deliveredmsg' + id).show();
                                            $('.deliveredmsgs' + id).hide();
                                            window.location = "<?= base_url('childcare_homes/OrderPlacedDetails_temp/') ?>" + id;
                                        } else {
                                            alert('Server Error');
                                        }
                                    }
                                });
                            }

                        });
                    </script>
                </div>
            </div>
        </div>
</body>

</html>