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

                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    ">
                                            <thead>
                                                <tr>
                                                    <th>HSN Code</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Subcategory Name</th>
                                                    
                                                    <th>Unit</th>
                                                    <th>Qty</th>
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
                                                            <td><?php echo $fetchrow['product_id']; ?></td>
<td>
                                                                <?php echo wordwrap($fetchrow['pro_name'], 10, '<br>'); ?></td>
                                                            <td>
                                                                <?= $cat[0]['cat_name']; ?></td>

                                                            <td><?= $subcat[0]['subcat_name'] ?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?= $fetchrow['quantity']; ?>/<?= $fetchrow['quantity_type'] ?>
                                                            </td>

                                                            <td>
                                                                0
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
                        $('.salehm').change(function() {

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
                        $('.featuredhm').change(function() {

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