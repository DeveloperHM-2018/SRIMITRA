<!doctype html>
<html lang="en">
<?php $this->load->view('admin/template/header_link'); ?>
<style>
  #click_to_call_bar {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #222;
    z-index: 1000;
    text-align: center;
    display: block;
    z-index: 10000;
    /* height: 40px; */
    font-size: 18px;
    font-weight: 600;
    line-height: 50px;
    text-decoration: none !important;
    max-width: 1300px;
  }
  
  @media(max-width: 991px){
      .marchant_dash{
        display: grid;
    grid-template-columns: auto auto;
}
.marchant_dash i{
    display: none;
}
  }
  
</style>

<body data-topbar="colored">
  <div id="layout-wrapper">
    <?php $this->load->view('merchant/template/header'); ?>
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid ">
          <div class="page-title-box">
            <div class="row ">
              <div class="col-md-10">
                <div class=" d-flex align-items-center justify-content-between">
                  <div class="page-title">
                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?> </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">

                  <div class="row">
                    <div class="col-xl-3 col-md-3">
                      <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                          <div class="mini-stat-desc">
                            <div class="text-white">
                              <h5 class="text-uppercase font-size-16 text-white-50"> All Orders</h5>
                              <h3 class="mb-3 text-white">
                                <?= $all ?>
                              </h3>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="mdi mdi-cube-outline display-2"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-xl-3 col-md-3">
                        <a href="<?= base_url('Merchant/orderPlaced'); ?>">
                            
                      <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                          <div class="mini-stat-desc">

                            <div class="text-white">
                              <h5 class="text-uppercase font-size-16 text-white-50">New request</h5>

                              <h3 class="mb-3 text-white">
                                <?= $new ?>
                              </h3>

                            </div>
                            <div class="mini-stat-icon">
                              <i class="mdi mdi-buffer display-2"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <a href="<?= base_url('Merchant/orderPlaced'); ?>">
                      <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                          <div class="mini-stat-desc">

                            <div class="text-white">
                              <h5 class="text-uppercase font-size-16 text-white-50">Accepted Orders</h5>

                              <h3 class="mb-3 text-white">
                                <?= $accepted ?>
                              </h3>

                            </div>
                            <div class="mini-stat-icon">
                              <i class="mdi mdi-buffer display-2"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      </a>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <a href="<?= base_url('Merchant/confirmed_delivered_order'); ?>">
                            
                      <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                          <div class="mini-stat-desc">

                            <div class="text-white">
                              <h5 class="text-uppercase font-size-16 text-white-50">In-process Orders</h5>

                              <h3 class="mb-3 text-white">
                                <?= $process ?>
                              </h3>

                            </div>
                            <div class="mini-stat-icon">
                              <i class="mdi mdi-buffer display-2"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-3">
                      <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                          <div class="mini-stat-desc">

                            <div class="text-white">
                              <h5 class="text-uppercase font-size-16 text-white-50">Completed Orders</h5>

                              <h3 class="mb-3 text-white">
                                <?= $completed ?>
                              </h3>

                            </div>
                            <div class="mini-stat-icon">
                              <i class="mdi mdi-buffer display-2"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- container-scroller -->
        <?php $this->load->view('admin/template/footer_link'); ?>

      </div>
    </div>
  </div>
</body>

</html>