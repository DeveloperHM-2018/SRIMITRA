<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
  <div id="layout-wrapper">
    <?php $this->load->view('admin/template/header'); ?>

    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="page-title">
                  <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Update Contact Info</h4>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Welcome to Srimitra Dashboard</li>
                  </ol>
                </div>


              </div>
            </div>
          </div>
          <!-- end page title -->

          <!-- Start page content-wrapper -->
          <div class="page-content-wrapper">
           
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <?php 
                    if($contactdetails != ''){
                        foreach ($contactdetails as $row) {
                    ?>
                      <form action="<?php echo base_url() . 'admin_Dashboard/editcontactdetils' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">

                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">First Contact</label>
                              <input class="form-control" type="text" name="f_contact" value="<?= $row['f_contact'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Second Contact</label>
                              <input class="form-control" type="text" name="s_contact" value="<?= $row['s_contact'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">First Email</label>
                              <input class="form-control" type="text" name="f_email" value="<?= $row['f_email'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Second Email</label>
                              <input class="form-control" type="text" name="s_email" value="<?= $row['s_email'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Address</label>
                              <input class="form-control" type="text" name="address" value="<?= $row['address'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Facebook link</label>
                              <input class="form-control" type="text" name="facebook" value="<?= $row['facebook'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Instagram link</label>
                              <input class="form-control" type="text" name="instagram" value="<?= $row['instagram'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Linkedin link</label>
                              <input class="form-control" type="text" name="linkedin" value="<?= $row['linkedin'] ?>">
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Twitter link</label>
                              <input class="form-control" type="text" name="twitter" value="<?= $row['twitter'] ?>">
                            </div>
                          </div>
                          <!-- <div class="col-md-4 col-lg-4 ">
                            <div class="form-group">
                              <label class="">Youtube link</label>
                              <input class="form-control" type="text" name="youtube" value="<?= $row['youtube'] ?>">
                            </div>
                          </div> -->
                          <div class="col-md-12 col-lg-12 ">
                            <br>
                            <button type="submit" class="btn btn-primary">Save details</button>
                          </div>
                        </div>

                  </div>
                  </form>
                <?php
                    }
                    }
                ?>
                </div>
              </div>
            </div>

          </div>


        </div>
        <!-- Container-fluid -->
      </div>
      <!-- End Page-content -->

    </div>
  </div>

  </div>
  <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>