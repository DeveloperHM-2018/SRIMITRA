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
                                        <h4 class="mb-0 font-size-18"><?= $title; ?>  <?= sessionId('marchid'); ?></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="">Select status</option>
                                                    <option value="0">New</option>
                                                    <!-- <option value="1">On-working</option> -->


                                                    <option value="3">Completed</option>

                                                </select>
                                            </div>
                                            <!-- <?= $this->session->userdata('id') ?> -->
                                            <div class="col-md-2">
                                                <input type="button" id="find_rashu" class="btn btn-danger" value="View Order list" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <div id="datas"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-scroller -->
                <?php $this->load->view('admin/template/footer_link'); ?>
                <script>
                    $('#find_rashu').click(function() {
                        getdata_rashu();
                    });
                    getdata_rashu();

                    function getdata_rashu() {
                        var filter_status = $('#filter_status').val();
                        $.ajax({
                            url: "<?= base_url('orphanage/fetchorder') ?>",
                            method: "POST",
                            data: {
                                filter_status: filter_status
                            },
                            success: function(data) {
                                console.log(data);
                                $('#datas').html(data);
                            }
                        });

                    }
                </script>
            </div>
        </div>
    </div>
</body>

</html>