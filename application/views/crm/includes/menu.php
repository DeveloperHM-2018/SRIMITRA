<div class="aside">
    <div class="aside-header">
        <h3 class="aside-title"><?= $projectTitle ?></h3>
        <div class="aside-addon"><button class="btn btn-label-primary btn-icon btn-lg" data-toggle="aside"><i class="fa fa-times aside-icon-minimize"></i> <i class="fa fa-thumbtack aside-icon-maximize"></i></button></div>
    </div>
    <div class="aside-body" data-simplebar="data-simplebar">
        <div class="menu">
            <div class="menu-item"><a href="<?= base_url('CrmDashboard'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text">Dashboard</span>
                    <!-- <div class="menu-item-addon"><span class="badge badge-success">New</span></div> -->
                </a></div>
            <?php
            if (sessionId('user_type') == '0') {
            ?>
                <div class="menu-item">
                    <a href="<?= base_url('CrmDashboard/new_followup'); ?>" data-menu-path="<?= base_url('CrmDashboard/new_followup'); ?>" class="menu-item-link">
                        <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text">Add Followup</span>
                    </a>
                </div>
            <?php
            }
            ?>


            <div class="menu-item"><a href="<?= base_url('CrmDashboard/followup_list'); ?>" data-menu-path="<?= base_url('CrmDashboard/followup_list'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text">Followup History</span>
                </a>
            </div>

            <div class="menu-item"><a href="<?= base_url('CrmDashboard/new_donor'); ?>" data-menu-path="<?= base_url('CrmDashboard/new_donor'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text"> Add Donor</span>
                </a>


            </div>

            <?php
            if (sessionId('user_type') == '1') {
            ?>

            <div class="menu-item"><a href="<?= base_url('CrmDashboard/donors_list'); ?>" data-menu-path="<?= base_url('CrmDashboard/donors_list'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text"> Assign Leads</span>
                </a>
            </div>
            <?php
            }
            ?>
            <div class="menu-item"><a href="<?= base_url('CrmDashboard/donor_list'); ?>" data-menu-path="<?= base_url('CrmDashboard/donor_list'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text"> All Leads</span>
                </a>
            </div>


            <div class="menu-item"><a href="<?= base_url('CrmDashboard/whatsapp_msg'); ?>" data-menu-path="<?= base_url('CrmDashboard/whatsapp_msg'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text"> Send whatsapp msg</span>
                </a></div>
                <div class="menu-item"><a href="<?= base_url('CrmDashboard/templates'); ?>" data-menu-path="<?= base_url('CrmDashboard/templates'); ?>" class="menu-item-link">
                    <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text"> Add templates</span>
                </a></div>

            <?php
            if (sessionId('user_type') == '1') {
            ?>

                <div class="menu-item"><button class="menu-item-link menu-item-toggle">
                        <div class="menu-item-icon"><i class="fa fa-desktop"></i></div><span class="menu-item-text">Employee</span>
                        <div class="menu-item-addon"><i class="menu-item-caret caret"></i></div>
                    </button>
                    <div class="menu-submenu">
                        <div class="menu-item"><a href="<?= base_url('CrmDashboard/new_employee'); ?>" data-menu-path="<?= base_url('CrmDashboard/new_employee'); ?>" class="menu-item-link"><i class="menu-item-bullet"></i> <span class="menu-item-text">Add Employee</span></a></div>
                        <div class="menu-item"><a href="<?= base_url('CrmDashboard/employee_list'); ?>" data-menu-path="<?= base_url('CrmDashboard/employee_list'); ?>" class="menu-item-link"><i class="menu-item-bullet"></i> <span class="menu-item-text">Employee list</span></a></div>
                    </div>
                </div>



            <?php
            }
            ?>




        </div>
    </div>
</div>