<div class="header">
    <div class="header-holder header-holder-desktop sticky-header" id="sticky-header-desktop">
        <div class="header-container container-fluid">
            <div class="header-wrap">
                <ul class="nav nav-pills">

                </ul>
            </div>
            <div class="header-wrap header-wrap-block">
                <!-- <div class="input-group-icon input-group-lg widget15-compact">
                    <div class="input-group-prepend"><i class="fa fa-search text-primary"></i></div><input type="text" class="form-control" placeholder="Type to search...">
                </div> -->
            </div>
            <div class="header-wrap">
                <div class="dropdown ml-2"><button class="btn btn-flat-primary widget13" data-toggle="dropdown">
                        <div class="widget13-text">Hi <strong><?= $profile[0]['admin_name'] ?></strong></div>
                        <div class="avatar avatar-info widget13-avatar">
                            <div class="avatar-display"><img src="<?= base_url() ?>uploads/profile/<?= $profile[0]['admin_pic'] ?>" alt="Avatar image"></div>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-wide dropdown-menu-right dropdown-menu-animated overflow-hidden py-0">
                        <div class="portlet border-0">
                            <div class="portlet-header bg-primary rounded-0">
                                <div class="rich-list-item w-100 p-0">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-circle">
                                            <div class="avatar-display"><img src="<?= base_url() ?>uploads/profile/<?= $profile[0]['admin_pic'] ?>" alt="Avatar image"></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h3 class="rich-list-title text-white"><?= $profile[0]['admin_name'] ?></h3><span class="rich-list-subtitle text-white"><?= $profile[0]['admin_designation'] ?></span>
                                    </div>
                                    <!-- <div class="rich-list-append"><span class="badge badge-warning badge-square badge-lg">9+</span></div> -->
                                </div>
                            </div>
                            <div class="portlet-body p-0">
                                <div class="grid-nav grid-nav-flush grid-nav-action grid-nav-no-rounded">
                                    <div class="grid-nav-row">
                                        <!-- <a href="<?= base_url('CrmDashboard/profile') ?>" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-address-card"></i></div><span class="grid-nav-content">Profile</span>
                                        </a> -->
                                        <!-- <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-calendar-check"></i></div><span class="grid-nav-content">Tasks</span>
                                        </a> -->
                                    </div>

                                </div>
                            </div>
                            <div class="portlet-footer portlet-footer-bordered rounded-0"><a href="<?= base_url('CrmDashboard/change_password') ?>"><button class="btn btn-label-danger">Change Password</button></a></div>
                            <div class="portlet-footer portlet-footer-bordered rounded-0"><a href="<?= base_url('CrmDashboard/logout') ?>"><button class="btn btn-label-danger">Sign out</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title"><?= (($profile[0]['admin_type'] == '0') ? 'Employee Dashboard' : 'Administrator Dashboard') ?></h4><i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <div class="breadcrumb"><a href="<?= base_url() ?>" class="breadcrumb-item">
                        <div class="breadcrumb-icon"><i data-feather="home"></i></div><span class="breadcrumb-text">Dashboard</span>
                    </a></div>
            </div>
            <div class="header-wrap">
                <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-flat-primary active"><input type="radio" name="timeOption" id="timeOption1" checked="checked"> Today</label> <label class="btn btn-flat-primary"><input type="radio" name="timeOption" id="timeOption2"> Week</label> <label class="btn btn-flat-primary"><input type="radio" name="timeOption" id="timeOption3"> Month</label></div><button class="btn btn-label-info btn-icon ml-2" id="fullscreen-trigger" data-toggle="tooltip" title="Toggle fullscreen" data-placement="left"><i class="fa fa-expand fullscreen-icon-expand"></i> <i class="fa fa-compress fullscreen-icon-compress"></i></button> -->
            </div>
        </div>
    </div>
    <div class="header-holder header-holder-mobile sticky-header" id="sticky-header-mobile">
        <div class="header-container container-fluid">
            <div class="header-wrap"><button class="btn btn-flat-primary btn-icon" data-toggle="aside"><i class="fa fa-bars"></i></button></div>
            <div class="header-wrap header-wrap-block justify-content-start px-3">
                <h4 class="header-brand"> <?= $projectTitle ?></h4>
            </div>
            <div class="header-wrap"><button class="btn btn-flat-primary btn-icon" data-toggle="sidemenu" data-target="#sidemenu-todo"><i class="far fa-calendar-alt"></i></button>
                <div class="dropdown ml-2"><button class="btn btn-flat-primary widget13" data-toggle="dropdown">
                        <div class="widget13-text">Hi <strong>User</strong></div>
                        <div class="avatar avatar-info widget13-avatar">
                            <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-wide dropdown-menu-right dropdown-menu-animated overflow-hidden py-0">
                        <div class="portlet border-0">
                            <div class="portlet-header bg-primary rounded-0">
                                <div class="rich-list-item w-100 p-0">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-circle">
                                            <div class="avatar-display"><img src="https://dashboard1.panely-html.blueupcode.com/assets/images/avatar/avatar-4.webp" alt="Avatar image"></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h3 class="rich-list-title text-white">Brielle Williamson</h3><span class="rich-list-subtitle text-white">Software Engineer</span>
                                    </div>
                                    <div class="rich-list-append"><span class="badge badge-warning badge-square badge-lg">9+</span></div>
                                </div>
                            </div>
                            <div class="portlet-body p-0">
                                <div class="grid-nav grid-nav-flush grid-nav-action grid-nav-no-rounded">
                                    <div class="grid-nav-row">
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-sticky-note"></i></div><span class="grid-nav-content">Notes</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="portlet-footer portlet-footer-bordered rounded-0"><button class="btn btn-label-danger">Sign out</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-holder header-holder-mobile">
        <div class="header-container container-fluid">
            <div class="header-wrap header-wrap-block justify-content-start w-100">
                <div class="breadcrumb"><a href="<?= base_url() ?>" class="breadcrumb-item">
                        <div class="breadcrumb-icon"><i data-feather="home"></i></div><span class="breadcrumb-text">Dashboarsdd</span>
                    </a></div>
            </div>
        </div>
    </div>
</div>