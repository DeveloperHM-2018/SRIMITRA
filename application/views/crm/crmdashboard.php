<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="portlet">
                            <div class="portlet-header">
                                <!-- <div class="portlet-icon"><i class="fa fa-funnel-dollar"></i></div> -->
                                <h3 class="portlet-title"><img src="<?= base_url('uploads/icon/follow.png') ?>" style="height:40px;" /> Today Total followups </h3>

                            </div>
                            <div class=" my-3" id="widget-carousel-nav">

                            </div>
                            <div class="portlet-body">
                                <div class="carousel" id="widget-carousel">

                                    <br>
                                    <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.no.</th>
                                                <th>Date</th>
                                                <?php if (sessionId('user_type') == '1') { ?>
                                                    <th>Employee Name</th>
                                                <?php } ?>


                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>status</th>
                                                <th>Response</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($followup_history)) {
                                                foreach ($followup_history as $app) {
                                                    $patient = getRowById('tbl_orphanage', 'id', $app['id']);
                                                    $emp = getRowById('webangel_admin', 'admin_id', $app['emp_id']);
                                            ?>
                                                    <tr id="row<?= $app['paid'] ?>">
                                                        <td> <?= $i ?></td>
                                                        <td> <?= date_format(date_create($app['create_date']), 'd M, Y') ?></td>

                                                        <?php if (sessionId('user_type') == '1') { ?>
                                                            <td><?= $emp[0]['admin_name'] ?>(<?= $emp[0]['admin_contact'] ?>)</td>
                                                        <?php } ?>
                                                        <td><?= $patient[0]['name'] ?></td>
                                                        <td><?= $patient[0]['number'] ?></td>
                                                        <td><a class="badge badge-<?= (($app['status'] == '1') ? 'primary'  : (($app['status'] == '2') ? 'info'  : (($app['status'] == '3') ? 'success' : 'danger'))) ?>" style="color:white">
                                                                <?= (($app['status'] == '1') ? 'Call Again'  : (($app['status'] == '2') ? 'Appointment'  : (($app['status'] == '3') ? 'Responding' : 'Call not connected'))) ?>
                                                            </a> </td>
                                                        <?php if (($app['status'] == '1') || ($app['status'] == '2')) { ?>

                                                            <td><b>Date : </b> <?= $app['followup_dt'] ?><br>

                                                                <b>Time : </b><?= date_format(date_create($app['followup_tm']), 'h:ia') ?>
                                                            </td>
                                                        <?php
                                                        } else {
                                                        ?> <td><b>Remark : </b> <?= wordwrap($app['remarks'], 80, '<br>') ?></td>
                                                        <?php
                                                        }
                                                        ?>


                                                        <!-- <td><a class="badge badge-success" href="<?= base_url('CrmDashboard/update_followup/' . $app['paid']) ?>">Edit</a> </td> -->
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
                   
                    <div class="col-md-6 col-xl-12 ">
                        <div class="row portlet-row-fill-md">
                            <div class="col-md-12">
                                <div class="portlet">
                                    <div class="portlet-header portlet-header-bordered">
                                        <div class="portlet-icon"><i class="fa fa-clipboard-list"></i></div>
                                        <h3 class="portlet-title">Today Assign Donors</h3>
                                    </div>
                                    <div class="portlet-body">
                                        <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Date</th>

                                                    <?php
                                                    if (sessionId('user_type') == '1') {
                                                    ?>
                                                        <th>Assigned Employee</th>
                                                    <?php
                                                    }
                                                    ?>

                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($donor_list)) {
                                                    foreach ($donor_list as $donor) {
                                                        $employee = getRowById('webangel_admin', 'admin_id', $donor['user_id']);

                                                ?>
                                                        <tr id="row<?= $donor['id'] ?>">
                                                            <td><?= $i ?> </td>
                                                            <td><?= convertDatedmy($donor['create_date']) ?></td>
                                                            <?php
                                                            if (sessionId('user_type') == '1') {
                                                            ?>
                                                                <td><?= $employee[0]['admin_name'] ?> (<?= $employee[0]['admin_contact'] ?>)</td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?= $donor['name'] ?></td>
                                                            <td><?= $donor['email'] ?></td>
                                                            <td><?= $donor['number'] ?></td>
                                                            <td><?= $donor['address'] ?></td>
                                                            <td> <span class="badge badge-<?= (($donor['status'] == 'NEW') ?

                                                                                                'info' : (($donor['status'] == 'Repeated Donor') ? 'success' : (($donor['status'] == 'Not Interested') ? 'danger' : (($donor['status'] == 'Followup') ? 'warning' : 'primary'
                                                                                                ))))

                                                                                            ?> 
                                                                                            
                                                                                            
                                                                                            text-uppercase">
                                                                    <?= $donor['status'] ?>
                                                                </span>
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
                  
                    
                </div>
            </div>
        </div>
        <?php include('includes/web-footer.php'); ?>
    </div>
</div>
<?php include('includes/footer.php') ?>
<?php include('includes/footer-link.php'); ?>

<script>
    function eatsnack(msg) {
        var x = document.getElementById("snackbar");
        x.className = "show";
        $('#snackbar').text(msg);
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
    $('.done').click(function() {
        var id = $(this).data('id');
        if ($('#feat' + id).is(":checked")) {
            var status = '1';
        } else {
            var status = '0';
        }
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>CrmDashboard/updateappdoned",
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                console.log(response);
                if (response == 0) {
                    eatsnack('Not done updated');
                } else if (response == 1) {
                    eatsnack('Congratulation , Completed Task');
                } else if (response == 2) {
                    eatsnack('Server Error');
                }
            }
        });
    });
</script>
</body>

</html>