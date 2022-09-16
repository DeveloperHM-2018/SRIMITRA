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
                                
                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
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
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Message</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                 if($contact != ''){
                                                foreach ($contact as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['create_date']; ?> </td>
                                                        <td><?php echo $row['name']; ?> </td>
                                                        <td><?php echo $row['email']; ?> </td>
                                                        <td><?php echo $row['contact']; ?> </td>
                                                        <td><?php echo $row['message']; ?> </td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/deletecontact/' . $row['id']; ?>" class="btn btn-primary delete" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
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
                        <!--END PAGE CONTENT -->
                    </div>

                    <?php include 'template/footer_link.php'; ?>


</body>

</html>