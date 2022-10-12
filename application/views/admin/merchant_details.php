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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <section class=" container">
                                            <div class=" row">
                                                <div class="col-md-3">
                                                    <img src="<?= setImage($mar[0]['m_photo'],'uploads/merchant/') ?>" style="width:100%;"/>
                                                </div>
                                                <div class="col-md-9 row">
                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
                                                    <h4>Entity Details</h4>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Name of Shop :</h5>
                                                    <?= $mar[0]['shop_name']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>State :</h5>
                                                    <?= (($state == '') ? '' : $state[0]['state_name']); ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>City :</h5>
                                                    <?= (($city == '') ? '' : $city[0]['name']) ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Pincode :</h5>
                                                    <?= $mar[0]['pincode']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Address :</h5>
                                                    <?= $mar[0]['address']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>GEO Link :</h5>
                                                    <?= $mar[0]['geo_code']; ?>
                                                </div>

                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
                                                    <h4>Contact Info Details</h4>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Merchant Name :</h5>
                                                    <?= $mar[0]['m_name']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Number :</h5>
                                                    <?= $mar[0]['number']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Email :</h5>
                                                    <?= $mar[0]['email']; ?>
                                                </div>

                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
                                                    <h4>Bank Details</h4>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Bank :</h5>
                                                    <?= $mar[0]['bank']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Account no :</h5>
                                                    <?= $mar[0]['acc_no']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>IFSC :</h5>
                                                    <?= $mar[0]['ifsc']; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Branch Address :</h5>
                                                    <?= $mar[0]['bank_address']; ?>
                                                </div>
                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
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
                                                            foreach ($documents
                                                                as $img) { ?>
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
                                            </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <?php include 'template/footer_link.php'; ?>


</body>

</html>