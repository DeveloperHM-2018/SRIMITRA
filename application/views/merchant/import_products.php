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
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Add <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Import Request here</h4>
                                                <form method="post" action="<?= base_url('Merchant/importdata') ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Category Name</label>
                                                            <select class="form-control" name="category_id" id="category_id" required>
                                                                <option value="">Select Product Category</option>
                                                                <?php foreach ($category as $row) {
                                                                ?>
                                                                    <option value="<?= $row['category_id']; ?>"><?= $row['cat_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Sub Category Name</label>
                                                            <select class="form-control" name="subcategory_id" id="sub_category_id" required>
                                                                <option value="">Select Product Category</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>CSV File</label> <br>
                                                            <input type="file" class="form-control" name="pname" placeholder="" accept=".csv" required>
                                                        </div>
                                                        <div class="form-group"><br>
                                                            Note - <br>
                                                            Step 1 - Download <a href="<?= base_url('uploads/sheet/product.csv') ?>">this Product format file.</a><br>
                                                            Step 2 - Update Product name, price, quantity in the list<br>
                                                            Step 3 - Save file in CSV format.<br>
                                                            Step 4 - Upload same updated file here, to add product to your list.<br>
                                                            <br>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </section>
                        </div>
                        <?php $this->load->view('admin/template/footer_link'); ?>
                        <script>
                        $(document).on('change', '#category_id', function(){
                            //$('#category_id').change(function() {
                                var category_id = $('#category_id').val();
                                console.log(category_id);
                                $.ajax({
                                    method: "POST",
                                    url: '<?= base_url('ajax/get_subcategory') ?>',
                                    data: {
                                        category_id: category_id
                                    },
                                    success: function(response) {
                                        $('#sub_category_id').html(response);
                                    }
                                });
                            });
                        </script>
</body>

</html>