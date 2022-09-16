<!DOCTYPE html>
<html class="no-js" lang="en">
<?php include('includes/home-head-link.php'); ?>

<body>

    <?php include('includes/header.php'); ?>

    <!-- main-area -->
    <main>
        <!-- banner-area -->
        <section class="banner-area fix" data-background="<?= base_url() ?>assets/home/img/banner2.jpg">
            <div class="container custom-container">
                <div class="row align-items-center justify-content-between">

                    <div class="col-md-6">
                        <div class="slider-content">
                            <span data-animation="fadeInUp" data-delay=".3s">Mission</span>
                            <h2 data-animation="fadeInUp" data-delay=".6s" style="font-size: 40px;">
                                No Child Hungry
                            </h2>
                            <p data-animation="fadeInUp" data-delay=".9s">
                                Put the food on the Table of Children Living in Child Care Home
                            </p>
                            <a href="#donatewithchildcarehome" class="btn" data-animation="fadeInUp" data-delay="1.2s">Contribute</a>
                        </div>
                        <!-- <div class="whiteajexbox"> 
                        </div> -->
                    </div>

                    <div class="col-md-6">
                        <div class="widget inventory-widget">
                            <div class="inv-widget-title mb-25">
                                <h5 class="title">Choose Your Combo Product</h5>
                            </div>

                            <form action="<?= base_url() ?>/Index/checkoutpay" class="advisor-form" method="post" id="">

                                <!-- <div class="responsive-scroll justify-content-center row">
                                    <?php if ($request != '') {
                                        $j = 1;
                                        foreach ($request as $orderrow) {

                                    ?>
                                            <label class="m-1 p-1 text-center radio_label col-xs-3" style="border: 1px solid #005b6a;">
                                                <input type="radio" name="order_request_id" id="checkbox<?= $j ?>" value="<?= $orderrow['ortid']; ?>" class="radiobtn" />

                                                <?php if ($orderrow['cover'] != '') { ?>
                                                    <img src="<?= base_url('uploads/ordercover/' . $orderrow['cover']) ?>" style="width:50px;height:50px;" />
                                                <?php


                                                } else {
                                                    echo '<img src="assets/home/img/default-image.jpg"  style="width:50px;height:50px;" /> ';
                                                }
                                                ?>

                                                <div class="imgtext p-1">
                                                    <p style="font-size:14px;"> <?= wordwrap($orderrow['product_title'], 10, "<br>\n"); ?></p>
                                                    <p style="line-height: 1.1;"> ₹ <?= $orderrow['combo_price']; ?></p>
                                                </div>
                                            </label>
                                    <?php
                                            $j++;
                                        }
                                    }
                                    ?>
                                    <label class="col-xs-3 text-center" style="border: 1px solid #005b6a;">
                                        <a href="#collaborate"><img src="assets/home/img/default-image.jpg" style="width:50px;height:50px;" />
                                            <div class="imgtext p-1">
                                                <p style="font-size:12px;line-height:12px;"> Session / <br>Workshop</p>
                                            </div>
                                        </a>
                                    </label>
                                </div> -->
                                <div class="container">
                                    <div class="row product-scroller mb-3">
                                        <div class="col-md-3 
                                           col-6 p-2">
                                            <div class="card text-center p-1 col-md-12 ">
                                                <div class="card-body p-1  justify-content-center ">
                                                    <img src="<?= base_url() . 'assets/img/19071658243979122.jpg' ?>" style="width:80px;height:80px;display:initial" class="border" />
                                                    <h6 class="card-title">Birthdays Celebration
                                                    </h6>

                                                    <a href="<?= base_url('celebrate_with_us') ?>" class="btn btn-primary select_order">Select</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($request != '') {
                                            $j = 1;
                                            foreach ($request as $orderrow) {

                                        ?>
                                                <div class="col-md-3 col-6 p-2">
                                                    <div class="card text-center p-1 col-md-12 order_request_id order_request_id<?= $orderrow['ortid']; ?>">
                                                        <div class="card-body p-1  justify-content-center ">
                                                            <img src="<?= ((file_exists('./uploads/ordercover/' . $orderrow['cover']) && $orderrow['cover'] != '') ? base_url('uploads/ordercover/' . $orderrow['cover']) : base_url() . 'assets/home/img/default-image.jpg') ?>" style="width:80px;height:80px;display:initial" class="border" />
                                                            <h6 class="card-title"><?= $orderrow['product_title'] ?><p class="card-text"><b> ₹ <?= $orderrow['combo_price']; ?></b></p>
                                                            </h6>
                                                            <span data-id="<?= $orderrow['ortid']; ?>" class="btn btn-primary select_order order_req">Select</span>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                                $j++;
                                            }
                                        }
                                        ?>
                                        <div class="col-md-3 
                                           col-6 p-2">
                                            <div class="card text-center p-1 col-md-12 ">
                                                <div class="card-body p-1  justify-content-center ">
                                                    <img src="<?= base_url() . 'assets/img/17081660752612469.jpg' ?>" style="width:80px;height:80px;display:initial" class="border" />
                                                    <h6 class="card-title">Session / Workshop
                                                    </h6>

                                                    <a href="#collaborate" class="btn btn-primary select_order">Select</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="order_type" value="1" />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" id="order_request_id" name="order_request_id" placeholder="" required />
                                            <input type="text" id="direct_name" name="name" placeholder="  Name *" required />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="direct_number" name="number" placeholder="Contact Number *" required />
                                        </div>
                                        <div class="col-md-12">
                                            <input type="email" id="direct_email" name="email" placeholder="  Email *" required />
                                        </div>
                                        <div class="col-md-12">
                                            <select name="orphane_id" id="cchlist" required>
                                                <option value="">Select Child Care Home</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="t&c" value="Agree Terms and Conditions" required />
                                            <label for="t&c" style="display: inline;"> Agree with our <a href="<?= base_url('Index/terms_condition') ?>" style="color: #006573; font-weight: 600;">Terms and Conditions</a> </label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" required id="you are eligible as a indian donator" value="you are eligible as a indian donator" />
                                            <label for="you are eligible as a indian donator">You are an
                                                Indian Resident</label>
                                        </div>

                                        <button class="btn" type="button" id="directorder">Contribute</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
            <!--<div class="banner-overlay-text">SriMitra India</div>-->
            <!-- <div class="banner-line-wrap">
                <span class="line-one"></span>
                <span class="line-two"></span>
            </div> -->
        </section>
        <!-- banner-area-end -->

        <!-- services-area -->
        <!-- <section class="best-services-area">
            <h4>Our Impact</h4>
            <section class="features-area pt-40 pb-20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-8">
                            <div class="features-item mb-30">
                                <div class="features-icon mb-25">
                                    <img src="<?= base_url() ?>assets/home/img/icon/h3_features_icon02.png" alt="" />
                                </div>
                                <div class="features-content">
                                    <h5>Experience the power of giving</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <div class="features-item mb-30">
                                <div class="features-icon mb-25">
                                    <img src="<?= base_url() ?>assets/home/img/icon/h3_features_icon02.png" alt="" />
                                </div>
                                <div class="features-content">
                                    <h5>Take Small Steps to Spread Big Smiles</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <div class="features-item mb-30">
                                <div class="features-icon mb-25">
                                    <img src="<?= base_url() ?>assets/home/img/icon/h3_features_icon02.png" alt="" />
                                </div>
                                <div class="features-content">
                                    <h5>We creates stronger future families.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section> -->
        <!-- services-area-end -->

        <section id="donatewithchildcarehome" class="inventory-list-area gray-lite-bg pt-40 pb-50">
            <div class="container">
                <div class="inventory-meta-wrap mb-8">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <div class="inventory-top-meta">
                                <h2>Contribute to Your Nearest Child Care Home
                                </h2>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-8" style="margin-bottom: 10px;">
                            <form action="#" class="car-search-form ">
                                <div class="row align-items-end justify-content-center">
                                    <div class=" custom-col-6">
                                        <select name="name" class="statelist">
                                            <option value="">Select State</option>
                                            <?php
                                            $i = 1;
                                            if (!empty($statelist)) {
                                                foreach ($statelist as $row) {

                                                    $data = getSingleRowById('tbl_state', array('state_id' => $row['state']));
                                                    // print_r($data);
                                                    if ($data != '') {

                                            ?>
                                                        <option value="<?= $data['state_id'] ?>"><?= $data['state_name'] ?></option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-md-6" id="filter_data">


                    </div>
                </div>
            </div>
        </section>


        <div class="col-md-12 pt-20 pb-20" style="background: #006573; margin: auto">
            <div class="section-title white-title pt-40 mb-40 text-center">
                <!-- <span class="sub-title">Advantages</span> -->
                <h2 style="color: #fff;">Fulfill <span style="color: #ffa800;">Nutrition</span> Requirement
                    of Children</h2>
                <!-- <p style="color: #fff; font-size: 15px; text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, reprehenderit. Labore alias, dicta id debitis molestiae assumenda. Eveniet hic excepturi vel quasi, eligendi, cumque illum, ut reprehenderit cupiditate iure eum? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, reprehenderit. Labore alias, dicta id debitis molestiae assumenda. Eveniet hic excepturi vel quasi, eligendi, cumque illum, ut reprehenderit cupiditate iure eum?</p> -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget inventory-widget">
                            <div class="sidebar-fv-active">
                                <?php if ($order != '') {
                                    $j = 1;
                                    foreach ($order as $orderrow) {
                                        $mar = getRowById('tbl_orphanage', 'id', $orderrow['orphan_id']);
                                        if ($mar != '') {
                                ?>
                                            <div class="sidebar-fv-item">
                                                <div class="fv-top-tag">
                                                    <div class="inventory-features">
                                                        <div class="inv-widget-title">
                                                            <h5 class="title uppercase"><br />
                                                                <span class="highlightfont"><?= $mar[0]['name']; ?></span> <br />
                                                                <span style="font-size: 14px; font-weight: 400">Request on. - <?= convertDatedmy($orderrow['create_date']); ?></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-12 text-right text-info">
                                                            Use button to customize quantity
                                                        </div>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td># </td>
                                                                <td>Product </td>
                                                                <td>Quantity requested </td>
                                                                <td>Price/unit </td>
                                                                <td>Use Button to customize </td>
                                                                <!-- <td>Total Amount </td> -->
                                                            </tr>
                                                            <tbody>
                                                                <?php

                                                                $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['oid']);
                                                                if (!empty($data)) {
                                                                    $i = 1;
                                                                    foreach ($data as $datarow) {
                                                                        $merchant = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                                        $product = getSingleRowById('products', array('product_id' => $merchant['product_id']));
                                                                ?>
                                                                        <tr>
                                                                            <td style="width:5% ;">
                                                                                <input type="checkbox" name="checkbox_check[]" class="add-cart" data-id="<?= $merchant['id'] ?>" data-orpahneid="<?= $mar[0]['id'] ?>">
                                                                            </td>

                                                                            <td style="width:25% ;">
                                                                                <p>
                                                                                    <?= $product['pro_name'] ?>
                                                                                </p>
                                                                            </td>
                                                                            <td style="width:25% ;">
                                                                                <p>

                                                                                    <?= ($merchant['quantity'] * $datarow['quantity']) ?> <?= $merchant['quantity_type'] ?>
                                                                                </p>
                                                                            </td>
                                                                            <td style="width:30% ;">
                                                                                <?= $merchant['srimitra_price'] ?> /<?= $merchant['quantity_type'] ?>
                                                                            </td>
                                                                            <td style="width:40% ;">
                                                                                <!-- <button id="dec<?= $data['product_id'] ?>" data-id="<?= $data['product_id'] ?>" data-timeid="<?= $orderrow['timestamp']; ?><?= $data['product_id'] ?>" class="btn btn-info fa fa-minus pull-left dec"></button> -->
                                                                                <input type="number" name="qty" min="0" max="<?= $datarow['quantity'] ?>" value="<?= $datarow['quantity'] ?>" class="qtysidecart<?= $merchant['id'] ?> p-0 col-md-4" id="amt<?= $orderrow['timestamp']; ?><?= $merchant['id'] ?>">
                                                                                <!-- <button id="inc<?= $data['product_id'] ?>" data-id="<?= $data['product_id'] ?>" data-timeid="<?= $orderrow['timestamp']; ?><?= $data['product_id'] ?>" class="btn btn-info fa fa-plus pull-right inc"></button> -->
                                                                            </td>
                                                                            <!-- <td style="width:30% ;">

                                                                            </td> -->
                                                                        </tr>
                                                                <?php
                                                                        $i++;
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                        <div class="row">
                                                            <?php
                                                            if ($this->session->has_userdata('login_user_id')) {
                                                            ?>
                                                                <div class="col-sm-6">
                                                                    <button class="btn btn-block savecart" id="savecart" data-or_id="<?= $orderrow['oid'] ?>" data-order_type="0">Add to cart</button>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="col-sm-12 text-center">
                                                                    <!--<button class="btn btn-block savecart" id="savecart" data-or_id="<?= $orderrow['oid'] ?>" data-order_type="0">Add to cart</button>-->
                                                                    <button class="btn btn-block margint" data-toggle="modal" data-target="#myModalrequest">Add To Cart</button>
                                                                    <!-- <button class="btn btn-block " id="requestlogin">Add To Cart</button> -->
                                                                </div>
                                                                <!-- <div class="col-sm-6">
                                                                    <button class="btn btn-block" data-toggle="modal" data-target="#myModalinfo" style="background:#010101">Proceed as guest </button>
                                                                </div> -->
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                <?php
                                            $j++;
                                        }
                                    }
                                } else {
                                    echo ' <div class="inventory-features mb-30">
                            <div class="inv-details-title">
                                <h5>There is no new request </h5>
                                </div></div>';
                                }
                                ?>

                            </div>
                            <h6>Do you want to know how your contribution is making changes?<br>
                                <a href="<?= base_url('Index/login_here') ?>" class="text-primary">Sign up  </a> with us today and become part of ever growing SriMitra family.</h6>
                        </div>
                    </div>
                    <div class="col-md-6 fact-area dflex" style="margin-top: -25px;">
                        <!--<img src="<?= base_url() ?>assets/home/img/child-eating.jpg" alt="child" class="imgresponsive" style="width: 425px;" />-->
                        <div class="section-title white-title pt-40 mb-40">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h4 style="color : #fff;">For A Child, Your <span style="color: #ffa800;">Contribution</span> Means
                            </h4>
                            <div class="mt-1" style="display: flex; flex-direction: row;">
                                <img src="<?= base_url() ?>assets/home/img/icon-1.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                <p style="color : #fff;"><b>Healthy three time meals. </b></p>
                            </div>
                            <div class="mt-1" style="display: flex; flex-direction: row;">
                                <img src="<?= base_url() ?>assets/home/img/icon-2.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                <p style="color : #fff;"> <b> Better growth and immunity </b>
                                </p>
                            </div>
                            <div class="mt-2" style="display: flex; flex-direction: row; ">
                                <img src="<?= base_url() ?>assets/home/img/icon-3.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                <p style="color : #fff;"> <b> Keep children active throughout the day</b>
                                </p>
                            </div>
                            <div class="mt-2" style="display: flex; flex-direction: row; ">
                                <img src="<?= base_url() ?>assets/home/img/icon-4.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                <p style="color : #fff;"> <b> Reduce the risk of diseases</b>
                                </p>
                            </div>
                            <div class="mt-2" style="display: flex; flex-direction: row;">
                                <img src="<?= base_url() ?>assets/home/img/icon-5.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                <p style="color : #fff;"> <b> Sets the stage towards living a healthy and balanced life</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12 pt-40 pb-40" style="
background: #f3f3f3;
margin: auto;
background: url('<?= base_url() ?>assets/home/img/backgroundimg.jpg');
">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 fact-area dflex">
                        <!--<img src="<?= base_url() ?>assets/home/img/children.jpg" alt="" width="500" class="imgresponsive1">-->
                        <video width="100%" height="95%" controls>
                            <source src="<?= base_url() ?>assets/video/SriMitra India.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-6">
                        <div class="section-title white-title pt-40 mb-40">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h2 class="" style="margin-bottom: 25px;">Benefits of Joining Our <br><span style="color: #ffa800;"> SriMitra</span> Family
                            </h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="display-f"><img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;"> <b> A Welcome Certificate </b></p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="display-f"> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;"> <b> Certificate of SriMitra Membership </b>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="display-f"> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b> Instant Gratification</b>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p class="display-f"> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b> Family of Contributer</b>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p class="display-f"> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b> Celebration of Events</b>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p class="display-f"> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b>Part of a Community</b>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <!--<a href="javascript:void(0)" data-toggle="modal" data-target="#REGModal" class="btn marginb" data-animation="fadeInUp" data-delay="1.2s">Subscribe us</a>-->
                                    <a href="#donatewithchildcarehome" class="btn marginb" data-animation="fadeInUp" data-delay="1.2s">Contribute to Your Nearest Child Care Home </a>
                                </div>



                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>






        <div class="col-md-12 pt-40 pb-40" style="background: #006573; margin: auto;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-title white-title pt-40 mb-40">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h2 style="color: #fff;">SriMitra India is a Contribution Platform to support childrens shelter
                                homes</h2>
                            <p style="color: #fff; font-size: 15px;">It Aims to facilitate regular in-kind Contributions
                                towards children's shelter home basic Requirement through need-based and transparent
                                Contributions</p>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#REGModal" class="btn marginb" data-animation="fadeInUp" data-delay="1.2s">Subscribe us</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#REGModal" class="btn marginb" data-animation="fadeInUp" data-delay="1.2s">Become Our Monthly
                                Contributer</a>
                        </div>
                    </div>
                    <div class="col-md-4 fact-area dflex">
                        <img src="<?= base_url() ?>assets/home/img/zc.png" alt="" width="400" height="300" class="imgresponsive1">
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-12 pt-40 pb-40" style="background: #f3f3f3;
    margin: auto;
    background: url('<?= base_url() ?>assets/home/img/backgroundimg.jpg');" id="collaborate">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title white-title pt-40 mb-40 padding-top">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h2>Share The <span style="color: #ffa800;">Responsibility. Contribute</span> With 3 Easy
                                Steps!
                            </h2>
                        </div>
                        <div class="dflex">
                            <img src="<?= base_url() ?>assets/home/img/responsibility.png" alt="" class="imgresponsive1" width="100%">
                        </div>
                    </div>
                    <div class="col-md-6 contact-form-wrap">
                        <div class="login-wrap">
                            <h3 class="widget-title"><span>Collaborate</span> with us</h3>
                            <form action="" class="login-form" method="post">
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                                <div class="row">
                                    <div class="form-grp col-md-6">
                                        <label for="name"> Name <span>*</span></label>
                                        <input type="text" id="name" name="name" placeholder="  Name" required />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="number"> Contact No. <span>*</span></label>
                                        <input type="text" id="number" name="number" placeholder="  Contact No." required />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="email"> Email <span>*</span></label>
                                        <input type="email" id="email" name="email" placeholder="  Email" />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="location"> Location <span>*</span></label>
                                        <select class="form-control" name="location" id="location" required>
                                            <option value="">Select Location</option>
                                            <?php

                                            foreach ($city_list as $row) {
                                            ?>
                                                <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-grp col-md-12 f24" style="font-size: 44px">
                                        <input type="radio" id="childcarehome" name="type" value="Child Care Home" />
                                        <label for="childcarehome" class="f11">Child Care Home</label>
                                        <input type="radio" id="investor" name="type" value="Investor" />
                                        <label for="investor" class="f11">Investor</label> <br>
                                        <input type="radio" id="merchant" name="type" value="Merchant" />
                                        <label for="merchant" class="f11">Merchant (Shop)</label>
                                        <input type="radio" id="volunteer" name="type" value="Volunteer" />
                                        <label for="volunteer" class="f11">Volunteer</label>

                                    </div>
                                </div>
                                <button class="btn" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="col-md-12 pt-40 pb-40 padding-top" style="background: #006573; margin: auto;" id="collaborate">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 contact-form-wrap">
                        <div class="login-wrap">
                            <h3 class="widget-title"><span>Contribution</span> Query Form</h3>
                            <form action="<?= base_url('Index/enquiry_now') ?>" class="login-form" method="post">
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                                <div class="row">
                                    <div class="form-grp col-md-6">
                                        <label for="name"> Name <span>*</span></label>
                                        <input type="text" id="name" name="name" placeholder="  Name" />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="number"> Contact Number <span>*</span></label>
                                        <input type="text" id="number" name="number" placeholder="  Number" required />
                                    </div>
                                    <div class="form-grp col-md-12">
                                        <label for="email"> Email <span>*</span></label>
                                        <input type="email" id="email" name="email" placeholder="  Email" />
                                    </div>

                                    <div class="form-grp col-md-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>


                                </div>
                                <button class="btn" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-title white-title pt-40 mb-40">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h2><span style="color: #ffa800;">Ask Us ! </span>

                            </h2>
                        </div>
                        <div class="dflex">
                            <img src="<?= base_url() ?>assets/home/img/callcenter.png" alt="" class="imgresponsive1" width="100%">
                        </div>
                    </div>


                </div>
            </div>
        </div>















        <!-- footer-brand-area -->
        <div class="footer-brand-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 order-2 order-md-0">
                        <div class="footer-logo">
                            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home/img/logo.png" alt="" height="40" /></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row footer-brand-active">
                            <div class="col">
                                <div class="footer-brand-item">
                                    <img src="<?= base_url() ?>assets/home/img/logo1.png" alt="" height="50" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <img src="<?= base_url() ?>assets/home/img/logo2.png" alt="" height="50" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <img src="<?= base_url() ?>assets/home/img/logo3.png" alt="" height="50" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <img src="<?= base_url() ?>assets/home/img/logo4.png" alt="" height="50" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <img src="<?= base_url() ?>assets/home/img/logo5.png" alt="" height="50" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <img src="<?= base_url() ?>assets/home/img/logo6.png" alt="" height="50" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-brand-area-end -->
    </main>
    <!-- main-area-end -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
    <script>
        filter_data_state();
        // $(function() {
        //     // Owl Carousel
        //     var owl = $(".owl-carousel");
        //     owl.owlCarousel({
        //         // items: 3,
        //         margin: 10,
        //         loop: true,
        //         nav: true,
        //         dots: true,
        //         responsive: {
        //             0: {
        //                 items: 1,
        //                 center: false,
        //                 nav: false,
        //             },
        //             575: {
        //                 items: 1,
        //                 center: false,
        //                 nav: false,
        //             },
        //             768: {
        //                 items: 1,
        //                 center: false,
        //             },
        //             992: {
        //                 items: 2,
        //                 center: false,
        //             },
        //             1200: {
        //                 items: 3
        //             },
        //         }
        //     });

        // });

        $(document).on('click', '.order_req', function() {
            // $('.radiobtn').click(function() {
            var df = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Ajax/get_cch",
                data: {
                    cch: df
                },
                success: function(response) {
                    console.log(response);
                    $('#cchlist').html(response);
                }
            });

        });
        $(document).on('change', '.statelist', function() {
            filter_data_state();
        });
    </script>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/slick/slick.min.js"></script> -->

    <script>
        $(document).on('click', '.select_order', function() {
            var id = $(this).data('id');
            $("#order_request_id").val(id);
            $(".order_request_id").css('border', '1px solid grey');
            $(".order_request_id" + id).css('border', '3px solid green');

        });
        // $(document).ready(function() {
        //     $('.single-item').slick({
        //         dots: false,
        //         infinite: true,
        //         speed: 100,
        //         slidesToShow: 4,
        //         slidesToScroll: 4,
        //         autoplay: true,
        //         arrows: false,
        //         autoplaySpeed: 2000,
        //         responsive: [{
        //                 breakpoint: 1024,
        //                 settings: {
        //                     slidesToShow: 4,
        //                     slidesToScroll: 4,
        //                     infinite: true,
        //                     dots: false
        //                 }
        //             },
        //             {
        //                 breakpoint: 600,
        //                 settings: {
        //                     slidesToShow: 3,
        //                     slidesToScroll: 3,
        //                     infinite: true,
        //                     dots: false
        //                 }
        //             },
        //             {
        //                 breakpoint: 480,
        //                 settings: {
        //                     slidesToShow: 2,
        //                     slidesToScroll: 2,
        //                     infinite: true,
        //                     dots: false
        //                 }
        //             }
        //             // You can unslick at a given breakpoint now by adding:
        //             // settings: "unslick"
        //             // instead of a settings object
        //         ]
        //     });
        // });
    </script>
</body>


</html>