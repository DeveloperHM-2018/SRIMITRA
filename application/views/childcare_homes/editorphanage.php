<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('childcare_homes/template/header'); ?>
    <?php $this->load->view('childcare_homes/template/menu'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-md-10">
                                <div class=d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_dashboard/orphanage') ?>" class="btn btn-light"> orphanage List</a>
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
                                                <div class="col-md-4">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $orphane[0]['name']  ?>" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="number" value="<?= $orphane[0]['number']  ?>" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $orphane[0]['email']  ?>" />
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control" name="category">
                                                        <option value="">Select category</option>
                                                        <option value="Institute/university" <?= (($orphane[0]['category'] == 'Institute/university') ? 'selected' : '') ?>>Institute/university</option>
                                                        <option value="Hospital" <?= (($orphane[0]['category'] == 'Hospital') ? 'selected' : '') ?>>Hospital</option>
                                                        <option value="Child Home Care" <?= (($orphane[0]['category'] == 'Child Home Care') ? 'selected' : '') ?>>Child Home Care</option>
                                                        <option value="Schools" <?= (($orphane[0]['category'] == 'Schools') ? 'selected' : '') ?>>Schools</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">State</label>
                                                    <select class="form-control" name="state" id="state">
                                                        <option value="">Select state </option>
                                                        <?php
                                                        if ($state_list) {
                                                            foreach ($state_list as $state) {
                                                        ?>
                                                                <option value="<?= $state['state_id'] ?>" <?= (($orphane[0]['state'] == $state['state_id']) ? 'selected' : '') ?>><?= $state['state_name'] ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">City</label>
                                                    <select name="city" class="form-control" id="city">
                                                        <option value="<?= $city[0]['id'] ?>"><?= $city[0]['name'] ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" name="pincode" value="<?= $orphane[0]['pincode']  ?>" />
                                                </div>



                                                <div class="col-md-6">
                                                    <label class="form-label">address</label>
                                                    <input type="text" class="form-control" name="address" value="<?= $orphane[0]['address']  ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Address GEO Codeing</label>
                                                    <input type="text" class="form-control" name="geo_coding" value="<?= $orphane[0]['geo_coding']  ?>" />
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">Trust Name </label>
                                                    <input type="text" class="form-control" name="trust_name" value="<?= $orphane[0]['trust_name']  ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Trustee Name</label>
                                                    <input type="text" class="form-control" name="trustee_name" value="<?= $orphane[0]['trustee_name']  ?>" />
                                                </div>

                                                <h5> </br>Gallery </h5>

                                                <div class="col-md-12">
                                                    <label class="form-label">Images</label>
                                                    <input class="form-control pd-r-80" type="file" name="img[]" multiple accept="image/*" />
                                                    <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                </div>
                                                </br>

                                                <h5> </br>Document Section <span class="text-primary">(Please uploads small than 5MB File)</span></h5>
                                                <div class="col-md-4">
                                                    <label class="form-label">Organisation registartion certificate</label>
                                                    <input type="file" accept=".pdf" class="form-control" name="govt_regis_cert_temp" />
                                                    <input type="hidden" class="form-control" name="govt_regis_cert" value="<?= $orphane[0]['govt_regis_cert']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['govt_regis_cert'] ?>" width="100px" />

                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">PAN of Trustee/Manager</label>
                                                    <input type="file" accept=".pdf" class="form-control" name="pan_trustee_temp" />
                                                    <input type="hidden" class="form-control" name="pan_trustee" value="<?= $orphane[0]['pan_trustee']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['pan_trustee'] ?>" width="100px" />
                                                </div>


                                                <div class="col-md-4">
                                                    <label class="form-label"> Aadhar Front of Trustee/Manager </label>
                                                    <input type="file" accept=".pdf" class="form-control" name="adhar_trustee_temp" />
                                                    <input type="hidden" class="form-control" name="adhar_trustee" value="<?= $orphane[0]['adhar_trustee']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['adhar_trustee'] ?>" width="100px" />
                                                </div>



                                                <div class="col-md-6">
                                                    <label class="form-label">Aadhar Back of Trustee/Manager</label>
                                                    <input type="file" accept=".pdf" class="form-control" name="adhar_trustee_back_temp" />
                                                    <input type="hidden" class="form-control" name="adhar_trustee_back" value="<?= $orphane[0]['adhar_trustee_back']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['adhar_trustee_back'] ?>" width="100px" />
                                                </div>



                                                <div class="col-md-6">
                                                    <label class="form-label">Tax registration certificate upload section </label>
                                                    <input type="file" accept=".pdf" class="form-control" name="tax_cert_temp" />
                                                    <input type="hidden" class="form-control" name="tax_cert" value="<?= $orphane[0]['tax_cert']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['tax_cert'] ?>" width="100px" />
                                                </div>
                                                <h5>
                                                    <br>Account Deatails
                                                </h5>
                                                <div class="col-md-4">
                                                    <label class="form-label">Bank</label>
                                                    <input type="text" class="form-control" name="bank" value="<?= $orphane[0]['bank']  ?>" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" name="acc_no" value="<?= $orphane[0]['acc_no']  ?>" />
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Cancel Check Image</label>
                                                    <input type="file" accept=".pdf" class="form-control" name="cancel_check_temp" />
                                                    <input type="hidden" class="form-control" name="cancel_check" value="<?= $orphane[0]['cancel_check']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['cancel_check'] ?>" width="100px" />
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">IFSC</label>
                                                    <input type="text" class="form-control" name="ifsc" value="<?= $orphane[0]['ifsc']  ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Bank address</label>
                                                    <input type="text" class="form-control" name="bank_address" value="<?= $orphane[0]['bank_address']  ?>" />
                                                </div>



                                                <div class="col-md-12">
                                                    <br>
                                                    <label class="form-label">Description for Child care homes</label>
                                                    <textarea cols="80" id="editor1" name="description" rows="10"><?= $orphane[0]['description']  ?></textarea>
                                                </div>







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
                                        <!-- End Form -->
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <?php $this->load->view('admin/template/footer_link'); ?>


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