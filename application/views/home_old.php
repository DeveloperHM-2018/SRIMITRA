     <!doctype html>
     <html class="no-js" lang="en">


     <?php include('includes/head-link.php'); ?>

     <body>

         <?php include('includes/header.php'); ?>

         <main>
             <section class="banner-area home-three-banner" data-background="<?= base_url() ?>assets/img/slider/banner_bg02.jpg">
                 <div class="container custom-container">
                     <div class="row justify-content-center">
                         <div class="col-xl-7 col-lg-9">

                         </div>
                     </div>
                 </div>
                 <div class="banner-car-search-wrap">
                     <div class="container">
                         <div class="row">
                             <div class="col-12">
                                 <form action="<?= base_url('child_care_homes') ?>" method="get" class="car-search-form">
                                     <div class="row align-items-end justify-content-center">
                                         <div class="col custom-col-8">
                                             <input type="text" name="search" class="inp-form" placeholder="Search CHILD CARE HOMES HERE" value="" required />
                                         </div>
                                         <div class="col custom-col-5">
                                             <button class="btn">SEARCH NOW</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>


             <section class="latest-cars-area latest-cars-three pt-120 pb-120">
                 <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-xl-5 col-lg-6">
                             <div class="section-title text-center mb-35">
                                 <h2 class="overlay-title">CHILD CARE HOMES with us</h2>
                                 <span class="sub-title"> Join us to Build the Future </span>
                                 <h2 class="title"> ‘Child Care homes’ in Service</h2>
                             </div>
                             <div class="latest-car-menu-wrap">

                                 <div class="latest-car-menu-active">
                                     <button class="active" data-filter="*">All city</button>
                                     <?php
                                        $i = 1;
                                        if (!empty($statelist)) {
                                            foreach ($statelist as $row) {

                                                $data = getSingleRowById('tbl_state', array('state_id' => $row['state']));
                                                // print_r($data);
                                                if ($data != '') {

                                        ?>
                                                 <button class="" data-filter=".cat<?= $data['state_id'] ?>"><?= $data['state_name'] ?></button>
                                     <?php
                                                }
                                            }
                                        }
                                        ?>
                                     <!--<button class="" data-filter=".cat-two">Indore</button>-->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="latest-cars-wrapper">
                         <div class="row latest-car-items-active">
                             <?php
                                $i = 1;
                                if (!empty($all_orphanage)) {
                                    foreach ($all_orphanage as $cons) {

                                        $data = getSingleRowById('tbl_orphanage_gallery', array('orphanage_id' => $cons['id']));
                                        $city = getSingleRowById('tbl_cities', array('id' => $cons['city']));

                                ?>
                                     <div class="col-lg-3 col-md-4 grid-item grid-sizer cat<?= $cons['state'] ?>">
                                         <div class="latest-car-item mb-40">
                                             <div class="latest-car-thumb">

                                                 <?php
                                                    if ($data != '') {
                                                        $imgData = $data['img']; ?>
                                                     <img src="<?= base_url() ?>uploads/orphange/gallery/<?= $data['img'] ?>" class="oimg" alt="<?= $cons['name'] ?>">

                                                 <?php
                                                    } else {
                                                        echo '<img src="assets/img/1.jpg" class="oimg" alt="' . $cons['name'] . '">';
                                                    }
                                                    ?>

                                                 <a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>" class="btn book-btn">View profile</a>
                                             </div>
                                             <div class="latest-car-content-wrap">
                                                 <div class="latest-car-content">
                                                     <h6><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['name'] ?></a></h6>
                                                     <!-- <h6><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['category'] ?></a></h6> -->
                                                     <p><i class="fas fa-map-marker-alt"></i> <?= $city['name'] ?></p>
                                                 </div>
                                                 <div class="latest-car-meta">

                                                 </div>
                                                 <div class="latest-car-bottom">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                             <?php
                                    }
                                }
                                ?>


                         </div>
                         <div class="row">
                             <div class="col-12">
                                 <div class="latest-car-btn text-center mt-10">
                                     <a href="<?= base_url('child_care_homes') ?>" class="btn">SHOW ALL OPPORTUNITIES</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- latest-cars-area-end -->
             <!-- fact-area -->

             <!-- fact-area-end -->
             <!-- about-area -->
             <section class="about-area about-bg pt-120 pb-120" data-background="<?= base_url() ?>assets/img/bg/about_bg.jpg">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-lg-6">
                             <div class="about-img-wrap">
                                 <div class="row align-items-end">
                                     <div class="col-sm-12">
                                         <!-- <div class="about-exp">
                                             <h2>49<span>+</span></h2>
                                         </div> -->
                                         <div class="about-img">
                                             <img src="<?= base_url() ?>assets/img/girls.png" alt="">
                                         </div>
                                     </div>
                                     <!-- <div class="col-sm-6">
                                         <div class="about-img">
                                             <img src="<?= base_url() ?>assets/img/2.jpg" alt="">
                                         </div>
                                     </div> -->
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="about-content-wrap">
                                 <div class="section-title white-title mb-40">
                                     <span class="sub-title"> About SriMitra India</span>
                                     <h2 class="title">Be a Mitra With SriMitra India

                                     </h2>
                                 </div>
                                 <div class="content">
                                     <div class="icon">
                                         <img src="<?= base_url() ?>assets/img/images/m.png" alt="">
                                     </div>
                                     <p>We seek out responsible children’s homes in need of additional support. We access how we can help them meet the needs of the children in their care. Then we use our network of caring individuals to provide them with support tailored to their needs.</p>
                                 </div>
                                 <div class="about-list mb-40">
                                     <ul>
                                         <li>
                                             <div class="icon"><i class="fas fa-check"></i></div>
                                             Experience the power of giving
                                         </li>
                                         <li>
                                             <div class="icon"><i class="fas fa-check"></i></div>
                                             Take Small Steps to Spread Big Smiles
                                         </li>
                                         <!-- <li>
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        Deserunt ad ipsum sint excepteur
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        Lorem sit occaecat ea proident excepteur
                                    </li> -->
                                     </ul>
                                 </div>
                                 <a href="<?= base_url('Index/know_about_us') ?>" class="btn">LEARN MORE</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- about-area-end -->

             <!-- exclusive-featured-area -->
             <section class="exclusive-featured-area pt-120 pb-120">
                 <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-xl-6 col-lg-7">
                             <div class="section-title text-center mb-70">
                                 <h2 class="overlay-title">Why us ??</h2>
                                 <span class="sub-title">There is also nothing quite like seeing a child smile who hasn’t for some time.</span>
                                 <h2 class="title">Why we do, what we do</h2>
                                 <div class="line"><img src="<?= base_url() ?>assets/img/images/title_line.png" alt=""></div>
                             </div>
                         </div>
                     </div>
                     <div class="row align-items-center align-items-xl-start">
                         <div class="col-xl-3 col-lg-4 col-md-6">
                             <div class="exc-featured-item">
                                 <div class="icon">
                                     <img src="<?= base_url() ?>assets/img/support.jpg" height="60px">
                                 </div>
                                 <div class="content">
                                     <h5>Supporting</h5>
                                     <p>Supporting vulnerable children makes them adaptive, productive, and healthy adults.</p>
                                 </div>
                             </div>
                             <div class="exc-featured-item">
                                 <div class="icon">
                                     <img src="<?= base_url() ?>assets/img/development.jpg" height="60px">
                                 </div>
                                 <div class="content">
                                     <h5>development traits</h5>
                                     <p>Children with proper care, guidance and support also translates into a future society with reduced crime, increased workforce productivity, lower teenage pregnancy, and the development of other positive character traits.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-6 col-lg-4 d-none d-lg-block">
                             <div class="exc-featured-img">
                                 <img src="<?= base_url() ?>assets/img/4.jpg" alt="">
                             </div>
                         </div>
                         <div class="col-xl-3 col-lg-4 col-md-6">
                             <div class="exc-featured-item">
                                 <div class="icon">
                                     <img src="<?= base_url() ?>assets/img/growth.jpg" height="60px">
                                 </div>
                                 <div class="content">
                                     <h5>For the future</h5>
                                     <p>Most importantly, it creates stronger future families.</p>
                                 </div>
                             </div>
                             <div class="exc-featured-item">
                                 <div class="icon">
                                     <img src="<?= base_url() ?>assets/img/child.jpg" height="60px">
                                 </div>
                                 <div class="content">
                                     <h5>Child care </h5>
                                     <p>We team up with individuals, organizations, foundations, and companies to empower local child care homes with resources so they can better support these wondrous children.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- exclusive-featured-area-end -->


             <section class="fact-area fact-bg pt-135 pb-70 jarallax parallax-img" data-background="img/bg/fact_bg.jpg">
                 <div class="fact-area-title">Find a perfect place to help<span class="left"></span><span class="right"></span></div>
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-3 col-md-6">
                             <div class="fact-item mb-50">
                                 <div class="fact-icon">
                                     <i class="flaticon-rocket"></i>
                                 </div>
                                 <div class="fact-content">
                                     <h3><span class="odometer" data-count="29000"></span>k+</h3>
                                     <p>HELPING HANDS</p>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-6">
                             <div class="fact-item mb-50">
                                 <div class="fact-icon">
                                     <i class="flaticon-rocket"></i>
                                 </div>
                                 <div class="fact-content">
                                     <h3><span class="odometer" data-count="3400"></span>+</h3>
                                     <p>LOYAL DONORS</p>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-6">
                             <div class="fact-item mb-50">
                                 <div class="fact-icon">
                                     <i class="flaticon-rocket"></i>
                                 </div>
                                 <div class="fact-content">
                                     <h3><span class="odometer" data-count="1200"></span>+</h3>
                                     <p>CHILD CARE HOMES WITH US</p>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-6">
                             <div class="fact-item mb-50">
                                 <div class="fact-icon">
                                     <i class="flaticon-rocket"></i>
                                 </div>
                                 <div class="fact-content">
                                     <h3><span class="odometer" data-count="34000"></span>K</h3>
                                     <p>SMILES</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>

 
             <?php //include('includes/upfooter.php'); 
                ?>

         </main>




         <?php include('includes/footer.php'); ?>
         <?php include('includes/footer-link.php'); ?>

     </body>

     </html>