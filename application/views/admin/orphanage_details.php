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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title ?></h4>
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
                                        <section class="container">
                                            <div class=" row">
                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
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

                                                </div>
                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
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
                                                <div class="col-md-3">
                                                    <br>
                                                    <h6>Description for Child care homes:</h6>
                                                    <?= $mar[0]['description'] ?>
                                                </div>
                                                <!-- cd-timeline-content -->

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
                                                <div class="col-md-12 m-1 p-1" style="border: 1px solid grey;border-radius:10px;">
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
                                                                <a href="<?php echo base_url(); ?>admin_Dashboard/deleteorphaneimg/<?= $img['gid'] ?>" class="btn btn-danger delete"  onclick="return confirm('Are you sure to delete this image?')"><i class="fas fa-trash-alt"></i></a>
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </div>
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
        <?php include 'template/footer_link.php'; ?>


</body>

</html>