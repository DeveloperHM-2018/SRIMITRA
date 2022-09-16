<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>

        <style>
            .slick-track {
                width: 500px;

            }
        </style>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="portlet">
                            <div class="portlet-header portlet-header-bordered">
                                <h3 class="portlet-title">All Followups</h3>
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                            </div>
                            <div class="portlet-body">

                                <div class="carousel" id="slick-1">

                                    <?php

                                    foreach ($donor as $donor_recordList) {
                                    ?>

                                        <div class="carousel-item">
                                            <h4> <?= $donor_recordList['name'] ?>(
                                                <a href="tel:<?= $donor_recordList['number'] ?>"><?= $donor_recordList['number'] ?>)</a>
                                            </h4>
                                            <br> <br>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <input type="hidden" name="pid" value="<?= $donor_recordList['id'] ?>">
                                                <input type="hidden" name="emp_id" value="<?= sessionId('user_id') ?>">

                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <div class="input-group row">
                                                            <div class="col-md-4"><span class="input-group-text">Followup Status</span></div>
                                                            <div class="col-md-6">
                                                                <select name="status" class="form-control select2-1 status" id="status<?= $donor_recordList['id'] ?>" data-did="<?= $donor_recordList['id'] ?>">

                                                                    <option value="">Select Status</option>
                                                                    <option value="1">Call Again</option>
                                                                    <option value="2">Appointment</option>
                                                                    <option value="3">Not Responding</option>
                                                                    <option value="4">Call Not connected</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="datetime row" id="datetime<?= $donor_recordList['id'] ?>">

                                                    <div class="form-group col-sm-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Date</span></div><input type="date" class="form-control" name="followup_dt" value="<?= date('Y-m-d'); ?>" placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-6c">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Time</span></div><input type="time" class="form-control" name="followup_tm" value="<?= date("hh:mm A"); ?>" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12 remark" id="remark<?= $donor_recordList['id'] ?>">
                                                        <div cl ass="input-group">

                                                            <textarea class="form-control" placeholder="Write Remark" name="remarks"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                                <br>
                                                <br>
                                            </form>
                                        </div>


                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/web-footer.php'); ?>
    </div>
</div>
<?php include('includes/footer.php') ?>
<script type="text/javascript" src="<?= base_url() ?>assets/build/scripts/mandatory.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/build/scripts/core.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/build/scripts/vendor.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/app/elements/carousel.js"></script>
<?php include('includes/footer-link.php'); ?>
<script>
    $('.datetime').hide();
    $('.remark').hide();
    $('.status').change(function() {

        var did = $(this).data('did');
        if (($('#status' + did).val() == '1') || ($('#status' + did).val() == '2')) {
            $('#datetime' + did).show();
            $('#remark' + did).hide();
        } else if (($('#status' + did).val() == '3') || ($('#status' + did).val() == '4')) {
            $('#remark' + did).show();
            $('#datetime' + did).hide();
        } else {
            $('#datetime' + did).hide();
            $('#remark' + did).hide();
        }

    });
</script>



</body>

</html>