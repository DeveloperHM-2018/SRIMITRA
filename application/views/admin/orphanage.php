<!doctype html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-md-9">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-right  ">
                                <a href="<?= base_url('admin_Dashboard/add_child_care_home') ?>" class="btn btn-light">Add <?= $title ?></a>
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

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style=" border-collapse: collapse; border-spacing: 0; width: 100%; ">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Create date</th>

                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Number/ Password</th>
                                                    <th>Email </th>
                                                    <!-- <th>Address</th> -->
                                                    <th>Assign Merchant</th>
                                                    <th>Order request</th>
                                                    <th>View Details</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                $i = 1;
                                                if (!empty($all_orphanage)) {
                                                    foreach ($all_orphanage as $cons) {

                                                ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= convertDatedmy($cons['create_date']) ?><br>
                                                            <td><?= $cons['name'] ?><br>
                                                                <?php
                                                                $headcch = getWhereData('tbl_orphanage', array('id' => $cons['head_cch_id']));
                                                                if ($headcch != '') { ?>
                                                                    (Branch of <b><?= $headcch[0]['name'] ?> </b>)
                                                                <?php
                                                                } else {
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= $cons['category'] ?></td>
                                                            <td><?= $cons['number'] ?> <br>
                                                                Pass : <?= decryptId($cons['password']) ?></td>
                                                            <td><?= $cons['email'] ?>

                                                            </td>
                                                            <!-- <td><?= $cons['address'] ?></td> -->
                                                            <td>
                                                                <!-- <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-info"> -->
                                                                <a href="<?php echo base_url() ?>admin_Dashboard/child_care_home_merchant_update/<?= encryptId($cons['id']) ?>" class="btn btn-info">
                                                                    <?php
                                                                    $mer = getWhereData('tbl_merchant_registration', array('id' => $cons['assign_merchant']));
                                                                    if ($mer != '') { ?>
                                                                        <?= $mer[0]['shop_name'] ?>(<?= $mer[0]['m_name'] ?>)
                                                                    <?php
                                                                    } else {

                                                                        echo 'Select Merchant';
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </td>
                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/child_care_home_order_list/<?= encryptId($cons['id']) ?>" class="btn btn-success">
                                                                    Order Request</a></td>


                                                            <td><a href="<?php echo base_url() ?>admin_Dashboard/child_care_home_details/<?= encryptId($cons['id']) ?>" class="btn btn-danger">View Details</a></td>


                                                            <td>
                                                                <a href="<?php echo base_url() ?>admin_Dashboard/edit_child_care_home/<?= encryptId($cons['id']); ?>" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i></a>


                                                                <a href="<?php echo base_url() . 'admin_Dashboard/child_care_home?BdID=' . $cons['id']; ?>" class="btn btn-primary delete"  onclick="return confirm('Are you sure to delete ?')"><i class="fas fa-trash-alt"></i></a>
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