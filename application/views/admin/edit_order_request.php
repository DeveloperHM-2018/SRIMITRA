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
                            <div class="col-md-8">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"><?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-4">


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
                                                    <input type="date" class="form-control" name="date" value="<?= convertDateymd($order[0]['create_date']) ?>" readonly>
                                                    <input type="hidden" class="form-control" name="requestid" value="<?= $order[0]['oid'] ?>" readonly>
                                                </div>
                                            </div>
                                            <?php
                                            if (!empty($order)) {
                                                $i = 1;
                                                $data = getRowById('tbl_orphange_order_product', 'o_id', $order[0]['oid']);
                                                if (!empty($data)) {
                                                    foreach ($data as $datarow) {
                                                        // print_R($datarow);
                                                        // $data = getSingleRowById('products', array('product_id' => $datarow['product']));
                                            ?>
                                                        <div class="fieldGroup row">
                                                            <div class="col-md-6 col-5">
                                                                <div class="form-group">
                                                                    <label>Product</label>
                                                                    <input type="hidden" class="form-control" name="orderpro[]" value="<?= $datarow['id']; ?>">
                                                                    <select class="form-control" name="product[]">
                                                                        <option value="">Select product</option>
                                                                        <?php
                                                                        if (!empty($products)) {
                                                                            foreach ($products as $row) { 
                                                                        ?>
                                                                                <option value="<?= $row['product_id']; ?>" <?= (($row['product_id'] == $datarow['product']) ? 'selected' : '') ?>><?= $row['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>)</option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-4">
                                                                <div class="form-group">
                                                                    <label>Qty.</label>
                                                                    <input type="number" class="form-control" name="quantity[]" value="<?= $datarow['quantity']; ?>">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-2 col-3">
                                                                <label> <br></label>
                                                                <!-- <a href="javascript:void(0)" class="form-control btn btn-danger remove">Remove</a> -->
                                                            </div>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }

                                            ?>


                                            <div class="fieldGroup row">
                                                <div class="col-md-6 col-5">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <input type="hidden" class="form-control" name="orderpro[]" value="">
                                                        <select class="form-control" name="product[]">
                                                            <option value="">Select product</option>
                                                            <?php
                                                            if (!empty($products)) {
                                                                foreach ($products as $row) {

                                                            ?>
                                                                    <option value="<?= $row['product_id']; ?>"><?= $row['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>)</option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="form-group">
                                                        <label>Qty.</label>
                                                        <input type="number" class="form-control" name="quantity[]" value="1">
                                                    </div>
                                                </div>
                                                 <div class="col-md-2 col-3">
                                                    <label> ADD</label>
                                                    <a href="javascript:void(0)" class="form-control btn btn-success addMore">+</a>
                                                </div>
                                            </div>
                                            <div class="fieldGroupCopy row" style="display: none;">
                                                <div class="col-md-6 col-5">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <input type="hidden" class="form-control" name="orderpro[]" value="">
                                                        <select class="form-control" name="product[]">
                                                            <option value="">Select product</option>
                                                            <?php
                                                            if (!empty($products)) {
                                                                foreach ($products as $row) {

                                                            ?>
                                                                    <option value="<?= $row['product_id']; ?>"><?= $row['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>)</option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="form-group">
                                                        <label>Qty.</label>
                                                        <input type="number" class="form-control" name="quantity[]" value="1">
                                                    </div>
                                                </div>
                                                 <div class="col-md-2 col-3">
                                                    </br>
                                                    <a href="javascript:void(0)" class="form-control btn btn-danger remove"> - </a>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group p-2 text-center">

                                                    <input type="submit" class="btn btn-primary" value="Send request">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
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
                        $(document).on('click', '.addMore', function(){
                       // $(".addMore").click(function() {
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