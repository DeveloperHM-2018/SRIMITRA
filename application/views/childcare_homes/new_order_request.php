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
                            <div class="col-md-8">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <a href="<?= base_url('Childcare_homes/accepted_order_request') ?>" class="btn btn-info"> Accepted Order request</a>

                            </div>
                            <div class="col-md-2 col-6">
                                <a href="<?= base_url('Childcare_homes/rejected_order_request') ?>" class="btn btn-info">Rejected Order request</a>

                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="fieldGroup row">
                                                <div class="col-md-6 col-5">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <select class="form-control" name="product[]">
                                                            <option value="">Select product</option>
                                                            <?php
                                                            print_R($products);
                                                            $i = 1;

                                                            if ($products  != '') {
                                                                foreach ($products as $fetchrow) {



                                                                    $fetch = getSingleRowById('products', array('product_id' => $fetchrow['product_id']));
                                                                    $cat = getRowById('category', 'category_id', $fetch['category_id']);
                                                                    $subcat = getRowById('sub_category', 'sub_category_id', $fetch['subcategory_id']);
                                                                    if ($fetch['pro_name'] != '2') {
                                                            ?>
                                                                        <option value="<?= $fetchrow['id']; ?>"><?= $fetch['pro_name']; ?> (<?= $fetchrow['quantity']; ?> <?= $fetchrow['quantity_type']; ?>)</option>
                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="form-group">
                                                        <label>Qty. </label>
                                                        <input type="number" class="form-control" name="quantity[]" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-3">
                                                    <label> ADD</label>
                                                    <a href="javascript:void(0)" class="form-control btn btn-success addMore">Add </a>
                                                </div>
                                            </div>
                                            <div class="fieldGroupCopy row" style="display: none;">
                                                <div class="col-md-6 col-5">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <select class="form-control" name="product[]">
                                                            <option value="">Select product</option>
                                                            <?php
                                                            // print_R($products);
                                                            $i = 1;
                                                            if ($products  != '') {
                                                                foreach ($products as $fetchrow) {

                                                                    $fetch = getSingleRowById('products', array('product_id' => $fetchrow['product_id']));
                                                                    $cat = getRowById('category', 'category_id', $fetch['category_id']);
                                                                    $subcat = getRowById('sub_category', 'sub_category_id', $fetch['subcategory_id']);
                                                                    if ($fetch['pro_name'] != '2') {
                                                            ?>
                                                                        <option value="<?= $fetchrow['id']; ?>"><?= $fetch['pro_name']; ?> (<?= $fetchrow['quantity']; ?> <?= $fetchrow['quantity_type']; ?>)</option>
                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="form-group">
                                                        <label>Qty. </label>
                                                        <input type="number" class="form-control" name="quantity[]" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-3">
                                                    </br>
                                                    <a href="javascript:void(0)" class="form-control btn btn-primary remove">Cancel</a>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group p-2 text-center">

                                                    <input type="submit" class="btn btn-danger" value="Send request">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 d-none">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Import Request here</h4>
                                        <form method="post" action="<?= base_url('Childcare_homes/importdata') ?>" enctype="multipart/form-data">
                                            <div class="form-group">

                                                <label>CSV File</label> <br>
                                                <input type="file" class="form-control" name="pname" placeholder="">

                                            </div>
                                            <div class="form-group"><br>
                                                Note - <br>
                                                Step 1 - Download <a href="<?= base_url('Childcare_homes/view_products') ?>"> Product list file </a> in csv format<br>
                                                Step 2 - Update only quantity for the required product.<br>
                                                Step 3 - Upload same updated file here, to raise new request.<br>
                                                <br>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-scroller -->
                <?php $this->load->view('admin/template/footer_link'); ?>
                <script type="application/javascript">
                    $(document).ready(function() {
                        //group add limit
                        var maxGroup = 200;
                        //add more fields group
                        $(".addMore").click(function() {
                            if ($('body').find('.fieldGroup').length < maxGroup) {
                                var fieldHTML = '<div class="fieldGroup row">' + $(".fieldGroupCopy").html() + '</div>';
                                $('body').find('.fieldGroup:last').after(fieldHTML);
                            } else {
                                alert('Maximum ' + maxGroup + ' groups are allowed.');
                            }
                        });
                        $("body").on("click",
                            ".remove",
                            function() {
                                $(this).parents(".fieldGroup").remove();
                            });
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>