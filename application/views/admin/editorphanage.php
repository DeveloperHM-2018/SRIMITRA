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
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url(
                                                    'admin_dashboard/orphanage'
                                                ) ?>" class="btn btn-light"> orphanage List</a>
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
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $orphane[0]['name'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="number" value="<?= $orphane[0]['number'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $orphane[0]['email'] ?>" />
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control" name="category">
                                                        <option value="">Select category</option>
                                                        <option value="Institute/university" <?= $orphane[0]['category'] ==
                                                                                                    'Institute/university'
                                                                                                    ? 'selected'
                                                                                                    : '' ?>>Institute/university</option>
                                                        <option value="Hospital" <?= $orphane[0]['category'] == 'Hospital'
                                                                                        ? 'selected'
                                                                                        : '' ?>>Hospital</option>
                                                        <option value="Child Home Care" <?= $orphane[0]['category'] == 'Child Home Care'
                                                                                            ? 'selected'
                                                                                            : '' ?>>Child Home Care</option>
                                                        <option value="Schools" <?= $orphane[0]['category'] == 'Schools'
                                                                                    ? 'selected'
                                                                                    : '' ?>>Schools</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">State</label>
                                                    <select class="form-control" name="state" id="state">
                                                        <option value="">Select state </option>
                                                        <?php if ($state_list) {
                                                            foreach ($state_list
                                                                as $state) { ?>
                                                                <option value="<?= $state['state_id'] ?>" <?= $orphane[0]['state'] == $state['state_id']
                                                                                                                ? 'selected'
                                                                                                                : '' ?>><?= $state['state_name'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">City</label>
                                                    <select name="city" class="form-control" id="city">
                                                        <?php if (
                                                            $city == ''
                                                        ) { ?>
                                                            <option value="">Select City</option>
                                                        <?php } else { ?>
                                                            <option value="<?= $city[0]['id'] ?>"><?= $city[0]['name'] ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" name="pincode" value="<?= $orphane[0]['pincode'] ?>" />
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">address</label>
                                                    <input type="text" class="form-control" name="address" value="<?= $orphane[0]['address'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Address GEO Codeing</label>
                                                    <input type="text" class="form-control" name="geo_coding" value="<?= $orphane[0]['geo_coding'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Demography Section</label>
                                                     <select class="form-control" name="demography" id="demography">
                                                     <option>Select demography</option>
                                                     <?php foreach ($demography as $row) {
                                                     ?>
                                                     <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
                                                     <?php
                                                     }
                                                     ?>
                                                     </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Trust Name </label>
                                                    <input type="text" class="form-control" name="trust_name" value="<?= $orphane[0]['trust_name'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trustee Name</label>
                                                    <input type="text" class="form-control" name="trustee_name" value="<?= $orphane[0]['trustee_name'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Profile Image</label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="profile_temp" />
                                                    <input type="hidden" class="form-control" name="profile" value="<?= $orphane[0]['govt_regis_cert'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['profile'] !=
                                                        '' &&
                                                        $orphane[0]['profile'] !=
                                                        0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/profile/' .
                                                                        $mar[0]['profile']
                                                                )
                                                            )
                                                        ) { ?>
                                                            <img src="<?= base_url() ?>uploads/orphange/profile/<?= $orphane[0]['profile'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                    <p style="color:#9F0B0B;"> Maximum File Size Limit is 5MB. </p>
                                                </div>

                                                <!-- <h5> </br>Gallery </h5> -->


                                                <div class="col-md-6">
                                                    <label class="form-label">Tagline</label>
                                                    <input type="text" class="form-control" name="tagline" value="<?= $orphane[0]['tagline'] ?>" />
                                                </div>
                                                </br>

                                                <!-- <h5> </br>Document Section <span class="text-primary">(Please uploads small than 5MB File)</span></h5>
                                                <div class="col-md-3">
                                                    <label class="form-label">Organisation registeration certificate</label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="govt_regis_cert_temp" />
                                                    <input type="hidden" class="form-control" name="govt_regis_cert" value="<?= $orphane[0]['govt_regis_cert'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['govt_regis_cert'] != '' &&
                                                        $orphane[0]['govt_regis_cert'] != 0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/' .
                                                                        $mar[0]['govt_regis_cert']
                                                                )
                                                            )
                                                        ) { ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['govt_regis_cert'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">PAN of Trustee/Manager</label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="pan_trustee_temp" />
                                                    <input type="hidden" class="form-control" name="pan_trustee" value="<?= $orphane[0]['pan_trustee'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['pan_trustee'] != '' &&
                                                        $orphane[0]['pan_trustee'] != 0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/' .
                                                                        $mar[0]['pan_trustee']
                                                                )
                                                            )
                                                        ) { ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['pan_trustee'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                </div>


                                                <div class="col-md-3">
                                                    <label class="form-label"> Aadhar Front of Trustee/Manager </label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="adhar_trustee_temp" />
                                                    <input type="hidden" class="form-control" name="adhar_trustee" value="<?= $orphane[0]['adhar_trustee'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['adhar_trustee'] != '' &&
                                                        $orphane[0]['adhar_trustee'] != 0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/' .
                                                                        $mar[0]['adhar_trustee']
                                                                )
                                                            )
                                                        ) { ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['adhar_trustee'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">Aadhar Back of Trustee/Manager</label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="adhar_trustee_back_temp" />
                                                    <input type="hidden" class="form-control" name="adhar_trustee_back" value="<?= $orphane[0]['adhar_trustee_back'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['adhar_trustee_back'] != '' &&
                                                        $orphane[0]['adhar_trustee_back'] != 0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/' .
                                                                        $mar[0]['adhar_trustee_back']
                                                                )
                                                            )
                                                        ) { ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['adhar_trustee_back'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">Tax registration certificate upload section </label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="tax_cert_temp" />
                                                    <input type="hidden" class="form-control" name="tax_cert" value="<?= $orphane[0]['tax_cert'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['tax_cert'] !=
                                                        '' &&
                                                        $orphane[0]['tax_cert'] !=
                                                        0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/' .
                                                                        $mar[0]['tax_cert']
                                                                )
                                                            )
                                                        ) { ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['tax_cert'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Cancel Cheque Image</label>
                                                    <input type="file" accept="image/*,.pdf" class="form-control" name="cancel_check_temp" />
                                                    <input type="hidden" class="form-control" name="cancel_check" value="<?= $orphane[0]['cancel_check'] ?>" />
                                                    <?php if (
                                                        $orphane[0]['cancel_check'] != '' &&
                                                        $orphane[0]['cancel_check'] != 0
                                                    ) {
                                                        if (
                                                            file_exists(
                                                                base_url(
                                                                    'uploads/orphange/' .
                                                                        $mar[0]['govt_regis_cert']
                                                                )
                                                            )
                                                        ) { ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/<?= $orphane[0]['cancel_check'] ?>" width="100px" />
                                                    <?php }
                                                    } ?>
                                                </div> -->

                                                <h5>
                                                    <br>Account Details
                                                </h5>
                                                <div class="col-md-3">
                                                    <label class="form-label">Bank</label>
                                                    <input type="text" class="form-control" name="bank" value="<?= $orphane[0]['bank'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" name="acc_no" value="<?= $orphane[0]['acc_no'] ?>" />
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">IFSC</label>
                                                    <input type="text" class="form-control" name="ifsc" value="<?= $orphane[0]['ifsc'] ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Bank address</label>
                                                    <input type="text" class="form-control" name="bank_address" value="<?= $orphane[0]['bank_address'] ?>" />
                                                </div>

                                                <div class="col-md-12">
                                                    <br>
                                                    <label class="form-label">Description for Child care homes</label>
                                                    <textarea cols="80" id="editor1" name="description" rows="10"><?= $orphane[0]['description'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-0">
                                                <div class="col-md-3">
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

                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin_Dashboard/update_gallery/' . $orphane[0]['id']) ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5> </br>Gallery Section <span style="color:#9F0B0B;">(Please uploads small than 5MB File)</span></h5>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Gallery</label>
                                                        <input class="form-control pd-r-80" type="file" name="img[]" multiple accept="image/*,.pdf" />
                                                        <p style="color:#FF0000;"> Maximum File Size Limit is 5MB. </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>

                                                </div>
                                                <div class="col-md-12 row mt-3">
                                                    <h5> </br>Gallery List </h5>
                                                    <div class="col-md-12 row">
                                                        <?php if ($gallery != '') {
                                                            foreach ($gallery
                                                                as $img) { ?>
                                                                <div class="col-sm-3">
                                                                    <img src="<?= base_url(
                                                                                    '/uploads/orphange/gallery/'
                                                                                ) .
                                                                                    $img['img'] ?>" style="width: 100%;" class="shadow" />
                                                                    <a href="<?php echo base_url(); ?>admin_Dashboard/deleteorphaneimg/<?= $img['gid'] ?>" class="btn btn-danger delete" onclick="return confirm('Are you sure to delete this image?')"><i class="fas fa-trash-alt"></i></a>
                                                                </div>
                                                        <?php }
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                        <!-- End Form -->
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->

                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin_Dashboard/update_document/' . $orphane[0]['id']) ?>">
                                            <div class="row">
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
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>

                                                </div>
                                                <div class="col-md-12 row mt-3">
                                                    <h5> </br>Document List </h5>
                                                    <div class="col-md-12  ">
                                                        <table class="table">
                                                            <tr>
                                                                <th>S.no. </th>
                                                                <th>Title </th>
                                                                <th> View</th>
                                                                <th> Download</th>
                                                                <th> Delete</th>
                                                            </tr>
                                                            <?php
                                                            $i = 1;
                                                            if ($documents != '') {
                                                                foreach ($documents
                                                                    as $img) { ?>
                                                                    <tr>
                                                                        <td><?= $i ?> </td>
                                                                        <td><?= $img['document_title'] ?> </td>
                                                                        <td> <a href="<?= base_url(
                                                                                            'uploads/orphange/documents/'
                                                                                        ) .
                                                                                            $img['document_link'] ?>" target="_blank">View</a></td>
                                                                        <td> <a href=" <?= base_url(
                                                                                            'uploads/orphange/documents/'
                                                                                        ) .
                                                                                            $img['document_link'] ?>" download="">Download</a></td>
                                                                        <td> <a href="<?php echo base_url(); ?>admin_Dashboard/deleteorphanedocument/<?= $img['id'] ?>" onclick="return confirm('Are you sure to delete this file?')" class="btn btn-danger  "><i class="fas fa-trash-alt"></i></a></td>

                                                                    </tr>

                                                            <?php $i++;
                                                                }
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>
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