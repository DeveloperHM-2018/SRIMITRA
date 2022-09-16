<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="col-md-7">
                            <div class="portlet">
                                <div class="portlet-header portlet-header-bordered">
                                    <h3 class="portlet-title">
                                        <?= $title ?>
                                    </h3>
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
                                <div class="portlet-body"><br>
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Fullname</span></div><input type="text" class="form-control" name="name" value="<?= (($tag == 'edit') ? $donor_list['0']['name'] : '') ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Number</span></div><input type="text" class="form-control" name="number" value="<?= (($tag == 'edit') ? $donor_list['0']['number'] : '') ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Email</span></div><input type="text" class="form-control" name="email" value="<?= (($tag == 'edit') ? $donor_list['0']['email'] : '') ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Address</span></div><input type="text" class="form-control" name="address" value="<?= (($tag == 'edit') ? $donor_list['0']['address'] : '') ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Pan/Passport</span></div><input type="text" class="form-control" name="pan_passport" value="<?= (($tag == 'edit') ? $donor_list['0']['pan_passport'] : '') ?>" placeholder="">
                                            </div>
                                        </div>

                                        <?php
                                        if (sessionId('user_type') == '1') {
                                        ?>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Assign Employee</span></div>
                                                    <select name="user_id" class="form-control select2-1 typeahead" id="select2-1">

                                                        <option value="">Assign Employee</option>
                                                        <?php

                                                        foreach ($employee as $employeeList) {
                                                        ?>

                                                            <option value="<?= $employeeList['admin_id'] ?>" <?= (($employeeList['admin_id'] == sessionId('user_id')) ? 'selected' : (($employeeList['admin_id'] == $donor_list['0']['user_id']) ? 'selected' : '')) ?>> <?= $employeeList['admin_username'] ?> (<?= $employeeList['admin_contact'] ?>)</option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>


                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Refer By</span></div><input type="text" class="form-control" name="refer" value="<?= (($tag == 'edit') ? $donor_list['0']['refer'] : '') ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Remarks</span></div><input type="text" class="form-control" name="premarks" value="<?= (($tag == 'edit') ? $donor_list['0']['premarks'] : '') ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Status</span></div>
                                                <select name="status" class="form-control">
                                                    <option value="NEW" <?= (($tag == 'edit') ? (($donor_list['0']['status'] == 'NEW' || $donor_list['0']['status'] == 'new') ? 'selected' : '') : '') ?>>New</option>

                                                    <option value="Repeated Donor" <?= (($tag == 'edit') ? (($donor_list['0']['status'] == 'Repeated Donor' || $donor_list['0']['status'] == 'repeated donor') ? 'selected' : '') : '') ?>>Repeated Donor</option>

                                                    <option value="Not Interested" <?= (($tag == 'edit') ? (($donor_list['0']['status'] == 'Not Interested' || $donor_list['0']['status'] == 'not interested,') ? 'selected' : '') : '') ?>>Not Interested</option>

                                                    <option value="Followup" <?= (($tag == 'edit') ? (($donor_list['0']['status'] == 'Followup' || $donor_list['0']['status'] == 'followup,') ? 'selected' : '') : '') ?>>Followup</option>

                                                    <option value="Reference" <?= (($tag == 'edit') ? (($donor_list['0']['status'] == 'Reference' || $donor_list['0']['status'] == 'reference,') ? 'selected' : '') : '') ?>>Reference</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="portlet">
                                <div class="portlet-header portlet-header-bordered">
                                    <h3 class="portlet-title">
                                        <?= $title ?> | Import
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                </div>
                                <div class="portlet-body"><br>
                                    <form method="post" action="<?= base_url('CrmDashboard/importdata') ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">CSV File</span></div>
                                                <input type="file" class="form-control" name="pname" placeholder="">
                                            </div>
                                        </div>

                                        <?php
                                        if (sessionId('user_type') == '1') {
                                        ?>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="user_id" class="form-control select2-1 typeahead" id="select2-1">

                                                        <option value="">Assign Employee</option>
                                                         <?php
                                                        // $employee = getAllRow('employee');
                                                        foreach ($employee as $employeeList) {
                                                        ?>
                                                            <option value="<?= $employeeList['admin_id'] ?>" <?= (($employeeList['admin_id'] == sessionId('user_id') ? 'selected' : '')) ?>><?= $employeeList['admin_username'] ?> (<?= $employeeList['admin_contact'] ?>)</option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
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
</body>

</html>