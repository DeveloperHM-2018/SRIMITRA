<!doctype html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Add <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/view_gallery') ?>" class="btn btn-light"> <?= $title ?> List</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Add Gallery</h4>
                                        <hr>
                                        <form action="<?php echo base_url() . 'admin_Dashboard/addgallery' ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label class="">Image Title</label>
                                                            <input type="text" class="form-control" name="tittle">
                                                        </div>
                                                        <!--<div class="form-group col-md-4">-->
                                                        <!--    <label class="">Product Sub Category Name</label>-->
                                                        <!--    <input type="file" class="form-control" name="tittle">-->
                                                        <!--</div>-->
                                                        <div class="form-group col-md-4">
                                                            <label class="">Import image</label>
                                                            <div class="pos-relative">
                                                                <input class="form-control pd-r-80" required="" type="file" name="img">
                                                                
                                                            </div>

                                                        </div>


                                                        <div class="form-group col-md-12">
                                                            <br>
                                                            <button class="btn  btn-primary ">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
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
                                
                                $.ajax({
                                    method: "POST",
                                    url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                                    data: {
                                        category_id: category_id
                                    },
                                    success: function(response) {
                                        $('#sub_category_id').html(response);
                                    }
                                });
                            });
                            $(document).on('change', '#category_id_im', function(){
                          //  $('#category_id_im').change(function() {
                                var category_id = $('#category_id_im').val();
                                
                                $.ajax({
                                    method: "POST",
                                    url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                                    data: {
                                        category_id: category_id
                                    },
                                    success: function(response) {
                                        $('#sub_category_id_im').html(response);
                                    }
                                });
                            });
                        </script>
</body>

</html>