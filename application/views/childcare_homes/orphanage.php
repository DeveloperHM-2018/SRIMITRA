<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('childcare_homes/template/header'); ?>
    <?php $this->load->view('childcare_homes/template/menu'); ?>

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
                                                    
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Number/ Password</th>
                                                    <th>Email </th>
                                                    <!-- <th>Address</th> -->
                                                    <!-- <th>Assign Merchant</th> -->
                                                    <!-- <th>Product Requirement</th> -->
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
                                                             <td><?= $cons['name'] ?></td>
                                                            <td><?= $cons['category'] ?></td>
                                                           
                                                            <td><?= $cons['number'] ?> <br>
                                                                Pass : <?= $cons['password'] ?></td>
                                                            <td><?= $cons['email'] ?>
                                                                
                                                            </td>
                                                            <!-- <td><?= $cons['address'] ?></td> -->
                                                            <!-- <td>

                                                                <div class="modal fade bs-example-modal-center<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Select Merchant</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="POST">

                                                                                    <input type="hidden" value="<?= $cons['id'] ?>" name="oid">
                                                                                    <select class="form-control" name="assign_merchant">
                                                                                        <option>Merchant List</option>
                                                                                        <?php

                                                                                        $merchantid = getAllData('tbl_merchant_registration');
                                                                                        foreach ($merchantid as $mercha) {
                                                                                        ?>
                                                                                            <option value="<?= $mercha['id']; ?>" <?= (($mercha['id'] == $cons['assign_merchant']) ? 'Selected' : '') ?>><?= $mercha['shop_name']; ?>(<?= $mercha['m_name']; ?>)</option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>

                                                                                    <div class="form-group col-md-12">
                                                                                        <br>
                                                                                        <button class="btn  btn-primary ">Submit</button>
                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-info">
                                                                    <?php
                                                                    $mer = getWhereData('tbl_merchant_registration', array('id' => $cons['assign_merchant']));
                                                                    if ($mer != '') { ?>
                                                                        <?= $mer[0]['shop_name'] ?>(<?= $mer[0]['m_name'] ?>)
                                                                    <?php
                                                                    } else {

                                                                        echo 'Select Merchant';
                                                                    }
                                                                    ?>
                                                                </button>
                                                            </td> -->
                                                            <!-- <td><a href="<?php echo base_url() ?>childcare_homes/child_care_home_products_list/<?= encryptId($cons['id']) ?>" class="btn btn-success">Add Requirement</a></td> -->


                                                            <td><a href="<?php echo base_url() ?>childcare_homes/child_care_home_details/<?= encryptId($cons['id']) ?>" class="btn btn-danger">View Details</a></td>


                                                            <td>
                                                                <a href="<?php echo base_url() ?>childcare_homes/edit_child_care_home/<?= encryptId($cons['id']); ?>" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i></a>


                                                                <!-- <a href="<?php echo base_url() . 'childcare_homes/child_care_home?BdID=' . $cons['id']; ?>" class="btn btn-primary delete"><i class="fas fa-trash-alt"></i></a> -->
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


        <?php $this->load->view('admin/template/footer_link'); ?>


</body>

</html>