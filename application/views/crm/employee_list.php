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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Location</th>
                                            <th>Username</th>
                                            <th>Block</th>

                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($employee_list)) {
                                            foreach ($employee_list as $employee) {
                                        ?>
                                                <tr id="row<?= $employee['admin_id'] ?>">
                                                    <td><?= $i ?></td>
                                                    <td><?= $employee['admin_name'] ?></td>
                                                    <td><?= $employee['admin_email'] ?></td>
                                                    <td><?= $employee['admin_contact'] ?></td>
                                                    <td><?= $employee['admin_address'] ?></td>
                                                    <td><?= $employee['admin_username'] ?></td>
                                                    <td>
                                                        <button data-id="<?= $employee['admin_id'] ?>" data-tab="admin" data-msg="<?= (($employee['admin-status'] == '2') ? '2' : '1') ?>" data-status="<?= (($employee['admin-status'] == '2') ? '1' : '2') ?>" class="badge badge-<?= (($employee['admin-status'] == '2') ? 'danger' : 'success') ?> block" id="block<?= $employee['admin_id'] ?>">
                                                            <?= (($employee['admin-status'] == '2') ? 'Blocked' : 'Unblocked') ?>
                                                        </button>
                                                    </td>

                                                    <td><a class="badge badge-warning" href="<?= base_url('CrmDashboard/update_employee/' . $employee['admin_id']) ?>">Edit</a> </td>

                                                    <td>
                                                        <button data-id="<?= $employee['admin_id'] ?>" data-tab="admin" class="badge badge-danger delete">Delete</button>
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
        <?php include('includes/web-footer.php'); ?>
    </div>
</div>
<?php include('includes/footer.php') ?>
<?php include('includes/footer-link.php'); ?>

</body>

</html>