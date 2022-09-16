<!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>
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
                    
                    <div class="col-lg-5 hidden-form">
                        <div class="contact-form-wrap">
                            <div class="trans-wrap m-0 p-3">
                                <h6 class="text-danger ">Make sure that you enter your payment ID for the Contribution in order to receive your tax benefit certificate</h6>
                                <a class="example-image-link" href="<?= base_url('assets/img/pay.jpg') ?>" data-lightbox="example-1">
                                    <img src="<?= base_url('assets/img/pay.jpg') ?>" style="width:100%" /></a>

                                    <br><br>
                                <a href="#trans_id" class="btn btn-danger">Upload Your payment ID</a>


                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-7">

                        <form action="<?= base_url() ?>Index/checkoutpay_celebrate_payment" method="POST">
                            <div class="inventory-review-wrap mb-0">
                                <div class=" ">
                                    <div class="review-top-left">
                                        <h5>Initiated your request for celebration</h5>
                                        <h6 class="text-danger ">Please enter transaction ID for confirmation</h6>
                                        <h6 class="text-warning ">Amount : Rs. <?= $info['min_adv'] ?></h6>
                                        <hr class="m-0" />
                                    </div>

                                </div>
                                <div class="blog-comment">
                                    
                                    <div class="trans-wrap m-0 shadow p-3" id="trans_id">

                                        <!--<h3 class="widget-title">Save your <span> Payment ID </span></h3>-->

                                        <div class="row">
                                            <div class="form-grp col-sm-8">
                                                <label for="name">Your Payment ID <span>*</span></label>
                                                <input type="text" name="payment_id" placeholder="Transaction ID" class="form-control" required>

                                                <input class="form-check-input" type="hidden" name="eve_id" value="<?= $celebrate_id ?>">
                                                <input class="form-check-input" type="hidden" name="amount" value="<?= $info['min_adv'] ?>">
                                                 
                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                </div>
                                            </div>

                                            <div class="form-grp col-sm-4"><br>
                                                <button type="submit" class="btn btn-block">
                                                    <p class="small m-0 twhite">Save Payment ID</p>
                                                </button>
                                            </div>
                                        </div><br>
                                        <button type="button" class="badge badge-info" data-toggle="modal" data-target=".bd-example-modal-lg">Where to find transaction ID - Know more</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 responsive-form">
                        <div class="contact-form-wrap">
                            <div class="trans-wrap m-0 p-3">
                                <!-- <h6 class="text-danger ">Make sure that you enter your payment ID for the donation in order to receive your tax benefit certificate</h6> -->
                                <a class="example-image-link" href="<?= base_url('assets/img/pay.jpg') ?>" data-lightbox="example-1">
                                    <img src="<?= base_url('assets/img/pay.jpg') ?>" style="width:100%" /></a>

                                    <br><br>
                                <a href="#trans_id" class="btn btn-danger">Upload Your payment ID</a>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
    <script src="<?= base_url() ?>assets/css/lightbox-plus-jquery.min.js"></script>
</body>

</html>