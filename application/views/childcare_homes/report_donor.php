<!doctype html>
<html lang="en">
<?php $this->load->view('admin/template/header_link'); ?>


<body data-topbar="colored">
    <div id="layout-wrapper">
        <?php $this->load->view('childcare_homes/template/header'); ?>
        <?php $this->load->view('childcare_homes/template/menu'); ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid ">
                    <div class="page-title-box">
                        <div class="row ">
                            <div class="col-md-4">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <label>From</label>
                                    <input type="date" id="fromdate" class="form-control" />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <label>To</label>
                                    <input type="date" id="todate" class="form-control" />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <br>
                                    <input type="button" id="checkreport" class="btn btn-primary" value="Get report" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    ">
                                            <thead>
                                                <tr>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Mail id</th> 
                                                    <th>View Order details</th>
                                                    <th>Order Status</th>
                                                    <!--<th> </th>-->

                                                </tr>
                                            </thead>
                                            <tbody id="rowdata">
                                                <?php
                                                $i = 1;
                                                if (!empty($donation)) {
                                                    foreach ($donation as $row) {
                                                         $user =  $this->CommonModal->getRowById('tbl_user', 'uid',  $row['user_id']);
                                                ?>

                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td style="word-wrap: break-word;"><?php echo convertDatedmy($row['create_date']); ?>

                                                            </td>
                                                            <td style="word-wrap: break-word;">
                                                            <?= (($user != '') ? $user[0]['name'] : 'Contribution  Anonymously') ?>
                                                            </td>
                                                            <td style="word-wrap: break-word;">
                                                            <?= (($user != '') ? $user[0]['email'] : 'Contribution  Anonymously') ?>
                                                            </td>
                                                            
                                                            <td><a href="<?php echo base_url() . 'childcare_homes/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger edit"><i class="fas fa-eye"></i></a></td>
                                                            <td>
                                                                <?php


                                                                if ($row['chechout_status'] == 0) {
                                                                ?>

                                                                    <p class="text-warning"><b>New Contribution </b></p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 3) {
                                                                ?>
                                                                    <p class="text-warning"><b>Packing on process</b></p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 4) {
                                                                ?>
                                                                    <p class="text-primary"><b>Stock unavailable</b></p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 5) {
                                                                ?>
                                                                    
                                                                    <p class="text-warning">Confirmation required</p>
                                                                <?php
                                                                } elseif ($row['chechout_status'] == 6) {
                                                                ?>
                                                                    <p class="text-success"><b>Delivered</b></p>
                                                                <?php
                                                                }

                                                                ?>
                                                            </td>
                                                            <!--<td>-->
                                                            <!--</td>-->

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
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- container-scroller -->
                    <?php $this->load->view('admin/template/footer_link'); ?>
                    <script>
                        $(document).on('click', '#checkreport', function() {
                            var fromdate = $('#fromdate').val();
                            var todate = $('#todate').val();
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url('Childcare_homes/donor_report') ?>",
                                data: {
                                    fromdate: fromdate,
                                    todate: todate
                                },
                                beforeSend: function() {
                                    $(this).text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                                },
                                success: function(response) { 
                                    console.log(response);
                                    $('#rowdata').html(response);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
</body>

</html>