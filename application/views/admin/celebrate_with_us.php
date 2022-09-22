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
                                                     
                                                    <th>Create date</th>
                                                    <th>User</th>
                                                    <th>CCH</th>
                                                    <th>Occasion</th>
                                                    <th>Occation date</th>
                                                    <th>Budget</th> 
                                                    <th>Advance amount </th>
                                                    <th>Status </th>
                                                    <th>Payment details</th>
                                                    <th>Share how you want to do it </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($events)) {
                                                    $i = 1;
                                                    foreach ($events as $orderrow) {
                                                        $occ = getSingleRowById('tbl_occassion', array('occ_id' => $orderrow['occasion']));
                                                        $user = getSingleRowById('tbl_user', array('uid' => $orderrow['user_id']));
                                                        $cch = getSingleRowById('tbl_orphanage', array('id' => $orderrow['cch_id']));
                                                        $budget = getSingleRowById('tbl_budget', array('budget_id' => $orderrow['budget']));
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td> <?= convertDatedmy($orderrow['create_date']); ?> </td>
                                                            <td><?= (($user == '') ? 'Unknown' : $user['name'] . '<br>Email: ' . $user['email'] . '<br>C.no.: ' . $user['number']); ?></td>
                                                            <td><?= (($cch == '') ? 'Unknown' : $cch['name'] . '<br>Email: ' . $cch['email'] . '<br>C.no.: ' . $cch['number']); ?></td>
                                                            <td><?= (($occ == '') ? '' : $occ['occ_name']); ?></td>
                                                            <td><?= $orderrow['occ_date'] ?></td>
                                                            <td><?= (($budget == '') ? '' : $budget['budget_name']); ?></td>

                                                            <td>Rs. <?= $orderrow['min_adv'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($orderrow['status'] == '0') {
                                                                ?>
                                                                    <button class="btn btn-success status accept<?= $orderrow['eve_id']; ?> status<?= $orderrow['eve_id']; ?>" data-id="<?= $orderrow['eve_id']; ?>" data-status="accept">ACCEPT IT</button>
                                                                    <button class="btn btn-danger status reject<?= $orderrow['eve_id']; ?> status<?= $orderrow['eve_id']; ?>" data-id="<?= $orderrow['eve_id']; ?>" data-status="reject">REJECT IT</button>
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
                                                            <td> Payment_id - <?= $orderrow['payment_id']; ?> <br>Amount - Rs. <?= $orderrow['amount']; ?> </td>
                                                            <td><?= $orderrow['how_want_to_do'] ?></td>
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
                                url: "<?= base_url('Ajax/eventsrequestStatus') ?>",
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