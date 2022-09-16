<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="portlet">
                            <div class="portlet-header portlet-header-bordered">
                                <h3 class="portlet-title"><?= $title ?></h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if ($this->session->has_userdata('msg')) {
                                        echo $this->session->userdata('msg');
                                        $this->session->unset_userdata('msg');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="portlet-body">
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
                                                $patient = getRowById('tbl_orphanage', 'id', $app['pid']);
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
            </div>
        </div>
        <?php include('includes/web-footer.php'); ?>
    </div>
</div>
<?php include('includes/footer.php') ?>
<?php include('includes/footer-link.php'); ?>

</body>

</html>