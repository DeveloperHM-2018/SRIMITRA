<header id="page-topbar" class="bg-warning">
    <div class="navbar-header">
        <div class="d-flex">
            <!--            
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
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt=" height=" 22" />
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="65" />
                    </span>
                </a>
            </div> -->

            <span class="logo-sm" style="background-color: white;">
                <img src="<?= base_url() ?>assets/admin/images/logo.png" alt="srimitra" height="48" />
            </span>


        </div>

        <div class="d-flex">



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/user.png" alt="Header Avatar" /> <br>Welcome <?= sessionId('name') ?>

                </button>

                <div class="dropdown-menu dropdown-menu-end">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-primary" href="<?= base_url('admin/Orphane_logout') ?>"><i class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                        <span>Logout</span></a>
                </div>
            </div>


        </div>
    </div>
</header>