<header id="page-topbar">
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
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="" height=" 22" />
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
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <!--<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--    <i class="mdi mdi-magnify"></i>-->
                <!--</button>-->

            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/user.png" alt="Header Avatar" />
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item text-primary" href="<?= base_url('admin_Dashboard/change_password') ?>">
                        <span>Change password</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-primary" href="<?= base_url('admin/logout') ?>"><i class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
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
                                <a href="<?= base_url('admin_Dashboard/change_password') ?>" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i> Change password</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/logout') ?>" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <p class="text-white-50 m-0">Administrator</p>
                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= base_url('admin'); ?>" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Child Care Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/add_child_care_home'); ?>"><span>Add CCH</span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/child_care_home'); ?>"><span>View CCH</span></a>
                        </li>

                        <li> <a href="<?= base_url('admin_Dashboard/new_request'); ?>"><span>New Order req.</span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/approved_request'); ?>"><span>Approved Order req.</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/rejected_request'); ?>"><span>Rejected Order req.</span></a>
                        </li>


                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Merchant</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/merchant_add'); ?>"><span>Add Merchant</span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/merchant'); ?>"><span>View Merchant</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin_Dashboard/user_registration') ?>" class="waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>User Registered</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>CCH Order Req. </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/new_request'); ?>"><span>New</span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/approved_request'); ?>"><span>Approved </span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/rejected_request'); ?>"><span>Rejected </span></a>
                        </li>

                    </ul>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Contribution status</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/new_donation'); ?>"><span>New</span></a></li>
                        <!-- <li>
                            <a href="<?= base_url('admin_Dashboard/approved_donation'); ?>"><span>Approved </span></a>
                        </li> -->
                        <li>
                            <a href="<?= base_url('admin_Dashboard/rejected_donation'); ?>"><span>Rejected </span></a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('admin_Dashboard/onprogress_donation'); ?>"><span>On process </span></a>
                        </li> -->
                        <li>
                            <a href="<?= base_url('admin_Dashboard/restocking_donation'); ?>"><span>Restocking </span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/completed_by_merchant_donation'); ?>"><span>Delivered by merchant </span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/completed_donation'); ?>"><span>Completed </span></a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin_Dashboard/celebrate_with_us'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>Celebrate with us Request</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Product </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/view_unit'); ?>"><span>Product Unit</span></a></li>
                        <li> <a href="<?= base_url('admin_Dashboard/view_category'); ?>"><span> Category</span></a></li>
                        <!-- <li>
                            <a href="<?= base_url('admin_Dashboard/view_subcategory'); ?>"><span>Sub Category</span></a>
                        </li> -->
                        <!-- <li>
                            <a href="<?= base_url('admin_Dashboard/import_products'); ?>">
                                <span>Import Product </span>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?= base_url('admin_Dashboard/add_products'); ?>">
                                <span>Add Product </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/view_products'); ?>">
                                <span>Product List</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('admin_Dashboard/not_approved_products'); ?>">
                                <span>Product List (Not approved)</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Order Req. template</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/add_request_template'); ?>"><span>Add</span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/view_request_template'); ?>"><span>View </span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin_Dashboard/view_subscribed_user'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>Subscriber Details</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin_Dashboard/contact_update'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>Contact Details</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin_Dashboard/addOnData'); ?>" class="waves-effect">
                        <i class="mdi mdi-clipboard"></i>
                        <span>Website data</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/document'); ?>"><span>Document list </span></a></li>
                        <li> <a href="<?= base_url('admin_Dashboard/occasion'); ?>"><span>Occasion </span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/budget'); ?>"><span>Budget </span></a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Query from web</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li> <a href="<?= base_url('admin_Dashboard/view_contact'); ?>"><span>Contact </span></a></li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/view_enquiry'); ?>"><span>Enquiry </span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/view_collabarate'); ?>"><span>Collaborate with us </span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Gallery </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="<?= base_url('admin_Dashboard/add_gallery'); ?>">
                                <span>Add Gallery </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin_Dashboard/view_gallery'); ?>">
                                <span>View Gallery</span>
                            </a>
                        </li>



                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>