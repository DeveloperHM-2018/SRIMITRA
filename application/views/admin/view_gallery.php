<!doctype html>
<html lang="en">


<?php $this->load->view('admin/template/header_link'); ?>

<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('admin/template/header'); ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid ">
                    <div class="page-title-box">
                        <div class="row ">
                            <div class="col-md-10">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('admin_Dashboard/add_gallery') ?>" class="btn btn-light">Add <?= $title ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
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
                                                    <th>Image</th>
                                                    <th>Title</th>

                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($gallery  != '') {
                                                    foreach ($gallery as $fetchrow) {



                                                ?>

                                                        <tr>
                                                            <td><?php echo $i; ?></td>

                                                            <td>
                                                                <?php
                                                                if ($fetchrow['image'] != '' && $fetchrow['image'] != 0) {
                                                                ?>
                                                                    <img src="<?php echo base_url();  ?>uploads/gallery/<?= $fetchrow['image']; ?>" style="width: 50px;height: 50px;" />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                <?php
                                                                }
                                                                ?>

                                                            </td>

                                                            <td>
                                                                <?= $fetchrow['tittle']; ?>
                                                            </td>


                                                            <td>

                                                                <!--<a href="<?php echo base_url() . 'admin_Dashboard/edit_gallery/' . $fetchrow['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i></a>-->

                                                                <a href="<?php echo base_url() . 'admin_Dashboard/deletegallery/' . $fetchrow['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-primary delete"><i class="fas fa-trash-alt"></i></a>

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
                        </section>
                    </div>
                    <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>