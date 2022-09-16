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
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> Edit</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/user_registration') ?>" class="btn btn-light"> <?= $title ?> List</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">


                                                <div class="col-md-3">
                                                    <label class="form-label">User   Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $user[0]['name']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User Number</label>
                                                    <input type="text" class="form-control" name="number" value="<?= $user[0]['number']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $user[0]['email']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User    Photo</label>
                                                    <input type="file" class="form-control" name="img_temp" accept="image/*" />
                                                    <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                    <input type="hidden" class="form-control" name="img" value="<?= $user[0]['img']  ?>" />
                                                    <?php if ($user[0]['img'] != '' && $cons['img'] != 0) { ?>
                                                        <img src="<?= base_url() ?>uploads/user/<?= $user[0]['img'] ?>" width="40px" />
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User Linkedin</label>
                                                    <input class="form-control pd-r-80" type="text" name="linkedin" value="<?= $user[0]['linkedin']  ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User facebook</label>
                                                    <input type="text" class="form-control" name="fb" value="<?= $user[0]['fb']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User Whatsapp</label>
                                                    <input class="form-control pd-r-80" type="text" name="whatsapp" value="<?= $user[0]['whatsapp']  ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User twitter</label>
                                                    <input type="text" class="form-control" name="twitter" value="<?= $user[0]['twitter']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User Instagram</label>
                                                    <input class="form-control pd-r-80" type="text" name="insta" value="<?= $user[0]['insta']  ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">User Google Plus</label>
                                                    <input class="form-control pd-r-80" type="text" name="google_plus" value="<?= $user[0]['google_plus']  ?>">
                                                </div>
                                                </br>



                                            </div>

                                            <div class="mb-0">
                                                <div class="col-md-6">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <?php include 'template/footer_link.php'; ?>


</body>

</html>


<script>
    $(document).on('change', '#state', function() {

        var state = $(this).val();
        // console.log(state);
        $.ajax({
            method: "POST",
            url: "<?= base_url('Admin_Dashboard/getcity') ?>",
            data: {
                state: state
            },
            success: function(response) {
                // console.log(response);
                $('#city').html(response);
            }
        });
    });
</script>