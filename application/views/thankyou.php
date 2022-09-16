<!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>


    <section class="features-area gray-lite-bg pt-60 pb-60" style="background-image: url('<?= base_url() ?>assets/img/pattern.jpg')">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="features-item mb-30">
                        <div class="features-icon mb-25">
                            <img src="<?= base_url() ?>assets/img/icon/h3_features_icon02.png" alt="">
                        </div>
                        <div class="features-content">
                            
                                <h5><?= sessionID('regmsg'); ?></h5>
                           
                        </div>
                        
                       <button class="btn btn-block" data-toggle="modal" data-target="#myModal">Let’s Contribute</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>