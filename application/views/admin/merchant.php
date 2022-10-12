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
                                    <a href="<?= base_url('admin_Dashboard/merchant_add') ?>" class="btn btn-light">Add <?= $title ?></a>
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
                                                    
                                                    <th>Create date</th>
                                                    <th>Shop Name</th>
                                                    <th>Merchant Name</th>
                                                    <th>Number</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>View Details</th>
                                                    <th>Order details</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                $i = 0;
                                                if (!empty($all_merchant)) {
                                                    foreach ($all_merchant as $cons) {
                                                        $i = $i + 1;
                                                ?>

                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= convertDatedmy($cons['create_date']) ?><br>
                                                            
                                                            <td><?= $cons['shop_name'] ?></td>
                                                            <td><?= $cons['m_name'] ?></td>
                                                            <td><?= $cons['number'] ?></td>
                                                            <td><?= $cons['email'] ?>
                                                            </td>
                                                            <td><?= decryptId($cons['password']) ?></td> 
                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/merchant_details/<?= encryptId($cons['id']) ?>" class="btn btn-danger">View Details</a></td>
                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/merchant_order_info/<?= encryptId($cons['id']) ?>" class="btn btn-info">Order details</a></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>admin_Dashboard/merchant_edit/<?= encryptId($cons['id']); ?>" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i>
                                                                </a> 
                                                                <a href="<?php echo base_url() . 'admin_Dashboard/merchant?BdID=' . $cons['id']; ?>" class="btn btn-primary delete" onclick="return confirm('Are you sure to delete ?')"><i class="fas fa-trash-alt"></i></a>
                                                            </td>

                                                        </tr>

                                                <?php
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