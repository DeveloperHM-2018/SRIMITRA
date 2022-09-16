<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('merchant/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">

                            <div class="col-md-10">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>

                                    </div>
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
                                                    <th>S No</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                 
                                                    <th>Quantity</th>
                                                  
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 1;
                                            if (!empty($checkoutProduct)) {
                                                foreach ($checkoutProduct as $row) {
                                                     $merchant = getSingleRowById('merchant_products', array('id' => $row['product_id']));
                                                    
                                            ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><img src="<?= base_url(); ?>uploads/products/<?php echo $row['product_img']; ?>"  style="width:80px"/></td>
                                                            <td><?php echo $row['product_name']; ?><br>(<?php echo $row['quantity']; ?><?php echo $row['quantity_type']; ?>)</td>
                                                            <!-- <td>Rs. <?php echo $merchant['product_price']; ?> /-</td> -->
                                                            <td><?php echo $row['product_quantity']; ?></td>
                                                            <!-- <td>Rs. <?php echo $row['total_pro_amt']; ?> /-</td> -->
                                                        </tr>
                                                    </tbody>
                                            <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view('admin/template/footer'); ?>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>