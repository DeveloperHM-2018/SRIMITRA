<!doctype html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | Add <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Add New budget</h4>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label class="">budget title</label>
                                                            <input type="text" class="form-control" name="budget_name">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <br>
                                                            <button class="btn  btn-primary " type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <?php if ($msg = $this->session->flashdata('msg')) :
                                            $msg_class = $this->session->flashdata('msg_class') ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                                </div>
                                            </div>
                                        <?php
                                            $this->session->unset_userdata('msg');
                                        endif; ?>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                                border-collapse: collapse;
                                                border-spacing: 0;
                                                width: 100%;
                                                ">
                                            <thead>
                                                <tr>
                                                    <th>S No</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($budget  != '') {
                                                    foreach ($budget as $fetchrow) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                                <?= $fetchrow['budget_name']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url() . 'admin_Dashboard/deletebudget/' . $fetchrow['budget_id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-primary delete"><i class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>

                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>