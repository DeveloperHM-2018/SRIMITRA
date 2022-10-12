<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div class="user-details">
            <div class="d-flex">
                <div class="me-2">
                    <img src="<?= base_url() ?>assets/images/users/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info w-100">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <br>Hi, <?= sessionId('name') ?>
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="javascript:void(0)" class="dropdown-item"><i> 
                                        class="mdi mdi-account-circle text-muted me-2"></i> 
                                    Profile<div class="ripple-wrapper me-2"></div> 
                                </a></li> 
                            <li><a href="javascript:void(0)" class="dropdown-item"><i>
                                        class="mdi mdi-cog text-muted me-2"></i> 
                                    Settings</a></li> 
                            <li><a href="javascript:void(0)" class="dropdown-item"><i 
                                        class="mdi mdi-lock-open-outline text-muted me-2"></i> 
                                    Lock screen</a></li>  -->
                            <li><a href="<?= base_url('Childcare_homes/change_password') ?>" class="dropdown-item">
                                    Change password</a></li>
                                    <li><a href="<?= base_url('admin/Orphane_logout') ?>" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i>
                                    Logout</a></li>
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
                <li class="menu-title">Main</li>
                <li>
                    <a href="<?= base_url('Childcare_homes') ?>" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Childcare_homes/new_order_request') ?>" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Add Order Request</span>
                    </a>
                </li>
                <!-- <li>
                            <a href="<?= base_url('Childcare_homes/order_request') ?>" class="waves-effect">
                                <i class="mdi mdi-home"></i> 
                                <span>New Order Request list</span>
                            </a>
                        </li> -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email"></i>
                        <span>Order status by admin</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('Childcare_homes/accepted_order_request') ?>">Accepted</a></li>
                        <li><a href="<?= base_url('Childcare_homes/rejected_order_request') ?>">Rejected</a></li>
                         <li><a href="<?= base_url('Childcare_homes/completed_order_request') ?>">Completed</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email"></i>
                        <span>Contribution</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('Childcare_homes/donation') ?>">Accepted by merchant</a></li>
                         
                        <li><a href="<?= base_url('Childcare_homes/delivered_donation') ?>">Delivered by merchant</a></li> 
                        <li><a href="<?= base_url('Childcare_homes/confirmed_donation') ?>">Completed Contribution</a></li> 
                        
                    </ul>
                </li> 
                <!--<li>-->
                <!--    <a href="<?= base_url('Childcare_homes/donation') ?>" class="waves-effect">-->
                <!--        <i class="mdi mdi-home"></i>-->
                        <!-- <span>Share Tax Benefit Certificate</span> -->
                <!--        <span>Contribution's</span>-->
                <!--    </a>-->
                <!--</li>-->

                <!--<li>-->
                <!--    <a href="<?= base_url('Childcare_homes/view_products') ?>" class="waves-effect">-->
                <!--        <i class="mdi mdi-home"></i>-->
                <!--        <span>Products List</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a href="<?= base_url('Childcare_homes/celebrate_with_us') ?>" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Celebration with us</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('Childcare_homes/report_donation') ?>">Total Contribution </a></li>
                        <li><a href="<?= base_url('Childcare_homes/report_donor') ?>">Total Donors</a></li> 
                        <!--<li><a href="<?= base_url('Childcare_homes/report_product') ?>">Most ordered products items</a></li> -->
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->