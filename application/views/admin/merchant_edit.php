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
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">Shop Name</label>
                                                    <input type="text" class="form-control" name="shop_name" value="<?= $march[0]['shop_name']  ?>" />
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">State</label>
                                                    <select class="form-control" name="state" id="state">
                                                        <option value="">Select state </option>
                                                        <?php
                                                        if ($state_list) {
                                                            foreach ($state_list as $state) {
                                                        ?>
                                                                <option value="<?= $state['state_id'] ?>" <?= (($march[0]['state'] == $state['state_id']) ? 'selected' : '') ?>><?= $state['state_name'] ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">City</label>
                                                    <select name="city" class="form-control" id="city">
                                                        <option value="<?= $city[0]['id'] ?>"><?= $city[0]['name'] ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" name="pincode" value="<?= $march[0]['pincode']  ?>" />
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">address</label>
                                                    <input type="text" class="form-control" name="address" value="<?= $march[0]['address']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Address GEO Codeing</label>
                                                    <input type="text" class="form-control" name="geo_code" value="<?= $march[0]['geo_code']  ?>" />
                                                </div>



                                                <h5> <br> Merchant Details </h5>

                                                <div class="col-md-3">
                                                    <label class="form-label">Merchant Name</label>
                                                    <input type="text" class="form-control" name="m_name" value="<?= $march[0]['m_name']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="number" value="<?= $march[0]['number']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $march[0]['email']  ?>" />
                                                </div>





                                                <div class="col-md-3">
                                                    <label class="form-label"> Merchant Photo</label>
                                                    <input type="file" class="form-control" name="m_photo_temp" accept="image/*,.pdf" />
                                                    <p style="color:#9F0B0B;"> Maximum File Size Limit is 5MB. </p>
                                                    <input type="hidden" class="form-control" name="m_photo" value="<?= $march[0]['m_photo']  ?>" />
                                                    <?php
                                                    if ($march[0]['m_photo'] != '' && $march[0]['m_photo'] != 0) {
                                                    ?>
                                                        <a href="<?= base_url() ?>uploads/merchant/<?= $march[0]['m_photo'];  ?>" target="_blank" class="btn btn-info">View</a>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>

                                                <h5>
                                                    <br>Account Details
                                                </h5>
                                                <div class="col-md-3">
                                                    <label class="form-label">Bank</label>
                                                    <input type="text" class="form-control" name="bank" value="<?= $march[0]['bank']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" name="acc_no" value="<?= $march[0]['acc_no']  ?>" />
                                                </div>



                                                <div class="col-md-3">
                                                    <label class="form-label">IFSC</label>
                                                    <input type="text" class="form-control" name="ifsc" value="<?= $march[0]['ifsc']  ?>" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Bank address</label>
                                                    <input type="text" class="form-control" name="bank_address" value="<?= $march[0]['bank_address']  ?>" />


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
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin_Dashboard/update_document_merchant/' . $march[0]['id']) ?>">
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
                                                                                            '/uploads/orphange/documents/'
                                                                                        ) .
                                                                                            $img['document_link'] ?>" target="_blank">View</a></td>
                                                                        <td> <a href=" <?= base_url(
                                                                                            '/uploads/orphange/documents/'
                                                                                        ) .
                                                                                            $img['document_link'] ?>" download="">Download</a></td>
                                                                        <td> <a href="<?php echo base_url(); ?>admin_Dashboard/deletemerchantdocument/<?= $img['id'] ?>" onclick="return confirm('Are you sure to delete this file?')" class="btn btn-danger  "><i class="fas fa-trash-alt"></i></a></td>

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