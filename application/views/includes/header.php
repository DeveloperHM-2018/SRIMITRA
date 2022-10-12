<style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #9ddadb;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }
</style>
<header class="header-style-two transparent-header">
    <div class="header-top-wrap">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <div class="header-top-action">
                        <ul>
                            <li><i class="far fa-envelope"></i><a href="mailto:<?= $contactdetails[0]['f_email'] ?>" class="text-white">
                                    <?= $contactdetails[0]['f_email'] ?>
                                </a></li>
                            <li class="text-white"><i class="fas fa-phone"></i> <a href="tel:<?= $contactdetails[0]['f_contact'] ?>" class="text-white"> +91 <?= $contactdetails[0]['f_contact'] ?> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right">
                        <ul>
                            <li class="header-top-social">
                                <!--<a href="https://www.facebook.com/srimitraindia" ><i class="fab fa-facebook-square"></i></a>-->
                                <!--<a href="https://twitter.com/srimitraindia" ><i class="fab fa-twitter-square"></i></a>-->
                                <!--<a href="https://www.instagram.com/srimitra.india/" ><i class="fab fa-instagram"></i></a>-->
                                <!--<a href="https://www.linkedin.com/company/sri-mitra-india/" ><i class="fab fa-linkedin"></i></a>-->

                            <li><a href="<?= $contactdetails[0]['facebook'] ?>" ><i class="text-white fab fa-facebook-f"></i></a></li>
                            <li><a href="<?= $contactdetails[0]['instagram'] ?>" ><span class="text-white fab fa-instagram"></span></a></li>
                            <li><a href="<?= $contactdetails[0]['linkedin'] ?>" ><span class="text-white fab fa-linkedin"></span></a></li>
                            <li><a href="<?= $contactdetails[0]['twitter'] ?>" ><span class="text-white fab fa-twitter"></span></a></li>

                            </li>
                            <li class="header-top-login">
                                <?php
                                if (sessionId('login_user_id') !== null) {
                                    if (sessionId('login_user_id') == 0) {
                                ?>
                                        <a href="<?= base_url('Index/login_here') ?>"  class="text-white"><i class="far fa-user-circle"></i> Mitra's Login</a>
                                    <?php
                                    } else {

                                    ?>
                                        <!-- <a href="<?= base_url('my_confirmed_donation') ?>"><i class="far fa-user-circle"></i> My donation</a> -->
                                        <!--<a href="<?= base_url('profile') ?>"><i class="far fa-user-circle"></i> Mitra's account</a>-->
                                        <a href="<?= base_url('my_celebration') ?>"><i class="far fa-user-circle"></i> My Celebration</a>
                                        <a href="<?= base_url('my_donation') ?>"><i class="far fa-user-circle"></i> My Contribution </a>

                                        <a href="<?= base_url('update_profile') ?>"><i class="far fa-user-circle"></i><?php $nm = substr(trim(sessionId('login_user_name')), 0, strpos(trim(sessionId('login_user_name')), " ")); echo (($nm == '')? 'My Profile':$nm); ?></a>
                                        <a href="<?= base_url('Index/logout') ?>"> Logout</a>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <!-- <a href="#"  class="text-white" id="mitralogin"><i class="far fa-user-circle"></i> Mitra's Login</a> -->

                                    <a href="<?= base_url('Index/login_here') ?>"  class="text-white"><i class="far fa-user-circle"></i> Mitra's Login</a>

                                    <!--<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="text-white"><i class="far fa-user-circle"></i> Mitra's Login</a>-->
                                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#REGModal">Mitra's -->
                                    <!-- Signup</a> -->
                                <?php
                                }
                                ?>

                            </li>
                            <!-- <li class="header-top-login">
                                    <a href="login-register.html"><i class="far fa-user-circle"></i> LOGIN</a>
                                    <a href="login-register.html">REGISTER</a>
                                </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="" class="main-header menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo">
                                <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="Logo" height="40" /></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li><a href="<?= base_url('celebrate_with_us') ?>">Celebrate with us</a></li>
                                    <li><a href="<?= base_url('know_about_us') ?>">Our Story</a></li>
                                    <li><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                                    <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                                    <li class="hiddenbtn"><a href="#donatewithchildcarehome" class="btn contri_btn" data-animation="fadeInUp" data-delay="1.2s">Contribute</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    <li class="header-btn">
                                        <a href="<?= base_url('child_care_homes') ?>" class="btn">Let’s Contribute</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <div class="menu-backdrop"></div>
                        <div class="close-btn"><i class="fas fa-times"></i></div>

                        <nav class="menu-box">
                            <div class="nav-logo">
                                <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="" title="" /></a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="<?= $contactdetails[0]['facebook'] ?>" ><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?= $contactdetails[0]['instagram'] ?>" ><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="<?= $contactdetails[0]['linkedin'] ?>" ><span class="fab fa-linkedin"></span></a></li>
                                    <li><a href="<?= $contactdetails[0]['twitter'] ?>" ><span class="fab fa-twitter"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>

    </div>
</header>