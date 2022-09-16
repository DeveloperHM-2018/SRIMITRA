<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('childcare_homes/template/header'); ?>
    <?php $this->load->view('childcare_homes/template/menu'); ?>
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
                                    <a href="#" onclick="history.back()" class="btn btn-light">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <section id="cd-timeline" class="cd-container">
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img bg-success">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->

                                                <div class="cd-timeline-content border">
                                                    <h5>Name :</h5><?= $mar[0]['name']; ?>
                                                    <h5>Number :</h5><?= $mar[0]['number']; ?>
                                                    <h5>Email :</h5><?= $mar[0]['email']; ?>
                                                    <h5>Category :</h5><?= $mar[0]['category']; ?>
                                                    <h5>State :</h5><?= $state[0]['state_name']; ?>
                                                    <h5>City :</h5><?= $city[0]['name']; ?>
                                                    <h5>Pincode :</h5><?= $mar[0]['pincode']; ?>
                                                    <h5>Address :</h5><?= $mar[0]['address']; ?>
                                                    <h5>GEO Link :</h5><?= $mar[0]['geo_coding']; ?>
                                                    <h5>Trust/Foundation name :</h5><?= $mar[0]['trust_name']; ?>
                                                    <h5>Trustee/Founder Name :</h5><?= $mar[0]['trustee_name']; ?>
                                                    <span class="cd-date">Child care Details</span>
                                                </div>

                                            </div>
                                            <!-- cd-timeline-block -->

                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img bg-danger">
                                                    <i class="mdi mdi-adjust"></i>
                                                </div> <!-- cd-timeline-img -->

                                                <div class="cd-timeline-content border right-content">
                                                    <h5>Organisation registration certificate :</h5>

                                                        <?php

                                                        if ($mar[0]['govt_regis_cert'] != '0') { ?>
                                                            <a href="<?= base_url() ?>uploads/orphange/<?= $mar[0]['govt_regis_cert'];  ?>" target="_blank" class="btn btn-info">View</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    
                                                    <h5>Trustee/Founder Pan :</h5>


                                                        <?php

                                                        if ($mar[0]['pan_trustee'] != '0') { ?>
                                                            <a href="<?= base_url() ?>uploads/orphange/<?= $mar[0]['pan_trustee'];  ?>" target="_blank" class="btn btn-info">View</a>


                                                        <?php
                                                        }
                                                        ?>
                                                    

                                                    <h5>Trustee/Founder Aadhar front : </h5>
                                                     <?php

                                                        if ($mar[0]['adhar_trustee'] != '0') { ?>
                                                    <a href="<?= base_url() ?>uploads/orphange/<?= $mar[0]['adhar_trustee'];  ?>" target="_blank" class="btn btn-info">View</a>
                                                     <?php
                                                        }
                                                        ?>
                                                    
                                                    <h5>Trustee/Founder Aadhar Back :
                                                     <?php

                                                        if ($mar[0]['adhar_trustee_back'] != '0') { ?>
                                                    <a href="<?= base_url() ?>uploads/orphange/<?= $mar[0]['adhar_trustee_back'];  ?>" target="_blank" class="btn btn-info">View</a>
                                                     <?php
                                                        }
                                                        ?>
                                                    

                                                    <h5>Tax registration certificate : </h5>
                                                      <?php

                                                        if ($mar[0]['tax_cert'] != '0') { ?>
                                                    <a href="<?= base_url() ?>uploads/orphange/<?= $mar[0]['tax_cert'];  ?>" target="_blank" class="btn btn-info">View</a>
                                                    <?php
                                                        }
                                                        ?>
                                                    


                                                    <h5>Cancel Cheque Image : </h5>
                                                    <?php

                                                        if ($mar[0]['cancel_check'] != '0') { ?>
                                                    <a href="<?= base_url() ?>uploads/orphange/<?= $mar[0]['cancel_check'];  ?>" target="_blank" class="btn btn-info">View</a>
                                                    
                                                     <?php
                                                        }
                                                        ?>
                                                    
                                                    <span class="cd-date date-right">Documents</span>
                                                </div>
                                                <!-- cd-timeline-content -->
                                            </div>
                                        </section>


                                        <section class="cd-container">

                                            <h5>Gallery
                                            <div class="row">
                                                <?php if ($gallery != '') {
                                                    foreach ($gallery as $img) {


                                                ?>
                                                        <div class="col-sm-3">
                                                            <img src="<?= base_url('uploads/orphange/gallery/') . $img['img'] ?>" style="width: 100%;" class="shadow" />
                                                            <a href="<?php echo base_url() ?>admin_Dashboard/deleteorphaneimg/<?= $img['gid'] ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>


                                            </div>
                                        </section>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>


</body>

</html>