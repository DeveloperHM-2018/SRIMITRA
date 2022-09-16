<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('merchant/template/header'); ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid ">
                    <div class="page-title-box">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <!-- <label>Filter by date</label> -->
                                <div class="col-md-4">
                                    <label>From date</label>
                                    <input type="date" class="form-control" name="from_date" id="fromdate" />
                                </div>
                                <div class="col-md-4">
                                    <label>To date</label>
                                    <input type="date" class="form-control" name="to_date" id="todate" />
                                </div>
                                <div class="col-md-4">
                                    <label><br><br><br></label>
                                    <button class="btn btn-info" id="getreport">Get Report</button>
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

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>S No</th>
                                                    <th>Date</th>
                                                    <th>CCH</th>
                                                    <th>Product name</th>
                                                    <th>Quantity</th>
                                                    <th>MRP</th>
                                                </tr>
                                            </thead>
                                            <tbody id="records">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>
                    </div>
                    <?php $this->load->view('admin/template/footer_link'); ?>
                    <script>
                        $('#getreport').click(function() {
                            run();
                        });
                        run();
                        function run() {
                            var fromdate = $('#fromdate').val();
                            var todate = $('#todate').val();
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('Ajax/get_merchant_report') ?>",
                                data: {
                                    fromdate: fromdate,
                                    todate: todate
                                },
                                success: function(response) {
                                    console.log('response');
                                    console.log(response);
                                    $('#records').html(response);
                                }
                            });
                        }
                    </script>
</body>

</html>