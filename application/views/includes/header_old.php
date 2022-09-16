<header class="header-style-two inner-page-header">
    <div class="header-top-wrap">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <div class="header-top-action">
                        <ul>
                            <li><i class="far fa-envelope"></i><a href="mailto:<?= $contactdetails[0]['f_email'] ?>">
                                    <?= $contactdetails[0]['f_email'] ?>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right">
                        <ul>
                            <li class="header-top-login">
                                <?php
                                if (null !== sessionId('login_user_id')) {
                                ?>
                                    <!-- <a href="<?= base_url('Index/my_confirmed_donation') ?>"><i class="far fa-user-circle"></i> My donation</a> -->
                                    <a href="<?= base_url('Indexmy_celebration') ?>"><i class="far fa-user-circle"></i> My Celebration</a>
                                    <!-- <a href="<?= base_url('Index/profile') ?>"><i class="far fa-user-circle"></i> Mitra's account</a> -->
                                    <a href="<?= base_url('Index/my_donation') ?>"><i class="far fa-user-circle"></i> My Contribution </a>

                                    <a href="<?= base_url('Index/update_profile') ?>"><i class="far fa-user-circle"></i>My Profile</a>
                                    <a href="<?= base_url('Index/logout') ?>"> Logout</a>

                                <?php
                                } else {
                                ?>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="far fa-user-circle"></i> Mitra's Signin</a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#REGModal">Mitra's
                                        Signup</a>
                                <?php
                                }
                                ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="main-header menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo">
                                <a href="<?= base_url() ?>" class="sticky-logo-none"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="Logo" height="50px"></a>
                                <a href="<?= base_url() ?>" class="sticky-logo-active"><img src="<?= base_url() ?>assets/img/logo/b_logo.png" alt="Logo" height="50px"></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">

                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li class="dropdown"><a href="#"> About Us</a>
                                        <ul class="submenu">
                                            <li><a href="<?= base_url('Index/vision_and_mission') ?>">Vision Mission</a>
                                            </li>
                                            <li><a href="<?= base_url('Index/know_about_us') ?>">Know about SriMitra
                                                    India
                                                </a></li>
                                            <li><a href="<?= base_url('Index/our_mitras') ?>">Our Mitras</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown"><a href="#"> Get Involved</a>
                                        <ul class="submenu">
                                            <li><a href="<?= base_url('Index/career') ?>">career </a></li>
                                            <li><a href="<?= base_url('Index/fulltime_profile') ?>">Full time profiles</a></li>
                                            <li><a href="<?= base_url('Index/internship') ?>">Internships
                                                </a></li>
                                            <li><a href="<?= base_url('Index/live_projects') ?>">Live projects</a></li>
                                        </ul>
                                    </li>







                                    <li><a href="<?= base_url() ?>child_care_homes">Share Responsibility - Contribute </a>
                                    </li>

                                    <li><a href=" <?= base_url() ?>contact">Reach Us</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    <!-- <li class="header-shop-cart"><a href="<?= base_url() ?>cart"><i class="fas fa-shopping-basket"></i><span id="totalitem"><?= $this->cart->total_items(); ?></span></a> -->

                                    </li>
                                    <!-- <li class="header-btn"><a href="<?= base_url() ?>contact" class="btn">get a quote</a></li> -->
                                    <!-- <li class="header-search"><a href="#" data-toggle="collapse" data-target="#collapse-search-body" aria-expanded="false" aria-controls="collapse-search-body"><i class="fas fa-search"></i></a></li> -->
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="mobile-menu">
                        <div class="menu-backdrop"></div>
                        <div class="close-btn"><i class="fas fa-times"></i></div>

                        <nav class="menu-box">
                            <div class="nav-logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="" title=""></a>
                            </div>
                            <div class="menu-outer">
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="<?= $contactdetails[0]['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?= $contactdetails[0]['instagram'] ?>" target="_blank"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="<?= $contactdetails[0]['linkedin'] ?>" target="_blank"><span class="fab fa-linkedin"></span></a></li>
                                    <li><a href="<?= $contactdetails[0]['twitter'] ?>" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
        <div id="collapse-search-body" class="collapse-search-body collapse">
            <div class="search-body">
                <div class="container custom-container">
                    <form action="#">
                        <div class="form-item">
                            <input name="search" placeholder="Type here...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>