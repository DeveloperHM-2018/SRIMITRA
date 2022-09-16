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
                            <div class="col-md-4">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <label>From</label>
                                    <input type="date" id="fromdate" class="form-control" />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <label>To</label>
                                    <input type="date" id="todate" class="form-control" />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <br>
                                    <input type="button" id="checkreport" class="btn btn-primary" value="Get report" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
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
                                            <tbody id="rowdata">
                                                <?php

                                                $i = 1;
                                                if ($products  != '') {
                                                    foreach ($products as $fetchrow) {

                                                        $product = getSingleRowById('products', 'product_id', $fetchrow['product']);
                                                        if ($product) {
                                                            $cat = getRowById('category', 'category_id', $product['category_id']);
                                                            $subcat = getRowById('sub_category', 'sub_category_id', $product['subcategory_id']);
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
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- container-scroller -->
                    <?php $this->load->view('admin/template/footer_link'); ?>
                    <script>
                        $(document).on('click', '#checkreport', function() {
                            var fromdate = $('#fromdate').val();
                            var todate = $('#todate').val();
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('Childcare_homes/report_product_row') ?>",
                                data: {
                                    fromdate: fromdate,
                                    todate: todate
                                },
                                beforeSend: function() {
                                    $(this).text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                                },
                                success: function(response) {
                                    $('#rowdata').html(response);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
</body>

</html>