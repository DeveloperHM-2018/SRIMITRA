<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-md-12"> 
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
                                            <div class="input-group-prepend"><span class="input-group-text">Fullname</span></div><input type="text" class="form-control" name="admin_name" value="<?= (($tag == 'edit')? $doctor_list['0']['admin_name']:'') ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Email</span></div><input type="email" class="form-control" name="admin_email" value="<?= (($tag == 'edit')? $doctor_list['0']['admin_email']:'') ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Number</span></div><input type="text" class="form-control" name="admin_contact" value="<?= (($tag == 'edit')? $doctor_list['0']['admin_contact']:'') ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Location</span></div><input type="text" class="form-control" name="admin_address" value="<?= (($tag == 'edit')? $doctor_list['0']['admin_address']:'') ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Username</span></div><input type="text" class="form-control" name="admin_username" value="<?= (($tag == 'edit')? $doctor_list['0']['admin_username']:'') ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Password</span></div><input type="password" class="form-control" name="admin_password" value="<?= (($tag == 'edit')? $doctor_list['0']['admin_password']:'') ?>" placeholder="">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary"   type="submit">Submit</button>
                                </form>
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