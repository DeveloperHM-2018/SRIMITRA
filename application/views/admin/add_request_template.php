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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">


                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="product_title" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Combo Price</label>
                                                        <input type="text" class="form-control" name="combo_price" value="0" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cover Image</label>
                                                        <input type="file" class="form-control" name="cover" value="0" required>
                                                    </div>
                                                </div>
                                                <div class="fieldGroup row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Select product</label>
                                                           
                                                            <select class="form-control" name="product[]">
                                                                <option value="">Select product</option>
                                                                <?php
                                                                if (!empty($product)) {
                                                                    foreach ($product as $row) {
                                                                        $products = getRowById('products','product_id',$row['product_id']);
                                                                ?>
                                                                        <option value="<?= $row['id']; ?>"><?= $products[0]['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>) (MP: Rs. <?= $row['srimitra_price']; ?> ) (SP: Rs. <?= $row['srimitra_price']; ?>)</option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Quantity needed</label>
                                                            <input type="number" class="form-control" name="quantity[]" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label> ADD</label>
                                                        <a href="javascript:void(0)" class="form-control btn btn-success addMore">Add more </a>
                                                    </div>
                                                </div>
                                                <div class="fieldGroupCopy row" style="display: none;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Select product</label>
                                                            <select class="form-control" name="product[]">
                                                                <option value="">Select product</option>
                                                                <?php
                                                                if (!empty($product)) {
                                                                    foreach ($product as $row) {
                                                                        $products = getRowById('products','product_id',$row['product_id']);
                                                                ?>
                                                                        <option value="<?= $row['id']; ?>"><?= $products[0]['pro_name']; ?> (<?= $row['quantity']; ?> <?= $row['quantity_type']; ?>) (MP: Rs. <?= $row['srimitra_price']; ?> ) (SP: Rs. <?= $row['srimitra_price']; ?>)</option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Quantity </label>
                                                            <input type="number" class="form-control" name="quantity[]" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </br>
                                                        <a href="javascript:void(0)" class="form-control btn btn-danger remove">Remove</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 row d-none">
                                                    <div class="col-md-12">
                                                        <br>
                                                        <label>Select CCH </label>
                                                    </div>
                                                    <?php foreach ($cch as $cchrow) {
                                                    ?>
                                                        <div class="col-md-4">
                                                            <input type="checkbox" name="cch[]" value="<?= $cchrow['id']; ?>" checked> <?= $cchrow['name']; ?>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group p-2 text-center">
                                                        <input type="submit" class="btn btn-primary" value="Add request">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- end col -->

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
                        //$(".addMore").click(function() {
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