<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('merchant/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to <?= sessionId('m_name'); ?> Dashboard</li>
                                    </ol>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Start page content-wrapper -->
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-info mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">

                                            <div class="text-white">
                                                <h5 class="text-uppercase font-size-16 text-white-50">Total Order</h5>

                                                <h3 class="mb-3 text-white">

                                                </h3>

                                            </div>
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-cube-outline display-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-info mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">

                                            <div class="text-white">
                                                <h5 class="text-uppercase font-size-16 text-white-50">New Orders</h5>

                                                <h3 class="mb-3 text-white">

                                                </h3>

                                            </div>
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-buffer display-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>