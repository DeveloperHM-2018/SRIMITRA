<!DOCTYPE html>
<html class="no-js" lang="en">
<?php include('includes/home-head-link.php'); ?>

<body>

    <?php include('includes/header.php'); ?>

    <!-- main-area -->
    <main>
        <!-- banner-area -->
        <section class="banner-area fix" data-background="<?= base_url() ?>assets/img/bg/marble.jpg" style="background-size:cover;">
            <div class="container custom-container">
                <div class="row align-items-center justify-content-between">

                    <div class="col-md-4">
                        <div class="slider-content">
                            <span data-animation="fadeInUp" data-delay=".3s">Let's </span>
                            <h2 data-animation="fadeInUp" data-delay=".6s" style="font-size: 40px;">
                                Celebrate with us
                            </h2>
                            <p data-animation="fadeInUp" data-delay=".9s">
                                "Let's celebrate your most important events of life with these wonderful kids in your area"
                            </p>
                            <a href="#donatewithchildcarehome" class="btn" data-animation="fadeInUp" data-delay="1.2s">Contribute</a>
                        </div>
                        <!-- <div class="whiteajexbox"> 
                        </div> -->
                    </div>

                    <div class="col-md-8">
                        <div class="widget inventory-widget">
                            <div class="inv-widget-title mb-15"><br>
                                <h5 class="title">Fill this form for a spreading happiness in your special day</h5>
                                <!-- <h5 class="title">Choose Your Combo Product</h5> -->
                            </div>
                            <form action="<?= base_url() ?>/Index/checkoutpay_celebrate" class="advisor-form" method="post" id="">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Name</label>
                                            <input type="text" id="direct_name" name="name" placeholder=" Name *" value="<?php if ($this->session->has_userdata('login_user_name')) {
                                                                                                                                echo $this->session->userdata('login_user_name');
                                                                                                                            } ?>" required />
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Contact no.</label>
                                            <input type="text" id="direct_number" name="number" placeholder=" Number *" value="<?php if ($this->session->has_userdata('login_user_contact')) {
                                                                                                                                    echo $this->session->userdata('login_user_contact');
                                                                                                                                } ?>" required />
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Email</label>
                                            <input type="email" id="direct_email" name="email" placeholder=" Email *" value="<?php if ($this->session->has_userdata('login_user_emailid')) {
                                                                                                                                    echo $this->session->userdata('login_user_emailid');
                                                                                                                                } ?>" required />
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Choose the occasion</label>
                                            <select class="form-control" name="occasion" required>
                                                <option>Select occasion</option>
                                                <?php
                                                $occasion = getAllRow('tbl_occassion');
                                                foreach ($occasion as $row) {
                                                ?>
                                                    <option value="<?= $row['occ_id']; ?>"><?= $row['occ_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Occation date</label>
                                            <input type="date" id="occ_date" name="occ_date" required />
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label> Budget</label>
                                            <select class="form-control" id="budget" name="budget" required>
                                                <option>Select budget</option>
                                                <?php
                                                $bugdet = getAllRow('tbl_budget');
                                                foreach ($bugdet as $row) {
                                                ?>
                                                    <option value="<?= $row['budget_id']; ?>"><?= $row['budget_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Share how you want to do it </label>
                                            <textarea name="how_want_to_do" id="how_want_to_do" row="4" class="form-control" required>I want to celebrate my special day by donating clothes,groceries,stationary,necessities with love and kindness and loads of blessings.
I want to have special lunch with kids of child care home and my family.
I want to propose my special person and celebrate new beginning with lunch/Donation/Party
                                            
                                            </textarea>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Any Child care home in mind ?</label>
                                            <select class="form-control" id="cch_id" name="cch_id" required>
                                                <option>Select CCH</option>
                                                <?php
                                                $cch = getAllRow('tbl_orphanage');
                                                foreach ($cch as $row) {
                                                ?>
                                                    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label>Advance Payment (min. &#x20b9;500)</label>
                                            <input type="number" value="500" name="min_adv" id="min_adv" class="form-control" min="500" required />
                                        </div>

                                        <div class="col-md-12">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="t&c" value="Agree Terms and Conditions" required />
                                            <label for="t&c"> I agree with your <a href="<?= base_url('Index/terms_condition') ?>" style="color: #006573; font-weight: 600;" target="_blank">Terms and Conditions</a> </label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" required id="you are eligible as a indian donator" value="you are eligible as a indian donator" />
                                            <label for="you are eligible as a indian donator">You are an
                                                Indian Resident</label>
                                        </div>

                                        <button class="btn" type="submit" id="eventorder">Contribute</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>
            </div>
            <!--<div class="banner-overlay-text">SriMitra India</div>-->
            <!--<div class="banner-line-wrap">-->
            <!--    <span class="line-one"></span>-->
            <!--    <span class="line-two"></span>-->
            <!--</div>-->
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
                                                            <h5 class="title ">
                                                                <span class="highlightfont"><?= $mar[0]['name']; ?></span> <br />
                                                                <span style="font-size: 14px; font-weight: 400">Request on. - <?= convertDatedmy($orderrow['create_date']); ?></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-12 text-right text-info">
                                                            Use button to customize quantity
                                                        </div>
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <?php

                                                                $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['oid']);
                                                                if (!empty($data)) {
                                                                    $i = 1;
                                                                    foreach ($data as $datarow) {
                                                                        $data = getSingleRowById('products', array('product_id' => $datarow['product']));
                                                                ?>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="checkbox" name="checkbox_check[]" class="add-cart" data-id="<?= $data['product_id'] ?>" data-orpahneid="<?= $mar[0]['id'] ?>">
                                                                            </td>

                                                                            <td>
                                                                                <p><?= $data['pro_name'] ?>

                                                                                </p>
                                                                            </td>
                                                                            <td> <?= $datarow['quantity'] ?> <?= $data['quantity_type'] ?></td>
                                                                            <td>
                                                                                <!-- <button id="dec<?= $data['product_id'] ?>" data-id="<?= $data['product_id'] ?>" data-timeid="<?= $orderrow['timestamp']; ?><?= $data['product_id'] ?>" class="btn btn-info fa fa-minus pull-left dec"></button> -->
                                                                                <input type="number" name="qty" min="0" max="<?= $datarow['quantity'] ?>" value="<?= $datarow['quantity'] ?>" class="qtysidecart<?= $data['product_id'] ?> p-0 col-md-12" id="amt<?= $orderrow['timestamp']; ?><?= $data['product_id'] ?>">
                                                                                <!-- <button id="inc<?= $data['product_id'] ?>" data-id="<?= $data['product_id'] ?>" data-timeid="<?= $orderrow['timestamp']; ?><?= $data['product_id'] ?>" class="btn btn-info fa fa-plus pull-right inc"></button> -->
                                                                            </td>
                                                                        </tr> <?php
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
                                                                    <button class="btn btn-block savecart" id="savecart" data-or_id="<?= $orderrow['oid'] ?>" data-order_type="0">Let’s Contribute</button>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="col-sm-6">
                                                                    <button class="btn btn-block margint" data-toggle="modal" data-target="#myModal">Let’s Contribute</button>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <button class="btn btn-block" data-toggle="modal" data-target="#myModalinfo" style="background:#010101">Proceed as guest </button>
                                                                </div>
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
                        </div>
                    </div>
                    <div class="col-md-6 fact-area dflex" style="margin-top: -25px;">
                        <!--<img src="<?= base_url() ?>assets/home/img/child-eating.jpg" alt="child" class="imgresponsive" style="width: 425px;" />-->
                        <div class="section-title white-title pt-40 mb-40">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h2 style="color : #fff;">For A Child, Your <span style="color: #ffa800;">Contribution</span> Means
                            </h2>
                            <div class="mt-1" style="display: flex; flex-direction: row; align-items: center;">
                                <img src="<?= base_url() ?>assets/home/img/healthy-food.png" alt="" height="40" width="40" style="margin-right: 13px;">
                                <p style="color : #fff;"><b> Better Nutrition for Growth </b></p>
                            </div>
                            <div class="mt-1" style="display: flex; flex-direction: row; align-items: center;">
                                <img src="<?= base_url() ?>assets/home/img/storytelling.png" alt="" height="40" width="40" style="margin-right: 13px;">
                                <p style="color : #fff;"> <b> Full Stomach & better Concentration to Study </b>
                                </p>
                            </div>
                            <div class="mt-2" style="display: flex; flex-direction: row; align-items: center;">
                                <img src="<?= base_url() ?>assets/home/img/prevention.png" alt="" height="40" width="40" style="margin-right: 13px;">
                                <p style="color : #fff;"> <b> Healthy Food to Fight Against Covid-19</b>
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
                        <img src="<?= base_url() ?>assets/home/img/children.jpg" alt="" width="500" class="imgresponsive1">
                    </div>
                    <div class="col-md-6">
                        <div class="section-title white-title pt-40 mb-40">
                            <!-- <span class="sub-title">Advantages</span> -->
                            <h2 class="" style="margin-bottom: 25px;">Benefits of Joining Our <br><span style="color: #ffa800;"> SriMitra</span> Family
                            </h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;"> <b> A Welcome Certificate </b></p>
                                </div>
                                <div class="col-sm-12">
                                    <p> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;"> <b> Certificate of SriMitra Membership </b>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <p> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b> Instant Gratification</b>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b> Family of Contributer</b>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b> Celebration of Events</b>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p> <img src="<?= base_url() ?>assets/home/img/growth.png" alt="" height="30" width="30" style="margin-right: 13px;">
                                        <b>Part of a Community</b>
                                    </p>
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
                                Contribution </p>
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
                            <h3 class="widget-title"><span>Collabrate</span> with us</h3>
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
                                        <input type="text" id="name" name="name" placeholder=" Name" />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="number"> Number <span>*</span></label>
                                        <input type="text" id="number" name="number" placeholder=" Number" />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="email"> Email <span>*</span></label>
                                        <input type="email" id="email" name="email" placeholder=" Email" />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="location"> Location <span>*</span></label>
                                        <input type="text" id="location" name="location" placeholder="Location" />
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
                            <h3 class="widget-title"><span>Contribution </span> Query Form</h3>
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
                                        <input type="text" id="name" name="name" placeholder=" Name" />
                                    </div>
                                    <div class="form-grp col-md-6">
                                        <label for="number"> Number <span>*</span></label>
                                        <input type="text" id="number" name="number" placeholder=" Number" required />
                                    </div>
                                    <div class="form-grp col-md-12">
                                        <label for="email"> Email <span>*</span></label>
                                        <input type="email" id="email" name="email" placeholder=" Email" />
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
                            <a href="index.html"><img src="<?= base_url() ?>assets/home/img/logo.png" alt="" height="40" /></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row footer-brand-active">
                            <div class="col">
                                <div class="footer-brand-item">
                                    <a href="index.html"><img src="<?= base_url() ?>assets/home/img/logo1.png" alt="" height="50" /></a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <a href="#"><img src="<?= base_url() ?>assets/home/img/logo2.png" alt="" height="50" /></a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <a href="#"><img src="<?= base_url() ?>assets/home/img/logo3.png" alt="" height="50" /></a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <a href="#"><img src="<?= base_url() ?>assets/home/img/logo4.png" alt="" height="50" /></a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <a href="#"><img src="<?= base_url() ?>assets/home/img/logo5.png" alt="" height="50" /></a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="footer-brand-item">
                                    <a href="#"><img src="<?= base_url() ?>assets/home/img/logo6.png" alt="" height="50" /></a>
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
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                // items: 3,
                margin: 10,
                loop: true,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                        center: false,
                        nav: false,
                    },
                    575: {
                        items: 1,
                        center: false,
                        nav: false,
                    },
                    768: {
                        items: 1,
                        center: false,
                    },
                    992: {
                        items: 2,
                        center: false,
                    },
                    1200: {
                        items: 3
                    },
                }
            });

        });

        $(document).on('click', '.radiobtn', function() {
            // $('.radiobtn').click(function() {
            var df = $(this).val();
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

</body>


</html>