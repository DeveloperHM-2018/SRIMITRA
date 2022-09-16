<!DOCTYPE html>
<html class="no-js" lang="en">
<?php include('includes/home-head-link.php'); ?>

<body>

    <?php include('includes/header.php'); ?>

    <!-- main-area -->
    <main>
        
    <section class="breadcrumb-area breadcrumb-bg inventory-details-breadcrumb"
    data-background="<?= base_url() ?>assets/home/img/b1.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content text-center">
            <h2>SriMitra India Gallery</h2>
            
          </div>
        </div>
      </div>
    </div>
  </section>

 <section class="latest-cars-area gray-lite-bg pt-50 pb-70">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title text-center mb-35">

                        <span class="sub-title">Photos</span>
                        <h2 class="title">Gallery</h2>
                    </div>
                    
                </div>
            </div> -->
            <div class="latest-cars-wrapper">
                <div class="row latest-car-items-active">
                    <?php
                                            $i = 1;
                                            if (!empty($gallery)) {
                                                foreach ($gallery as $data) {

                                                    
                                            ?>
                                            
                    <div class="col-lg-4 col-md-6 grid-item grid-sizer cat-two">
                        <div class="mb-8">
                            <div class="">
                                <div class=" mt-20">
                                    <img src="<?php echo base_url();  ?>uploads/gallery/<?= $data['image'] ?>" alt="<?= $data['tittle'] ?>" height="250" width="100%" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php
                                                    
                                                }
                                            }
                                            ?>
                                            
                                            
                                            
                    <!--<div class="col-lg-4 col-md-6 grid-item grid-sizer cat-two">-->
                    <!--    <div class="mb-8">-->
                    <!--        <div class="">-->
                    <!--            <div class="  mt-20">-->
                    <!--                <img src="img/cch/img4.jpg" alt="" height="200" width="100%" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4 col-md-6 grid-item grid-sizer cat-two">-->
                    <!--    <div class="mb-8">-->
                    <!--        <div class="">-->
                    <!--            <div class="  mt-20">-->
                    <!--                <img src="img/cch/img3.jpeg" alt="" height="200" width="100%" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4 col-md-6 grid-item grid-sizer cat-one cat-two">-->
                    <!--    <div class="mb-8">-->
                    <!--        <div class="">-->
                    <!--            <div class="  mt-20">-->
                    <!--                <img src="img/cch/img3.jpeg" alt="" height="200" width="100%" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4 col-md-6 grid-item grid-sizer cat-one">-->
                    <!--    <div class="mb-8">-->
                    <!--        <div class="">-->
                    <!--            <div class="  mt-20">-->
                    <!--                <img src="img/cch/img4.jpg" alt="" height="200" width="100%" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4 col-md-6 grid-item grid-sizer cat-one cat-two">-->
                    <!--    <div class="mb-8">-->
                    <!--        <div class="">-->
                    <!--            <div class="  mt-20">-->
                    <!--                <img src="img/cch/img1.jpeg" alt="" height="200" width="100%" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>

    </main>
    <!-- main-area-end -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
 
     
 </body>
 
 </html>