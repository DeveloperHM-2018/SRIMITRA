<header id="page-topbar" class="bg-info">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= base_url() ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="60" />
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="65" />
                    </span>
                </a>
            </div>

            <!-- Menu Icon -->

            <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>


        </div>

        <div class="d-flex">



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/user.png" alt="Header Avatar" /> <br>Welcome <?= sessionId('shop_name') ?>

                </button>

                <div class="dropdown-menu dropdown-menu-end">

                    <a href="<?= base_url('merchant/change_password') ?>" class="dropdown-item text-primary"> <span> Change password</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-primary" href="<?= base_url('admin/mlogout') ?>"><i class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                        <span>Logout</span></a>
                </div>
            </div>


        </div>
    </div>
</header>


<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div class="user-details">
            <div class="d-flex">
                <div class="me-2">
                    <img src="assets/images/users/avatar-4.jpg" alt="srimitra" class="avatar-md rounded-circle" />
                </div>
                <div class="user-info w-100">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Srimitra
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?= base_url('merchant/change_password') ?>" class="dropdown-item"> Change password</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/mlogout') ?>" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <!-- <p class="text-white-50 m-0">Administrator</p> -->
                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= base_url('Merchant'); ?>" class="waves-effect">
                        <i class="mdi mdi-check-circle"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Merchant/orderPlaced'); ?>" class="waves-effect">
                        <i class="mdi mdi-check-circle"></i>
                        <span>New Order List</span>
                    </a>
                </li>
                <li>
                    <!-- <a href="<?= base_url('Merchant/onprocess_order'); ?>" class="waves-effect">
                        <i class="mdi mdi-check-circle"></i>
                        <span>In-process Order List</span>
                    </a> -->
                </li>
                <li>
                    <a href="<?= base_url('Merchant/restocking_order'); ?>" class="waves-effect">
                        <i class="mdi mdi-check-circle"></i>
                        <span>Restocking Order List</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Merchant/delivered_order'); ?>" class="waves-effect">
                        <i class="mdi mdi-check-circle"></i>
                        <span>Delivered Order List</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Merchant/confirmed_delivered_order'); ?>" class="waves-effect">
                        <i class="mdi mdi-check-circle"></i>
                        <span>Confirmed Delivered Order List</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Merchant/my_products_list'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>My Product List</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Merchant/add_products'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>Add Product</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Merchant/report'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>Product Report</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>