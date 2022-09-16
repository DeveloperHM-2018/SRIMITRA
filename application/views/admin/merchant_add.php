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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Add <?= $title; ?> </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/merchant') ?>" class="btn btn-light"> <?= $title ?> List</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" class="custom-validation">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">Shop Name</label>
                                                    <input type="text" class="form-control" name="shop_name" required />
                                                    
           
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">State</label>
                                                    <select class="form-control" name="state" id="state"  >
                                                        <option value="">Select state </option>
                                                        <?php
                                                        if ($state_list) {
                                                            foreach ($state_list as $state) {
                                                        ?>
                                                                <option value="<?= $state['state_id'] ?>"><?= $state['state_name'] ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">City</label>
                                                    <select name="city" class="form-control" id="city"  >
                                                        <option value="">Select city</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" name="pincode"   />
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address"   />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Address GEO Codeing</label>
                                                    <input type="text" class="form-control" name="geo_code" />
                                                </div>

                                               

                                                <h5> <br> Merchant Details </h5>

                                                <div class="col-md-3">
                                                    <label class="form-label">Merchant Name</label>
                                                    <input type="text" class="form-control" name="m_name"   />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control phoneval" autocomplete="off" name="number" maxlength="10" required />
                                                    <span id="phonemsg" class="text-danger"></span>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" parsley-type="email" placeholder="Enter a valid e-mail" required />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label"> Merchant Photo</label>
                                                    <input type="file" class="form-control" name="m_photo" accept="image/*,.pdf" />
                                                    <p style="color:#9F0B0B;"> Maximum File Size Limit is 5MB. </p>
                                                </div>

                                               

                                                <h5>
                                                    <br>Account Details
                                                </h5>
                                                <div class="col-md-3">
                                                    <label class="form-label">Bank</label>
                                                    <input type="text" class="form-control" name="bank" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" name="acc_no" />
                                                </div>
                                               
                                                <div class="col-md-3">
                                                    <label class="form-label">IFSC</label>
                                                    <input type="text" class="form-control" name="ifsc" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Bank address</label>
                                                    <input type="text" class="form-control" name="bank_address" />
                                                </div>
                                                <div class="col-md-12">
                                                <h5> </br>Document Section <span style="color:#9F0B0B;">(Please uploads small than 5MB File)</span></h5>
                                                    <div class="fieldGroup row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Document Name</label>
                                                                <input type="text" class="form-control" name="document_title[]" placeholder="Document Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document Image</label>
                                                                <input type="file" class="form-control" name="document_file[]" placeholder="Document Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label> ADD</label>
                                                            <a href="javascript:void(0)" class="form-control btn btn-success addMore"> Add</a>
                                                        </div>
                                                    </div>
                                                    <div class="fieldGroupCopy row" style="display: none;">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Document Name</label>
                                                                <input type="text" class="form-control" name="document_title[]" placeholder="Document Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document Image</label>
                                                                <input type="file" class="form-control" name="document_file[]" placeholder="Document Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            </br>
                                                            <a href="javascript:void(0)" class="form-control btn btn-danger remove">Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-0">
                                                <div class="col-md-3">
                                                    <br>
                                                    <button type="submit" id="subcch" class="btn btn-primary waves-effect waves-light me-1">
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
    
    $(document).on('keyup', '.phoneval', function(evt){
    //$('.phoneval').keyup(function(evt) {
        if (evt.which < 48 || evt.which > 57) {
            evt.preventDefault();
        }

        $.ajax({
            method: "POST",
            url: "<?= base_url('Admin_Dashboard/getcontact') ?>",
            data: {
                contact: $(this).val()
            },
            success: function(response) {
                // console.log(response);
                $('#phonemsg').text(response);
                if (response == ' ') {
                    $('#subcch').prop('disabled', false);
                } else {
                    $('#subcch').prop('disabled', true);
                }
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        //group add limit
        var maxGroup = 200;
        //add more fields group
        $(".addMore").click(function() {
            console.log('asd');
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