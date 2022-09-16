<!doctype html>
<html class="no-js" lang="en">
<?php include('includes/head-link.php'); ?>
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<style>
    div.stars {
        /* width: 100%; */
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 16px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }

    .sinolo {
        /* width: 35%; */
        float: left;
    }

    .sinolo input {
        width: 45%;
        border: none;
        text-align: center;
    }

    .sinolo button {
        width: 25%;
        font-size: 10px;
        padding: 8px 0px;
    }

    .card {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        /*background-color: #ffffff;*/
        /* margin: 0 20px; */
        /* width: 280px; */
        /* height: 350px; */
        /*border-radius: 5px;*/
        /*box-shadow: 0 10px 20px -10px rgba(0, 0, 0, 0.2);*/
    }

    .card .percent {
        position: relative;
    }

    .card svg {
        position: relative;
        width: 147px;
        height: 159px;
        transform: rotate(-90deg);
    }

    .card svg circle {
        width: 100%;
        height: 100%;
        fill: none;
        stroke: #f0f0f0;
        stroke-width: 10;
        stroke-linecap: round;
    }

    .card svg circle:last-of-type {
        stroke-dasharray: 625px;
        stroke-dashoffset: calc(625px - (625px * var(--percent)) / 100);
        stroke: #3498db;
    }

    .card .number {
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
    }

    .card .number h3 {
        font-weight: 200;
        font-size: 3.5rem;
    }

    .card .number h3 span {
        font-size: 2rem;
    }

    .card .title h2 {
        margin: 25px 0 0;
    }

    .card:nth-child(1) svg circle:last-of-type {
        stroke: #f39c12;
    }

    .card:nth-child(2) svg circle:last-of-type {
        stroke: #2ecc71;
    }

    .grid_graph {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(7rem, 1fr));
        margin: 0;
        grid-column-gap: 30px;
    }
</style>

