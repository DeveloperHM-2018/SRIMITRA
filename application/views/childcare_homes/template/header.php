 <header id="page-topbar">
     <div class="navbar-header">
         <div class="d-flex">

             <!-- LOGO -->
             <div class="navbar-brand-box">
                 <a href="#" class="logo logo-dark">
                     <span class="logo-sm">
                         <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="22" />
                     </span>
                     <span class="logo-lg">
                         <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="24" />
                     </span>
                 </a>

                 <a href="#" class="logo logo-light">
                     <span class="logo-sm">
                         <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="22" />
                     </span>
                     <span class="logo-lg">
                         <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="24" />
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
                
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                   
                 </div>
             </div>


             <div class="dropdown d-inline-block">
                 <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/user.png" alt="Header Avatar" /> <br>Hi, <?= sessionId('name') ?>
                 </button>

                 <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a class="dropdown-item" href="<?= base_url('Childcare_homes/child_care_home_details/'.encryptId(sessionId('oid'))) ?>"><i class="mdi mdi-account-circle font-size-16 align-middle me-2 text-muted"></i>
                         <span>Profile</span></a>
                         <?php
                         $my_data_cch = getRowById('tbl_orphanage', 'id', sessionId('oid'));
                         if($my_data_cch[0]['head_cch_id'] == 0){
                         ?>
                     <a class="dropdown-item" href="<?= base_url('Childcare_homes/add_child_care_home') ?>"><i class="mdi mdi-wallet font-size-16 align-middle text-muted me-2"></i>
                         <span> Sub CCH List</span></a>
                     <a class="dropdown-item" href="<?= base_url('Childcare_homes/child_care_home') ?>"><i class="mdi mdi-wallet font-size-16 align-middle text-muted me-2"></i>
                         <span>My Sub CCH</span></a>
<?php
}
?>
<div class="dropdown-divider"></div>
                     <a class="dropdown-item text-primary" href="<?= base_url('Childcare_homes/change_password') ?>"> 
                         <span>Change Password</span></a>

                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-primary" href="<?= base_url('admin/Orphane_logout') ?>"><i class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                         <span>Logout</span></a>
                 </div>
             </div>

             <!-- Setting  -->
             <!--<div class="dropdown d-inline-block">-->
             <!--    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">-->
             <!--        <i class="mdi mdi-cog bx-spin"></i>-->
             <!--    </button>-->
             <!--</div>-->

         </div>
     </div>
 </header>