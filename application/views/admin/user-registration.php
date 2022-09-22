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
                                    <!-- <a href="<?= base_url('admin_Dashboard/user_add') ?>" class="btn btn-light">Add <?= $title ?></a> -->
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
                                                    <th>Id</th>
                                                    <th>Create Date</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Email</th>
                                                    <th>Images</th>
                                                    <th>Social Links</th>
                                                    <th>Contribution </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($user)) {
                                                    foreach ($user as $cons) {
                                                ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= convertDatedmy($cons['create_date']) ?><br>
                                                            <td><?= $cons['name'] ?></td>
                                                            <td><?= $cons['number'] ?></td>
                                                            <td><?= $cons['email'] ?></td>
                                                            <td><?php if ($cons['img'] != '' && $cons['img'] != 0) { ?><img src="<?= base_url('uploads/user/') ?><?= $cons['img'] ?>" style="height: 80px;"><?php } ?></td>
                                                            <td>
                                                                <a href="<?php base_url() . $cons['fb'] ?>" class="btn" target="_blank"><i class="fab fa-facebook-f"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $cons['insta'] ?>" class="btn" target="_blank"><i class="fab fa-instagram"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $cons['whatsapp'] ?>" class="btn" target="_blank"><i class="fab fa-whatsapp"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $cons['twitter'] ?>" class="btn" target="_blank"><i class="fab fa-twitter"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $cons['linkedin'] ?>" class="btn" target="_blank"><i class="fab fa-linkedin"></i>
                                                                </a>
                                                                <a href="<?php base_url() . $cons['google_plus'] ?>" class="btn" target="_blank"><i class="fab fa-google-plus"></i>
                                                                </a>
                                                            </td>

                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/user_order_info/<?= encryptId($cons['uid']) ?>" class="btn btn-info">Contribution List</a></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>admin_Dashboard/user_edit/<?= encryptId($cons['uid']); ?>" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a href="<?php echo base_url() . 'admin_Dashboard/user_registration?BdID=' . $cons['uid']; ?>" class="btn btn-primary delete"><i class="fas fa-trash-alt"></i></a>
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
                            <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include 'template/footer_link.php'; ?>


</body>

</html>