<body>
    <?php include('includes/header.php'); ?>

    <main>

        <!-- <div class="kelebeks">
            <div class="kelebek">
                <img src="<?= base_url() ?>assets/img/butterfly.png" width="75" alt="kelebeklerr" />
            </div>
        </div> -->


        <section class="breadcrumb-area breadcrumb-bg new" style="background: #ffffff !important;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-7 col-md-9 inventory-list-item1">
                        <div class="inventory-list-item wrap inventory-list-item2">
                            <div class="inventory-list-thumb">
                                <img src="<?= (($mar[0]['profile'] != '') ? base_url('uploads/orphange/documents/' . $mar[0]['profile']) : base_url('assets/img/1.jpg')) ?>" class="main-img" alt="">
                                <ul class="inv-thumb-meta">

                                    <!--<li><a href="#" data-toggle="tooltip" data-placement="top"-->
                                    <!--        data-original-title="Add to Favorite"><i class="fas fa-star"></i></a></li>-->

                                </ul>
                            </div>
                            <div class="inventory-list-content">
                                <div class="row">

                                    <div class="col-md-6">

                                        <h4><a href=""><?= $mar[0]['name'] ?></a></h4>

                                        <p class="location"><i class="fas fa-map-marker-alt"></i> <?= $mar[0]['address'] ?> </p>
                                    </div>


                                    <!-- <div class="inv-content-top mt-10 col-md-6">
                                        <ul>
                                            <li class="option">
                                                <a href="#orderrequest_list">Product Request</a>
                                                <?php
                                                if (null !== sessionId('login_user_id')) {
                                                ?>
                                                    <a href="#" class="new orangebtn">Add To Cart</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="new orangebtn" href="#" data-toggle="modal" data-target="#REGModal">Mitra's
                                                        Signup</a>
                                                <?php
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>

                                <!--  <div class="social-share-btns-container">-->

                                <!--      <h6 class=""><a style="color: #6a6a6a;" href="">Share on:</a></h6>-->

                                <!--    <div class="social-share-btns">-->
                                <!--        <a class="share-btn share-btn-twitter" href="https://www.webangeltech.com/srimitraa/child_care_home_profile/Uz8=/Child-care-test-2" rel="nofollow" target="_blank">-->
                                <!--             <i class="fa-brands fa-twitter"></i>-->
                                <!--            Tweet-->
                                <!--        </a>-->
                                <!--        <a class="share-btn share-btn-facebook" href="https://www.webangeltech.com/srimitraa/child_care_home_profile/Uz8=/Child-care-test-2" rel="nofollow" target="_blank">-->
                                <!--            <i class="fa-brands fa-facebook-f"></i>-->
                                <!--            Share-->
                                <!--        </a>-->
                                <!--        <a class="share-btn share-btn-linkedin" href="https://www.webangeltech.com/srimitraa/child_care_home_profile/Uz8=/Child-care-test-2" rel="nofollow" target="_blank">-->
                                <!--            <i class="fa-brands fa-linkedin-in"></i>-->
                                <!--            Share-->
                                <!--        </a>-->


                                <!--    </div>-->

                                <!--</div>-->
                                <div class="row col-md-12 grid_graph">

                                    <div class="card" style="border: none;">
                                        <!--<div class="percent">-->
                                        <!--    <svg>-->
                                        <!--        <circle cx="70" cy="66" r="50"></circle>-->
                                        <!--        <circle cx="70" cy="66" r="50" style="--percent: <?= (((int)($countrequest + 1) * 100) / (int)($totalrequest + 1)) ?>"></circle>-->
                                        <!--    </svg>-->
                                        <!--    <div class="number text-center">-->
                                        <!--<h6><?= $countrequest . '/' . $totalrequest ?></span><br>-->
                                        <!--No Of Children Living</h6>-->
                                        <!--        <h6>50</span><br>-->
                                        <!--            Children Living</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->


                                    </div>


                                    <div class="card" style="border: none;">
                                        <!--<div class="percent">-->
                                        <!--    <svg>-->
                                        <!--        <circle cx="70" cy="66" r="50"></circle>-->
                                        <!--        <circle cx="70" cy="66" r="50" style="--percent: <?= (((int)($countdonation + 1) * 100) / (int)($totaldonation + 1)) ?>"></circle>-->
                                        <!--    </svg>-->
                                        <!--    <div class="number text-center">-->

                                        <!--        <h6>100<br>-->
                                        <!--            Total Required </h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="title">-->
                                        <!--    <h4>CSS</h4>-->
                                        <!--</div>-->
                                    </div>


                                    <div class="card" style="border: none;">
                                        <!--<div class="percent">-->
                                        <!--    <svg>-->
                                        <!--        <circle cx="70" cy="66" r="50"></circle>-->
                                        <!--        <circle cx="70" cy="66" r="50" style="--percent: 90"></circle>-->
                                        <!--    </svg>-->
                                        <!--    <div class="number text-center">-->
                                        <!--<h6><?= $mar[0]['kid_fed'] ?><br>-->
                                        <!--    Fulfilled</h6>-->

                                        <!--        <h6>50<br>-->
                                        <!--            Fulfilled</h6>-->

                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="title">-->
                                        <!--    <h4>JavaScript</h4>-->
                                        <!--</div>-->
                                    </div>

                                    <div class="card" style="border: none;">
                                        <!--<div class="percent">-->
                                        <!--    <svg>-->
                                        <!--        <circle cx="70" cy="66" r="50"></circle>-->
                                        <!--        <circle cx="70" cy="66" r="50" style="--percent: 90"></circle>-->
                                        <!--    </svg>-->
                                        <!--    <div class="number text-center">-->
                                        <!--<h6><?= $totaldoner ?><span> </span><br>-->
                                        <!--    Users</h6>-->

                                        <!--        <h6><span> 200 </span><br>-->
                                        <!--            Users</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="title">-->
                                        <!--    <h4>JavaScript</h4>-->
                                        <!--</div>-->
                                    </div>

                                    <div class="card" style="border: none;">
                                        <!--<div class="progress" role="progressbar">-->
                                        <!--    <div class="progress-inner">-->
                                        <!--        <div class="progress-indicator"></div>-->
                                        <!--        <div class="progress-indicator"></div>-->
                                        <!--    </div>-->
                                        <!--    <span class="progress-label">-->
                                        <!--        <strong>60</strong>-->
                                        <!--        <span>%</span>-->
                                        <!--    </span>-->
                                        <!--</div>-->

                                        <!--<div class="description">-->
                                        <!--    <span>progress percentage is </span>-->
                                        <!--    <input type="number" min="0" max="100" step="1" value="60" />-->
                                        <!--    <span>%</span>-->
                                        <!--</div>-->
                                    </div>


                                </div>
                                <hr>
                                <?= substr($mar[0]['description'], 0, 500); ?>...<a href="#descrip">Read more</a>
                            </div>






                        </div>



                    </div>




                </div>
            </div>
        </section>


        <section class="inventory-details-area gray-lite-bg pt-20 pb-60" id="orderrequest_list" style="background-image: url('<?= base_url() ?>assets/img/backgroundimg.jpg')">
            <div class="container">
                <h3 class="text-center pb-4 c-blue"> <?= $mar[0]['tagline']; ?></h3>

                <div class="row">
                    <div class="col-lg-8">
                        <?php if ($order != '') {
                            $j = 1;
                            foreach ($order as $orderrow) {
                        ?>
                                <div class="inventory-features mb-30 tbo">
                                    <div class="inv-details-title">

                                        <!-- <h5>Product Request ID #
                                            <?= $orderrow['timestamp']; ?>
                                        </h5> -->
                                        Date -
                                        <?= convertDatedmy($orderrow['create_date']); ?>
                                    </div>
                                    <div class="col-md-12 text-right text-info">Use button to customize quantity</div>
                                    <table class="table table-striped">

                                        <tr>
                                            <td># </td>
                                            <td>Product </td>
                                            <td>Quantity requested </td>
                                            <td>Price/unit </td>
                                            <td>Use Button to customize </td>
                                            <!-- <td>Total Amount </td> -->
                                        </tr>

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


                                    </table>

                                    <div class="row">

                                        <?php
                                        if ($this->session->has_userdata('login_user_id')) {
                                        ?>
                                            <div class="col-sm-6">
                                                <button class="btn btn-block savecart" id="savecart" data-or_id="<?= $orderrow['oid'] ?>" data-order_type="0">Add To Cart</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-sm-12 text-center">
                                                <button class="btn btn-block" data-toggle="modal" data-target="#myModalrequest">Add to Cart</button>
                                                <!-- <button class="btn btn-block " id="requestlogin"  >Add To Cart</button> -->
                                                <!--<button class="btn btn-block savecart" id="savecart" data-or_id="<?= $orderrow['oid'] ?>" data-order_type="0">Add To Cart</button>-->
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <button class="btn btn-block" data-toggle="modal" data-target="#myModalinfo" style="background:#010101">Proceed as guest </button>
                                            </div> -->
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                        <?php
                                $j++;
                            }
                        } else {
                            echo ' <div class="inventory-features mb-30">
                            <div class="inv-details-title">
                                <h5>There is no new request </h5>
                                </div></div>';
                        }
                        ?>
                        <div class="row">
                            <div class=" col-md-4 p-2">
                                <div class="inventory-features mb-30 ">
                                    <div class="inv-details-title text-center">
                                        <img src="<?= base_url() . 'assets/img/19071658243979122.jpg' ?>" class="cimg" />
                                        <h5>
                                            Birthdays Celebration
                                        </h5>
                                        <h6> <br>
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="<?= base_url('celebrate_with_us') ?>" class="btn btn-block   btn-primary  ">Contribute now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($request != '') {
                                $j = 1;
                                foreach ($request as $orderrow) {

                            ?>
                                    <div class=" col-md-4 p-2">
                                        <div class="inventory-features mb-30 ">
                                            <div class="inv-details-title text-center">

                                                <?php if ($orderrow['cover'] != '') { ?>
                                                    <img src="<?= base_url('uploads/ordercover/' . $orderrow['cover']) ?>" height="100px" class="cimg" />
                                                <?php


                                                } else {
                                                    echo '<img src="' . base_url() . 'assets/img/default-image.jpg" class="cimg" /> ';
                                                }
                                                ?>

                                                <h5>
                                                    <?= $orderrow['product_title']; ?>
                                                </h5>
                                                <h6> ₹
                                                    <?= $orderrow['combo_price']; ?>
                                                </h6>
                                            </div>

                                            <div class="row">

                                                <?php
                                                if ($this->session->has_userdata('login_user_id')) {
                                                ?>
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-block saveincart" id="saveincart" data-rid="<?= $orderrow['ortid'] ?>" data-rorpahneid="<?= $mar[0]['id'] ?>" data-or_id="<?= $orderrow['ortid'] ?>" data-order_type="1">Add to cart</button>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="col-sm-12 mb-10">
                                                        <button class="btn btn-block saveincart" id="saveincart" data-rid="<?= $orderrow['ortid'] ?>" data-rorpahneid="<?= $mar[0]['id'] ?>" data-or_id="<?= $orderrow['ortid'] ?>" data-order_type="1">Add to cart</button>
                                                        <!-- <button class="btn btn-block " id="requestlogin"  >Add To Cart</button> -->
                                                        <!--<button class="btn btn-block" data-toggle="modal" data-target="#myModaladminrequest<?= $orderrow['ortid'] ?>">Add To Cart</button>-->
                                                        <div class="modal fade" id="myModaladminrequest<?= $orderrow['ortid'] ?>" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="">Log in your <span>account</span></h3>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <section class="login-register-area">
                                                                            <div class="bg-white">
                                                                                <div class="row no-gutters">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="">
                                                                                            <h5>To receive Tax benefit certificate, continue to sign up.</h5>
                                                                                            <p><?php
                                                                                                if ($this->session->has_userdata('loginmsg')) {
                                                                                                    echo $this->session->userdata('loginmsg');
                                                                                                    $this->session->unset_userdata('loginmsg');
                                                                                                }
                                                                                                ?>
                                                                                            </p>
                                                                                            <form action="<?= base_url('Index/login') ?>" method="post" class="login-form " id="login_form">
                                                                                                <div class="row">
                                                                                                    <div class="form-grp col-sm-6">
                                                                                                        <label for="username">Contact no. <span>*</span></label>
                                                                                                        <input type="text" class="form-control" name="email" placeholder=" Contact no.">
                                                                                                    </div>
                                                                                                    <div class="form-grp col-sm-6">
                                                                                                        <label for="password">Password <span>*</span></label>
                                                                                                        <input type="password" class="form-control" name="password" placeholder="*****">
                                                                                                    </div>
                                                                                                    <div class="form-grp col-sm-12 text-center">
                                                                                                        <button class="btn    " type="submit">Login now</button><br>
                                                                                                        <a href="<?= base_url('Index/forget_password') ?>" class="text-center"> Forget password ?? </a>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </form>
                                                                                            <br>
                                                                                            <p class="text-center"><span class="or">OR</span></p>
                                                                                            <ul class="action">
                                                                                                <li class="text-center"><button id="regbutton" class="btn  m-2">Please Register With Us</button>
                                                                                                    <a class="btn btn-primary m-2 saveincart" id="saveincart" data-rid="<?= $orderrow['ortid'] ?>" data-rorpahneid="<?= $mar[0]['id'] ?>" data-or_id="<?= $orderrow['ortid'] ?>" data-order_type="1">Continue anonymously</a>
                                                                                                </li><br>

                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-12">
                                                            <button class="btn btn-block" data-toggle="modal" data-target="#myModalinfo<?= $orderrow['ortid'] ?>" style="background:#010101">Proceed as guest </button>
                                                            <div class="modal fade" id="myModalinfo<?= $orderrow['ortid'] ?>" role="dialog">
                                                                <div class="modal-dialog">


                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <section class="login-register-area">
                                                                                <div class="bg-white">
                                                                                    <div class="row no-gutters">
                                                                                        <div class="col-lg-12 text-center">
                                                                                            <h4>To receive Tax benefit certificate, continue to sign up.</h4>
                                                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#REGModal" class="btn btn-warning">Mitra Registration</a>
                                                                                            <a class="btn btn-primary saveincart" id="saveincart" data-rid="<?= $orderrow['ortid'] ?>" data-rorpahneid="<?= $mar[0]['id'] ?>" data-or_id="<?= $orderrow['ortid'] ?>" data-order_type="1">Continue anonymously</a>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                            </section>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div> -->
                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $j++;
                                }
                            }
                            ?>
                        </div>
                        <div class="inventory-features mb-30">
                            <div class="inv-details-title">
                                <h5>Gallery</h5>
                            </div>

                            <!--<div class="inventory-details-slide">-->
                            <div class="container-fluid p-0 fix">
                                <div class="row no-gutters ">
                                    <!--inv-details-active-->

                                    <?php if ($gallery != '') {
                                        foreach ($gallery as $img) {
                                    ?>
                                            <div class="col-lg-4">
                                                <!--<div class="inv-details-slide-item">-->
                                                <img src="<?= base_url('uploads/orphange/gallery/') . $img['img'] ?>" alt=" <?= $mar[0]['name']; ?>" class="gheight">
                                                <!--</div>-->
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>

                            <!--</div>-->
                        </div>


                        <div class="inventory-details-description mb-30" id="descrip">
                            <div class="inv-details-title">
                                <h5>Description</h5>
                            </div>
                            <p class="justify">
                                <?= $mar[0]['description']; ?>
                            </p>
                        </div>

                        <div class="row">
                            <div class="inventory-review-wrap mb-30 testimonial_box">
                                <div class="inv-details-title">
                                    <div class="review-top-left">
                                        <h5>See what out Mitra's have to say</h5>
                                        <div class="review">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span>( 4.5 out of 5 )</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-comment">
                                    <ul>

                                        <?php if (!empty($feedback)) {
                                            // $j = 1;
                                            foreach ($feedback as $feed) {

                                        ?>

                                                <li>
                                                    <div class="single-comment">
                                                        <div class="comment-avatar-img">
                                                            <img src="<?= base_url() ?>assets/img/testavtar.png" alt="img">
                                                        </div>
                                                        <div class="comment-text">
                                                            <div class="comment-avatar-info">
                                                                <div class="left">
                                                                    <h5>
                                                                        <?= $feed['name']; ?><span class="comment-date">
                                                                            <?= $feed['email']; ?>
                                                                        </span>
                                                                    </h5>
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                <?= $feed['feedback'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                        <?php
                                            }
                                        }
                                        ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <aside class="blog-sidebar" id="Donate">

                            <?php include('enquiry_form.php'); ?>

                            <div class="widget mb-30" id="feedback">
                                <h3 class="widget-title">Share your valuable feedback</h3>
                                <div class="sidebar-form">
                                    <form action="" method="POST" class="donation_form">

                                        <?php
                                        if ($this->session->has_userdata('feedbackmsg')) {
                                            echo $this->session->userdata('feedbackmsg');
                                            $this->session->unset_userdata('feedbackmsg');
                                        }
                                        ?>
                                        <div class="form-grp">

                                            <input type="text" placeholder="Name" name="name" required>
                                        </div>
                                        <div class="form-grp">
                                            <input type="text" placeholder="Email" name="email" required>
                                        </div>
                                        <div class="form-grp text-left">
                                            <label>Rating</label>
                                            <div class="col-md-12"  >
                                            <div class="stars"  >

                                                <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                                <label class="star star-5" for="star-5"></label>
                                                <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                                <label class="star star-4" for="star-4"></label>
                                                <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                                <label class="star star-3" for="star-3"></label>
                                                <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                                <label class="star star-2" for="star-2"></label>
                                                <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                                <label class="star star-1" for="star-1"></label>

                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-grp">

                                            <textarea name="feedback" class="textarea" id="" placeholder="Feedback..." required></textarea>
                                        </div>
                                        <div class="form-grp">
                                            <input type="Submit" value="Submit" class="donation_submit_btn">
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <div class="widget mb-30">
                                <h3 class="widget-title">Contact For Any Support</h3>
                                <div class="sidebar-about">
                                    <div class="about-thumb mb-30">
                                        <img src="<?= base_url() ?>assets/img/boy-smiling.jpg" class="boy-image col-md-12" alt="">
                                    </div>
                                    <div class="sidebar-about-content">
                                        <a href="mailto:hello@srimitraindia.com" target="_blank" class="mail">hello@srimitraindia.com</a>
                                    </div>
                                    <div class="sidebar-about-social mt-20 flex_column">
                                        <a href="tel:<?= str_replace(' ', '', $contactdetails[0]['f_contact']) ?>" class="call_btn">Call Now</a>
                                        <span style="margin-top: 5px;">OR</span>
                                        <a href="https://wa.me/91<?= str_replace(' ', '', $contactdetails[0]['f_contact']) ?>?text=Hello Mitra, i have a query ! " class="call_btn">Text us on WhatsApp</a>
                                    </div>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </section>

        <?php include('includes/footer.php'); ?>
        <?php include('includes/footer-link.php'); ?>


        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script>
            (function() {
                const progress = document.querySelector(`.progress`);
                const progressIndicator = document.querySelector(`.progress-indicator`);
                const progressLabel = document.querySelector(`.progress-label > strong`);
                const input = document.querySelector(`input[type="number"]`);

                input.oninput = ({
                    target
                }) => {
                    let value = target.value <= 100 && target.value >= 0 ? target.value : 50;
                    progressLabel.textContent = value;
                    progress.style.setProperty(`--progress-value`, value);
                    progress.dataset.value = value;

                    if (value > 50) progress.classList.add(`progress--upper-half-value`);
                    else
                        progress.classList.contains("progress--upper-half-value") &&
                        progress.classList.remove(`progress--upper-half-value`);
                };
            })();
        </script>

</body>

</html>