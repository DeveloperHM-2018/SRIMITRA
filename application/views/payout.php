<!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>
<style>
    @media screen and (min-width: 480px) {
        .cartfont {
            /* font-size: 10px; */
        }
    }
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/lightbox.min.css">

<body>
    <?php include('includes/header.php'); ?>

    <main>

        <!-- <section class="breadcrumb-area breadcrumb-bg" data-background="<?= base_url() ?>assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Pay here by scanning QR code</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?><?= base_url() ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pay here</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="inventory-details-area gray-lite-bg pt-60 pb-120" style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg')">
            <div class="container">
                <div class="row">

                    <!-- <div class="col-lg-5 hidden-form">
                        <div class="contact-form-wrap">
                            <div class="trans-wrap m-0 p-3">
                                <h6 class="text-danger ">Make sure that you enter your payment ID for the Contribution in order to receive your tax benefit certificate</h6>
                                <a class="example-image-link" href="<?= base_url('assets/img/pay.jpg') ?>" data-lightbox="example-1">
                                    <img src="<?= base_url('assets/img/pay.jpg') ?>" style="width:100%" /></a>

                                    <br><br>
                                <a href="#trans_id" class="btn btn-danger">Upload Your payment ID</a>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-12">
                        <form action="" method="POST">
                            <div class="inventory-review-wrap mb-0">
                                <div class=" ">
                                    <div class="review-top-left">
                                        <h5>Cart items</h5>
                                        <!--<h6 class="text-danger ">Please enter transaction ID to complete the Contribution process</h6>-->
                                        <hr class="m-0" />
                                    </div>

                                </div>
                                <div class="blog-comment">
                                    <ul>
                                        <?php
                                        $i = 1;
                                        foreach ($this->cart->contents() as $items) : ?>
                                            <li class="cartrow<?= $items['rowid'] ?>">
                                                <div class="single-comment row">

                                                    <div class="comment-text  col-md-12 ">
                                                        <div class="comment-avatar-info row">
                                                            <div class="col-md-10 row col-9 padding_payout">
                                                                <div class="col-md-4 col-12 ">
                                                                    <h5 class="cartfont">
                                                                        <!-- <img src="<?= base_url('uploads/products/') . $items['image']; ?>" alt="<?php echo $items['name']; ?>" style="height:40px;"> -->
                                                                        <?php echo $items['name']; ?><span class="comment-date"></ /span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-md-4 col-6">
                                                                    <p class="cartfont">₹ <?php echo $this->cart->format_number($items['price']); ?> X <?php echo $items['qty']; ?> Unit</p>

                                                                    <div class="rating cartfont">
                                                                        <input type="hidden" name='' id="qtysidecart<?= $items['rowid']; ?>" value="<?php echo $items['qty']; ?>" class="qty form-control cartfont" data-rowid="<?= $items['rowid']; ?>" style="max-width:60px" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4  col-6 cartfont">
                                                                    <h6 class="cartfont"> ₹ <?php echo ($this->cart->format_number($items['price'] * $items['qty'])) ?> /-
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-3">
                                                                <a href="javascript:void(0)" class="remove removeCarthm btn btn-danger cartfont" data-id="<?= $items['rowid'] ?>"> <i class="far fa-trash-alt"></i> </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>

                                            <input class="form-check-input" type="hidden" name="orphane_id" value="<?= $items['orphane'] ?>">

                                        <?php
                                            $i++;

                                        endforeach; ?>

                                        <h6 class="m-0 text-right">Total : ₹ <?php echo $this->cart->format_number($this->cart->total()); ?></h6>
                                    </ul><br>
                                    <div class="trans-wrap m-0 shadow p-3" id="trans_id">

                                        <!--<h3 class="widget-title">Save your <span> Payment ID </span></h3>-->

                                        <div class="row">
                                            <div class="form-grp col-sm-9">
                                                <!-- <label for="name">Your Payment ID <span>*</span></label>
                                                <input type="text" name="payment_id" placeholder="Transaction ID" class="form-control" required> -->

                                                <input class="form-check-input" type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>">
                                                <input class="form-check-input" type="hidden" name="name" value="<?= $this->session->userdata('check_name') ?>">
                                                <input class="form-check-input" type="hidden" name="number" value="<?= $this->session->userdata('check_number') ?>">
                                                <input class="form-check-input" type="hidden" name="email" value="<?= $this->session->userdata('check_email') ?>">
                                                <input class="form-check-input" type="hidden" name="order_request_id" value="<?= $this->session->userdata('order_request') ?>" required>
                                                <input class="form-check-input" type="hidden" name="order_type" value="<?= $this->session->userdata('order_type') ?>" required>
                                                <input class="form-check-input" type="hidden" name="email" value="<?= $this->session->userdata('login_user_emailid') ?>">
                                                <input class="form-control" type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->total(); ?>">
                                                <input class="form-control" type="hidden" name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>">



                                                <!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content p-3">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <h4>Google pay</h4>
                                                                    <img src="<?= base_url('assets/img/payment/googlepay.jpg') ?>" style="width: 100%;" class="shadow" />
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h4>Paytm</h4>
                                                                    <img src="<?= base_url('assets/img/payment/paytm.jpg') ?>" style="width: 100%;" class="shadow" />
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h4>Phone pe</h4>
                                                                    <img src="<?= base_url('assets/img/payment/phonepe.png') ?>" style="width: 100%;" class="shadow" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="row col-md-12">
                                                <?php
                                                if (sessionId('login_user_id') !== null) {
                                                    if (sessionId('login_user_id') == 0) {
                                                ?>
                                                        <div class="form-grp col-sm-6">
                                                        </div>
                                                        <div class="form-grp col-sm-3"><br>
                                                            <a href="<?= base_url('Index/login_here') ?>" target="_blank">
                                                                <button type="button" class="btn btn-block p-3 m-0">
                                                                    <p class="small m-0 twhite p-0"><i class="far fa-user-circle"></i> Continue as User</p>
                                                                </button>
                                                            </a>
                                                        </div>

                                                        <div class="form-grp col-sm-3"><br>
                                                            <button type="submit" class="btn btn-block p-3 m-0">
                                                                <p class="small m-0 twhite p-0">Continue As Guest </p>
                                                            </button>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="form-grp col-sm-9">
                                                        </div>
                                                        <div class="form-grp col-sm-3"><br>
                                                            <button type="submit" class="btn btn-block p-3 m-0">
                                                                <p class="small m-0 twhite p-0">Continue To pay </p>
                                                            </button>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="form-grp col-sm-3"><br>
                                                        <button type="submit" class="btn btn-block p-3 m-0">
                                                            <p class="small m-0 twhite p-0">Continue To pay </p>
                                                        </button>
                                                    </div>
                                                <?php

                                                }
                                                ?>
                                            </div>

                                        </div><br>
                                        <!-- <button type="button" class="badge badge-info" data-toggle="modal" data-target=".bd-example-modal-lg">Where to find transaction ID - Know more</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-lg-5 responsive-form">
                        <div class="contact-form-wrap">
                            <div class="trans-wrap m-0 p-3">
                                <h6 class="text-danger ">Make sure that you enter your payment ID for the Contribution in order to receive your tax benefit certificate</h6>
                                <a class="example-image-link" href="<?= base_url('assets/img/pay.jpg') ?>" data-lightbox="example-1">
                                    <img src="<?= base_url('assets/img/pay.jpg') ?>" style="width:100%" /></a>

                                    <br><br>
                                <a href="#trans_id" class="btn btn-danger">Upload Your payment ID</a>


                            </div>

                        </div>
                    </div> -->
                </div>
            </div>
        </section>

    </main>


    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
    <script src="<?= base_url() ?>assets/css/lightbox-plus-jquery.min.js"></script>
</body>

</html>