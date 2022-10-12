<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('merchant/template/header'); ?>
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
                                    <a href="<?= base_url('merchant/add_products') ?>" class="btn btn-light">Add <?= $title ?></a>
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
                                                    <th>Create date</th>
                                                    <th>Product Name</th>
                                                    <th>Category/Subcategory Name</th>
                                                    <th>Quantity/ Quantity type</th>
                                                    <th>MRP</th>
                                                    <th>Sale Price</th>
                                                    <th>Purchase Price</th>
                                                    <th>Product Image</th>
                                                    <!-- <th>Disable</th> -->
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($products  != '') {
                                                    foreach ($products as $fetchrow) {

                                                        $fetch = getSingleRowById('products', array('product_id' => $fetchrow['product_id']));
                                                        $cat = getRowById('category', 'category_id', $fetch['category_id']);
                                                        $subcat = getRowById('sub_category', 'sub_category_id', $fetch['subcategory_id']);
                                                        if ($fetchrow['approved'] != '2') {
                                                ?>

                                                            <tr>
                                                                <td><?php echo $i; ?>
                                                                   
                                                                </td>
                                                                <td><?= convertDatedmy($fetchrow['create_date']); ?></td>
                                                                <td>
                                                                    <?php echo wordwrap($fetchrow['product_name'], 10, '<br>'); ?>
                                                                     <?php if ($fetchrow['approved'] == 0) {
                                                                         echo '<span class="  text-danger" style="forn-size:12px;"> ( New )   </span>';
                                                                        } elseif ($fetchrow['approved'] == 1) {
                                                                            echo '<span style="color:green;border-radius:50%;border:1px solid green;width:10px;height:10%padding:2px;"><i class="fa fa-check" aria-hidden="true"></i></span>';} else {
                                                                            
                                                                        } ?>
                                                                </td>
                                                                <td>
                                                                    <?= $cat[0]['cat_name']; ?>/<?= $subcat[0]['subcat_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $fetchrow['quantity']; ?>/<?= $fetchrow['quantity_type'] ?>
                                                                </td>
                                                                <td><?= $fetchrow['product_price']; ?></td>
                                                                <td><?= $fetchrow['sale_price']; ?></td>
                                                                <td><?= $fetchrow['purchase_price']; ?></td>
                                                                <td>
                                                                    <img src="<?= setImage($fetchrow['img'], 'uploads/merchant_products/')  ?>" style="width: 50px;height: 50px;" />
                                                                </td>
                                                                <!-- <td> <a href="<?php echo base_url() . 'merchant/disable/' . $fetch['product_id'] . '/products/' . (($fetch['status'] == '1') ? '0' : '1'); ?>" class="btn btn-light"><?php if ($fetch['status'] == '0') { ?><i class="fas fa-eye"></i><?php } else { ?> <i class="fas fa-eye-slash"></i><?php } ?></a></td> -->
                                                                <td>
                                                                    <a href="<?php echo base_url() . 'merchant/edit_products/' . $fetchrow['id']; ?>" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i></a>

                                                                    <a href="<?php echo base_url() . 'merchant/deleteproducts/' . $fetchrow['id']; ?>" class="btn btn-primary delete"><i class="fas fa-trash-alt"></i></a>
                                                                </td>

                                                            </tr>

                                                <?php
                                                            $i++;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>
                    </div>
                    <?php $this->load->view('admin/template/footer_link'); ?>
                    <script>
                        $('.salehm').change(function() {

                            var pid = $(this).data('id');
                            var sale = $('#sale' + pid).val();
                            // console.log(df);
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('merchant/productOnSale') ?>",
                                data: {
                                    sale: sale,
                                    pid: pid
                                },
                                success: function(response) {
                                    $('#featuredmsg').html('');
                                    $('#salemsg').html('Product is on Sale Now');
                                }
                            });
                        });
                        $(document).on('change', '.featuredhm', function() {
                            // $('.featuredhm').change(function() {

                            var pid = $(this).data('id');
                            var featured = $('#featured' + pid).val();
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('merchant/featuredProduct') ?>",
                                data: {
                                    featured: featured,
                                    pid: pid
                                },
                                success: function(response) {
                                    $('#salemsg').html('');
                                    $('#featuredmsg').html('Product is featured Now');
                                }
                            });
                        });
                    </script>
</body>

</html>