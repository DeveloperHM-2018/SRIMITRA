<!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>

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

        <section class="inventory-details-area gray-lite-bg pt-60 pb-120">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="contact-form-wrap">
                            <div class="login-wrap m-0 text-center shadow" style="background: #fff;">
                                <h3 class="widget-title">Thank you for contributing towards Child care homes. <br><br>Because of your generosity, there will be a smile in one of the childs face.</h3>
                                <p>
                                    Your Payment of Rs. <?= $response['amount'] ?> is being <?= (($response['status'] == 'success')? 'accepted':'failed') ?>.
                                </p>
                                <p>Transaction id : <?= $response['mihpayid'] ?></p>
                                <div class="row">
                                    <div class="col-md-4 col-6 mt-1">
                                        <a href="<?= base_url('child_care_homes') ?>">
                                            <button type="button" class="btn btn-primary col-md-12">
                                                <p class="small m-0 twhite">Contribute more.</p>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-6 mt-1">
                                        <a href="<?= base_url('Index/my_donation') ?>">
                                            <button type="button" class="btn btn-primary orangebtn  col-md-12">
                                                <p class="small m-0 twhite">Contribution History.</p>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-12 mt-1 ">
                                        <a href="whatsapp://send?text=My dear friend , Some childrens need your contribution, you can do it with the help of SriMitra India Join now. https://www.webangeltech.com/srimitra/ " data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp">
                                            <button type="button" class="btn btn-primary  col-md-12">
                                                <p class="small m-0 twhite">Share it to friends.</p>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-12 mt-1 ">
                                        
                                        
                                    <?php
                                        $cch = getSingleRowById('tbl_orphanage', array('id' => $orderDetails['orphane_id']));
                                        
                                        if (!empty($cch)) {
                                        ?>
                                        <a href="<?= base_url() ?>child_care_home_profile/<?= encryptId($orderDetails['orphane_id']) ?>/<?= url_title($cch['name']) ?>#feedback">
                                            <button type="button" class="btn btn-primary  col-md-12">
                                                <p class="small m-0 twhite">Share your feedback</p>
                                            </button>
                                        </a>
                                        
                                        <?php
                                        
                                        }
                                        ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="<?= base_url('assets/img/3.png') ?>" style="width: 100%;" />
                    </div>
                </div>
            </div>
        </section>

    </main>


    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>