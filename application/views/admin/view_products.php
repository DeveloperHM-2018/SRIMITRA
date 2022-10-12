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
                                <div class=" d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/add_products') ?>" class="btn btn-light">Add <?= $title ?></a>
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
                                                    <th class="d-none">Quantity/ Quantity type</th>
                                                    <th class="d-none">Product Price</th>
                                                    <th class="d-none">Product Image</th>
                                                    <th>Approved</th>
                                                    <th>Disable</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($products  != '') {
                                                    foreach ($products as $fetchrow) {

                                                        $cat = getRowById('category', 'category_id', $fetchrow['category_id']);
                                                        $subcat = getRowById('sub_category', 'sub_category_id', $fetchrow['subcategory_id']);

                                                ?>

                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?= $fetchrow['create_date']; ?></td>
  <td>
                                                                <?php echo wordwrap($fetchrow['pro_name'], 10, '<br>'); ?></td>
                                                           
                                                            <td>
                                                                <?= $cat[0]['cat_name']; ?>/<?= $subcat[0]['subcat_name'] ?>
                                                            </td>
                                                          <td class="d-none">
                                                                <?= $fetchrow['quantity']; ?>/<?= $fetchrow['quantity_type'] ?>
                                                            </td>
                                                            <td class="d-none">Rs. <?= $fetchrow['price']; ?></td>
                                                            <td class="d-none">
                                                                <?php
                                                                if ($fetchrow['img'] != '' && $fetchrow['img'] != 0) {
                                                                ?>
                                                                    <img src="<?php echo base_url();  ?>uploads/products/<?= $fetchrow['img']; ?>" style="width: 50px;height: 50px;" />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                <?php
                                                                }
                                                                ?>

                                                            </td>

                                                            <td>
                                                                <?php if ($fetchrow['approved'] == '0') {
                                                                    echo 'Approved';
                                                                } elseif ($fetchrow['approved'] == '1') {
                                                                ?>
                                                                    <a href="<?php echo base_url() . 'admin_Dashboard/approved/' . $fetchrow['product_id'] . '/products/0'; ?>" onclick="return confirm('Are you sure?')" class="btn btn-light">Accept</a>
                                                                    <a href="<?php echo base_url() . 'admin_Dashboard/approved/' . $fetchrow['product_id'] . '/products/2'; ?>" onclick="return confirm('Are you sure?')" class="btn btn-light">Reject</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php if ($fetchrow['approved'] == '0') {

                                                                    ?>
                                                                    <a href="<?php echo base_url() . 'admin_Dashboard/disable/' . $fetchrow['product_id'] . '/products/' . (($fetchrow['status'] == '1') ? '0' : '1'); ?>" class="btn btn-light"><?php if ($fetchrow['status'] == '0') { ?><i class="fas fa-eye"></i><?php } else { ?> <i class="fas fa-eye-slash"></i><?php } ?></a>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($fetchrow['approved'] == '0') {
                                                                ?>
                                                                    <a href="<?php echo base_url() . 'admin_Dashboard/edit_products/' . $fetchrow['product_id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i></a>

                                                                    <a href="<?php echo base_url() . 'admin_Dashboard/deleteproducts/' . $fetchrow['product_id']; ?>" onclick="return confirm('Do you want to delete the product and save the changes?')" class="btn btn-primary delete"><i class="fas fa-trash-alt"></i></a>
                                                                <?php
                                                                }
                                                                ?>
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
                        </div>
                        </section>
                    </div>
                    <?php $this->load->view('admin/template/footer_link'); ?>
                    <script>
                    $(document).on('change', '.salehm', function(){
                       // $('.salehm').change(function() {

                            var pid = $(this).data('id');
                            var sale = $('#sale' + pid).val();
                            // console.log(df);
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('admin_Dashboard/productOnSale') ?>",
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
                        $(document).on('change', '.featuredhm', function(){
                        //$('.featuredhm').change(function() {

                            var pid = $(this).data('id');
                            var featured = $('#featured' + pid).val();
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('admin_Dashboard/featuredProduct') ?>",
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