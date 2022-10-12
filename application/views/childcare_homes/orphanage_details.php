<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>
<style>
    .main-img{
        width:100%;
    }
</style>

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
                                
<div class=" row">
                                                <div class="col-md-3">
                                                    <div class="card">
                                    <div class="card-body">
                                                    <?php
                            if ($mar[0]['profile_type'] == '0') {
                            ?>
                                <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                                    <img src="<?= (($mar[0]['profile'] != '') ? base_url('uploads/orphange/profile/' . $mar[0]['profile']) : base_url('assets/img/1.jpg')) ?>" class="main-img shadow" alt="">
                                </div>
                                <?php
                            } else {
                                if ($mar[0]['profile_video'] != '') {
                                    if (file_exists(FCPATH . 'uploads/orphange/profile/' . $mar[0]['profile_video'])) {
                                ?>
                                        <div class="inventory-list-video text-center" style="background: #f7f7f7;">
                                            <video height="200" controls>
                                                <source src="<?= base_url() ?>uploads/orphange/profile/<?= $mar[0]['profile_video'] ?>" type="video/mp4">
                                            </video>
                                        </div>

                                    <?php } else {
                                    ?>
                                        <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                                            <img src="<?= base_url('assets/img/1.jpg')  ?>" class="main-img shadow" alt="">
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                                        <img src="<?= base_url('assets/img/1.jpg')  ?>" class="main-img shadow" alt="">
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>
                                                     
                                                </div></div></div>
                                                <div class="col-md-9  ">
                                                    <div class="card">
                                    <div class="card-body row">
                                                <div class="col-md-12 m-1 p-1" style="border-bottom: 3px solid #f16c69;">
                                                    <h4>Basic details - </h4>
                                                    <!-- <hr> -->
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Name :</h6><?= $mar[0]['name'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Number :</h6><?= $mar[0]['number'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Email :</h6><?= $mar[0]['email'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Category :</h6><?= $mar[0]['category'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>State :</h6><?= $state ==
                                                                        ''
                                                                        ? ''
                                                                        : $state[0]['state_name'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>City :</h6><?= $city ==
                                                                        ''
                                                                        ? ''
                                                                        : $city[0]['name'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Pincode :</h6><?= $mar[0]['pincode'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Address :</h6><?= $mar[0]['address'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>GEO Link :</h6><?= $mar[0]['geo_coding'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Trust/Foundation name :</h6><?= $mar[0]['trust_name'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Trustee/Founder Name :</h6><?= $mar[0]['trustee_name'] ?>

                                                </div> </div> </div>
                                                <div class="card">
                                    <div class="card-body row">
                                                <div class="col-md-12 m-1 mt-3 p-1" style="border-bottom: 3px solid #f16c69;">
                                                    <h4>Bank details - </h4>
                                                    <!-- <hr> --> 
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Bank:</h6>
                                                    <?= $mar[0]['bank'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Account Number:</h6>
                                                    <?= $mar[0]['acc_no'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>IFSC:</h6>
                                                    <?= $mar[0]['ifsc'] ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6>Bank address:</h6>
                                                    <?= $mar[0]['bank_address'] ?>
                                                </div>
                                                </div> </div>
                                                <div class="card">
                                    <div class="card-body row">
                                                
                                                     <div class="col-md-12 m-1 p-1" style="border-bottom: 3px solid #f16c69;">
                                                    <h4>Description for Child care homes:</h4>
                                                    <!-- <hr> -->
                                                </div>
                                                    
                                                    <?= $mar[0]['description'] ?>
                                                </div>
                                                <!-- cd-timeline-content -->
</div> 
                                                <div class="card">
                                    <div class="card-body row">
                                                <div class="col-md-12 m-1 p-1" style="border-bottom: 3px solid #f16c69;">
                                                    <h4>Documents - </h4>
                                                    <!-- <hr> -->
                                                </div>
                                                <div class="col-md-12 row">
                                                    <table class="table">
                                                        <tr>
                                                            <th>S.no. </th>
                                                            <th>Title </th>
                                                            <th> View</th>
                                                            <th> Download</th>
                                                            <th> Delete</th>

                                                        </tr>


                                                        <?php
                                                        $i = 1;
                                                        if ($documents != '') {
                                                            foreach ($documents as $img) { ?>
                                                                <tr>
                                                                    <td><?= $i ?> </td>
                                                                    <td><?= $img['document_title'] ?> </td>
                                                                    <td> <a href="<?= base_url(
                                                                                        '/uploads/orphange/documents/'
                                                                                    ) .
                                                                                        $img['document_link'] ?>" target="_blank">View</a></td>
                                                                    <td> <a href=" <?= base_url(
                                                                                        '/uploads/orphange/documents/'
                                                                                    ) .
                                                                                        $img['document_link'] ?>" download="">Download</a></td>
                                                                    <td> <a href="<?php echo base_url(); ?>admin_Dashboard/deleteorphanedocument/<?= $img['id'] ?>" onclick="return confirm('Are you sure to delete this file?')" class="btn btn-danger  "><i class="fas fa-trash-alt"></i></a></td>

                                                                </tr>

                                                        <?php $i++;
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                </div> </div>
                                                <div class="card">
                                    <div class="card-body row">
                                                <div class="col-md-12 m-1 p-1" style="border-bottom: 3px solid #f16c69;">
                                                    <h4>Gallery - </h4>
                                                    <!-- <hr> -->
                                                </div>
                                                <div class="col-md-12 row">
                                                    <?php if ($gallery != '') {
                                                        foreach ($gallery
                                                            as $img) { ?>
                                                            <div class="col-sm-3">
                                                                <img src="<?= base_url(
                                                                                '/uploads/orphange/gallery/'
                                                                            ) .
                                                                                $img['img'] ?>" style="width: 100%;" class="shadow" />
                                                                 </div>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div></div>
                                        


                                        


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