<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>
<style>
    #click_to_call_bar {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f16c69;
        z-index: 1000;
        text-align: center;
        display: block;
        z-index: 10000;
        /* height: 40px; */
        font-size: 18px;
        font-weight: 600;
        line-height: 50px;
        text-decoration: none !important;
        max-width: 1300px;
    }
</style>

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
                        </div>
                    </div>


                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="page-content-wrapper">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="table-responsive">


                                                <table class="table mb-0">
                                                    <caption>List of users</caption>
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th colspan="2">Product</th>
                                                            <th>Quantity</th>
                                                            <th>Your Required Qty</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        if ($products  != '') {
                                                            foreach ($products as $fetchrow) {
                                                                $i = $i + 1;
                                                        ?>

                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td colspan="2"> <img class="rounded-circle avatar-lg img-thumbnail" src="<?php echo base_url();  ?>uploads/products/<?= $fetchrow['img']; ?>" alt="Generic placeholder image" style="height:50px; width:50px"> <?= $fetchrow['pro_name'] ?></td>
                                                                    <td> <?= $fetchrow['quantity']; ?><?= $fetchrow['quantity_type'] ?></td>
                                                                    <td><?php $getType = getWhereData('tbl_orphange_order', array('orphan_id' => $oid, 'p_id' => $fetchrow['product_id']));
                                                                        $prodqty = 0;
                                                                        if ($getType != '') {
                                                                            $prodqty = $getType[0]['qty'];
                                                                        }
                                                                        ?>
                                                                        <input class="form-control" type="number" name="qty[]" value="<?= $prodqty; ?>" style="max-width:200px">

                                                                        <input class="form-control" type="hidden" name="p_id[]" value="<?= $fetchrow['product_id']; ?>">
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
                                    <!-- End Card -->
                                </div>
                                <!-- End Col -->




                                <div style="color:#ffffff !important; background-color:#f16c69;" class="ctc_bar" id="click_to_call_bar""> 
                       <button type=" submit" class=" btn btn-dark">Update Requirement </button></div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>