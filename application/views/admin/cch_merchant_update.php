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

                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Update Merchant</h4>
                                        <form method="POST">
                                            <div class=" row">
                                                <div class="col-md-12 ">
                                                    <label>Select Merchant</label>
                                                    <select class="form-control" name="assign_merchant" required>
                                                        <option value="">Merchant List</option>
                                                        <?php

                                                        
                                                        foreach ($merchantid as $mercha) {
                                                        ?>
                                                            <option value="<?= $mercha['id']; ?>" <?= (($mercha['id'] == $mar[0]['assign_merchant']) ? 'Selected' : '') ?>><?= $mercha['shop_name']; ?>(<?= $mercha['m_name']; ?>)</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <br>
                                                    <button class="btn  btn-primary ">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row p-3">
                                            <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
                                                <h4>Basic details - </h4>
                                                <!-- <hr> -->
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Name :</h6><?= $mar[0]['name']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Number :</h6><?= $mar[0]['number']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Email :</h6><?= $mar[0]['email']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Category :</h6><?= $mar[0]['category']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>State :</h6><?= (($state == '') ? '' : $state[0]['state_name']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>City :</h6><?= (($city == '') ? '' : $city[0]['name']) ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Pincode :</h6><?= $mar[0]['pincode']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Address :</h6><?= $mar[0]['address']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>GEO Link :</h6><?= $mar[0]['geo_coding']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Trust/Foundation name :</h6><?= $mar[0]['trust_name']; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Trustee/Founder Name :</h6><?= $mar[0]['trustee_name']; ?>

                                            </div>


                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include 'template/footer_link.php'; ?>


</body>

</html>