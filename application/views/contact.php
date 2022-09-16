<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/head-link.php'); ?>

<body class="commpn-here res layout-1">
    <?php include('includes/header.php'); ?>

    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>CONTACT US</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="color:white">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact-area -->
    <section class="contact-area pt-120" style="background-image: url('<?= base_url() ?>assets/img/pattern3.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-info-wrap">
                        <div class="section-title text-left mb-25">
                            <span class="sub-title">Contact information</span>
                            <h2 class="title">Our Support</h2>
                            <div class="line"><img src="img/images/title_line.png" alt=""></div>
                        </div>

                        <ul class="contact-info-list">
                            <!--<li>-->
                            <!--    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>-->
                            <!--    <div class="content">-->
                            <!--        <h5>Company Office</h5>-->
                            <!--        <p>East 40th Street New York, NY, USA</p>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="content">
                                    <h5>Hotline Number</h5>
                                    <?php if( $contactdetails[0]['f_contact'] != '' ){ ?><p><a href="tel:<?= $contactdetails[0]['f_contact'] ?>">+91 <?= $contactdetails[0]['f_contact'] ?></a></p><?php } ?>
                                    <?php if( $contactdetails[0]['s_contact'] != '' ){ ?><p><a href="tel:<?= $contactdetails[0]['s_contact'] ?>">+91 <?= $contactdetails[0]['s_contact'] ?></a></p><?php } ?>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="far fa-envelope"></i></div>
                                <div class="content">
                                    <h5>Company Email</h5>
                                    <?php if( $contactdetails[0]['f_email'] != '' ){ ?><p><a href="mailto:<?= $contactdetails[0]['f_email'] ?>"><?= $contactdetails[0]['f_email'] ?></a></p><?php } ?>
                                    <?php if( $contactdetails[0]['s_email'] != '' ){ ?><p><a href="mailto:<?= $contactdetails[0]['s_email'] ?>"><?= $contactdetails[0]['s_email'] ?></a></p><?php } ?>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="contact-form-wrap">
                        <div class="login-wrap">
                            <h3 class="widget-title">Send <span>request</span></h3>
                            <h6 class="text-warning"><?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?></h6>
                            <form action="" class="login-form" method="post">
                                <div class="form-grp">
                                    <label for="name">Name <span>*</span></label>
                                    <input type="text" id="name" name="name" placeholder="name" required>
                                </div>
                                <div class="form-grp">
                                    <label for="email">Email <span>*</span></label>
                                    <input type="email" id="email" name="email" placeholder="info@srimitra.com" required>
                                </div>
                                <div class="form-grp">
                                    <label for="email">Contact <span>*</span></label>
                                    <input type="text" id="contact" max="10" name="contact" placeholder="9516354018" required>
                                </div>
                                <div class="form-grp">
                                    <label for="message"> Message <span>*</span></label>
                                    <textarea name="message" id="message" placeholder="Hello..." required></textarea>
                                </div>
                                <button class="btn">Send </button> <br>
                            </form> <br>  <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- footer-brand-area-end -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>