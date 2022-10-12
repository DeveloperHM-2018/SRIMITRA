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
                            <div class="col-md-8">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>CCH Details</h4>
                                        <?php
                                        $cch = getSingleRowById('tbl_orphanage', array('id' => $checkout[0]['orphane_id']));
                                        if (!empty($cch)) {
                                        ?>
                                            <table class="table table-bordered dt-responsive nowrap" style="
                                                        border-collapse: collapse;
                                                        border-spacing: 0;
                                                        width: 100%;
                                                        ">
                                                <thead>
                                                    <tr>

                                                        <th>Category</th>
                                                        <th>Name</th>
                                                        <th>Address </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $cch['category'] ?></td>
                                                        <td><?= $cch['name'] ?></td>
                                                        <td><?= $cch['address'] ?></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Product List</h4>
                                        <table class="table table-bordered dt-responsive nowrap" style="
                                                border-collapse: collapse;
                                                border-spacing: 0;
                                                width: 100%;
                                                ">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th colspan="2">Product</th>
                                                    <th>Qty.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                if (!empty($checkoutProduct)) {
                                                    foreach ($checkoutProduct as $datarow) {

                                                        if ($datarow['product_status'] == 0) {
                                                            $orderProduct = getSingleRowById('tbl_orphange_order_product', array('id' => $datarow['product_id']));
                                                            $merchant = getSingleRowById('merchant_products', array('id' => $orderProduct['product']));
                                                        }
                                                        if ($datarow['product_status'] == 1) {
                                                            $merchant = getSingleRowById('order_request_template', array('ortid' => $datarow['product_id']));
                                                        }
                                                ?>
                                                        <tr style="border-bottom: 1px solid black ;">
                                                            <th scope="row"><?= $j ?></th>
                                                            <th> <img src="<?= ((file_exists($datarow['product_img'])) ? $datarow['product_img'] : base_url() . 'uploads/default.jpg')  ?>" style="width: 30px;height: 30px;" /></th>
                                                            <td><?= (($datarow['product_status'] == 0) ? $merchant['product_name'] : $merchant['product_title']) ?><br>
                                                                <?php
                                                                if ($datarow['product_status'] == 0) {
                                                                ?>
                                                                    ( <?= $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?>)
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= $datarow['product_quantity']; ?></td>

                                                        </tr>
                                                        <?php
                                                        $i = 1;
                                                        if ($datarow['product_status'] == 1) {
                                                            $data = getRowById('order_request_template_product', 'ort_id', $datarow['product_id']);
                                                            if (!empty($data)) {
                                                                foreach ($data as $datarow) {
                                                                    $product_combo = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                        ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $j ?>.<?= $i ?></th>
                                                                        <td><img src="<?= setImage($fetchrow['img'], 'uploads/merchant_products/')  ?>" style="width: 30px;height: 30px;" /></td>
                                                                        <td> <?= $product_combo['product_name']; ?></td>
                                                                        <td><?= $product_combo['quantity']; ?> <?= $product_combo['quantity_type']; ?> X <?= $datarow['quantity']; ?></td>

                                                                    </tr>
                                                        <?php
                                                                    $i++;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                <?php
                                                        $j++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
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