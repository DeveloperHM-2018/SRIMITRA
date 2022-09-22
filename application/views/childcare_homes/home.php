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
              <div class="col-md-10">
                <div class=" d-flex align-items-center justify-content-between">
                  <div class="page-title">
                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="page-content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4>Contribution  Peek</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    ">
                      <thead>
                        <tr>
                        <tr>
                          <th>Order ID</th>
                          <th>Order Date</th>
                          <th>Merchant details </th>
                          <th>User details </th>
                          <th>View Order details</th>
                          <th>Order Status</th>
                          <!--<th> </th>-->

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        if (!empty($checkout)) {
                          foreach ($checkout as $row) {
                            $merchant =  $this->CommonModal->getRowById('tbl_merchant_registration', 'id',  $row['merchant_id']);
                            $user =  $this->CommonModal->getRowById('tbl_user', 'uid',  $row['user_id']);
                        ?>

                            <tr>
                              <td><?= str_replace('-', '', $row['create_date_only']) . $row['id'] ?></td>
                              <td style="word-wrap: break-word;"><?php echo convertDatedmy($row['create_date']); ?>

                              </td>
                              <td style="word-wrap: break-word;">
                                <?= $merchant[0]['shop_name']; ?><br>Add. - <?php echo $merchant[0]['address']; ?>
                              </td>
                              <td style="word-wrap: break-word;">
                                <?= (($user != '') ? $user[0]['name'] : 'Contribution  Anonymously') ?>
                                <br>
                                <?php

                                if ($row['status'] == '1' && ($user != '')) {
                                  if ($row['chechout_status'] == 6) {
                                    if ($row['certificate'] == '') {

                                ?>
                                      <div class="modal fade bs-example-modal-center<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">
                                                Upload Certificate
                                              </h5>
                                              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                              <!-- <span aria-hidden="true">&times;</span> -->
                                              <!-- </button> -->
                                            </div>
                                            <form action="<?= base_url('childcare_homes/uploadcertificate') ?>" method="POST" enctype="multipart/form-data">
                                              <div class="modal-body">

                                                <input type="hidden" name="checkout_id" value="<?= $row['id'] ?>" required />

                                                <label>Upload file</label>
                                                <input type="file" class="form-control" name="cert" required accept="image/*,.pdf" />
                                                <br>



                                              </div>
                                              <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss=".modal">Close</button> -->
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-info">
                                        Upload Tax benefit certificate
                                      </button>
                                    <?php
                                    } else {

                                    ?>
                                      <a href="<?= base_url('uploads/certificate/' . $row['certificate']) ?>" target="_blank">
                                        View Tax benefit certificate
                                        </button>
                                  <?php
                                    }
                                  }
                                }
                                  ?>
                              </td>
                              <td><a href="<?php echo base_url() . 'childcare_homes/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger edit"><i class="fas fa-eye"></i></a></td>
                              <td>
                                <?php 
                                if ($row['status'] == '1') {
                                  if ($row['chechout_status'] == 0) {
                                ?>

                                  <?php
                                  } elseif ($row['chechout_status'] == 3) {
                                  ?>
<p class="text-success">PACKING</p>
                                  <?php
                                  } elseif ($row['chechout_status'] == 4) {
                                  ?>
<p class="text-success">RESTOCKING</p>
                                  <?php
                                  } elseif ($row['chechout_status'] == 5) {
                                  ?>
                                    <button class="btn btn-success status delivered<?= $row['id']; ?> status<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-status="delivered">
                                      Delivered </button>
                                    <p class="deliveredmsg<?= $row['id']; ?>" style="display:none">Delivered</p>
                                    <br>
                                    <p class="deliveredmsgs<?= $row['id']; ?>">Confirmation required</p>
                                  <?php
                                  } elseif ($row['chechout_status'] == 6) {
                                  ?>
                                    <p  class="text-success">Completed</p>
                                <?php
                                  }
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

            <div class="row">
              <h4>Order Request History</h4>
              <?php
              if (!empty($order)) {
                foreach ($order as $orderrow) {
                  $count = getNumRows('tbl_orphange_order_product', array('o_id' => $orderrow['oid']));
                  $data_cch = getRowById('tbl_orphanage', 'id', $orderrow['orphan_id']);
              ?>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Request ID #<?= $orderrow['timestamp']; ?></h4>
                        <h6>Status - <?= (($orderrow['status'] == '0') ? 'New request' : (($orderrow['status'] == '1') ? 'Accepted' : (($orderrow['status'] == '2') ? 'Rejected' : ''))) ?> </h6>
                        <h6>Requested by - <?= $data_cch[0]['name']; ?></h6>
                        <p class="card-title-desc mb-3">
                          Date - <?= convertDatedmy($orderrow['create_date']); ?>
                          <!--  
                                                Status - <span class="badge badge-<?= (($orderrow['status'] == '0') ? 'primary' : (($orderrow['status'] == '1') ? 'success' : (($orderrow['status'] == '2') ? 'danger' : ''))) ?>"><?= (($orderrow['status'] == '0') ? 'NEW' : (($orderrow['status'] == '1') ? 'ACCEPTED' : (($orderrow['status'] == '2') ? 'REJECTED' : ''))) ?></span> -->
                        </p>
                        <p>
                          <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $orderrow['oid']; ?>" aria-expanded="false" aria-controls="collapseExample<?= $orderrow['oid']; ?>">
                            View products (<?= $count ?>)
                          </button>
                          <a href="<?= base_url('childcare_homes/edit_order_request/' . encryptId($orderrow['oid'])) ?>">
                            <?php
                            if ($orderrow['status'] == '0') {
                            ?>
                              <button class="btn btn-success float-right mt-1 ml-1" type="button">
                                <i class="fa fa-edit"></i> Edit
                              </button>

                            <?php
                            }
                            ?>

                          </a>
                        </p>
                        <div class="collapse  " id="collapseExample<?= $orderrow['oid']; ?>">
                          <div class="card card-body mb-0 p-0">
                            <table class="table mb-0">

                              <thead class="table-light">
                                <tr>
                                  <th>#</th>
                                  <th>Product</th>
                                  <th>Qty.</th>
                                  <th>Total Req.</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $j = 1;
                                $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['oid']);
                                if (!empty($data)) {
                                    foreach ($data as $datarow) {
                                        $merchant = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                        $product = getSingleRowById('products', array('product_id' => $merchant['product_id']));
                                ?>
                                        <tr>
                                            <th scope="row"><?= $j ?></th>
                                            <td><?= $product['pro_name']; ?><br>(<?= $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?>)</td>
                                            <td><?= $datarow['quantity']; ?></td>
                                            <td><?= $datarow['quantity']* $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?></td>

                                        </tr>
                                <?php
                                        $j++;
                                    }
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>`
                        </div>

                      </div>
                      <!-- End Cardbody -->
                    </div>
                    <!-- End Card -->
                  </div>
              <?php

                }
              } else {
                // echo '<p style="color:white;"><i>No Data available</i></p>';
              }
              ?>

              <?php
              if (!empty($all_orphanage)) {
                foreach ($all_orphanage as $cchrow) {
                  $order = getRowByMoreId('tbl_orphange_order', array('orphan_id' => $cchrow['id'], 'status' => '0'));
                  if (!empty($order)) {
                    foreach ($order as $orderrow) {
                      $count = getNumRows('tbl_orphange_order_product', array('o_id' => $orderrow['oid']));
                      $data_cch = getRowById('tbl_orphanage', 'id', $orderrow['orphan_id']);
              ?>
                      <div class="col-lg-4">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Request ID #<?= $orderrow['timestamp']; ?></h4>
                            <h6>Status - <?= (($orderrow['status'] == '0') ? 'New request' : (($orderrow['status'] == '1') ? 'Accepted' : (($orderrow['status'] == '2') ? 'Rejected' : ''))) ?> </h6>
                            <h6>Requested by - <?= $data_cch[0]['name']; ?></h6>
                            <p class="card-title-desc mb-3">
                              Date - <?= convertDatedmy($orderrow['create_date']); ?>
                              <!--  
                                                Status - <span class="badge badge-<?= (($orderrow['status'] == '0') ? 'primary' : (($orderrow['status'] == '1') ? 'success' : (($orderrow['status'] == '2') ? 'danger' : ''))) ?>"><?= (($orderrow['status'] == '0') ? 'NEW' : (($orderrow['status'] == '1') ? 'ACCEPTED' : (($orderrow['status'] == '2') ? 'REJECTED' : ''))) ?></span> -->
                            </p>
                            <p>
                              <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $orderrow['oid']; ?>" aria-expanded="false" aria-controls="collapseExample<?= $orderrow['oid']; ?>">
                                View products (<?= $count ?>)
                              </button>
                              <a href="<?= base_url('childcare_homes/edit_order_request/' . encryptId($orderrow['oid'])) ?>">
                                <?php
                                if ($orderrow['status'] == '0') {
                                ?>
                                  <button class="btn btn-success float-right mt-1 ml-1" type="button">
                                    <i class="fa fa-edit"></i> Edit
                                  </button>

                                <?php
                                }
                                ?>

                              </a>
                            </p>
                            <div class="collapse  " id="collapseExample<?= $orderrow['oid']; ?>">
                              <div class="card card-body mb-0 p-0">
                                <table class="table mb-0">

                                  <thead class="table-light">
                                    <tr>
                                      <th>#</th>
                                      <th>Product</th>
                                      <th>Qty.</th>
                                      <th>Qty. Type</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $i = 1;
                                    $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['oid']);
                                    if (!empty($data)) {
                                      foreach ($data as $datarow) {
                                        $data = getSingleRowById('products', array('product_id' => $datarow['product']));
                                    ?>
                                        <tr>
                                          <th scope="row"><?= $i ?></th>
                                          <td><?= $data['pro_name']; ?></td>
                                          <td><?= $datarow['quantity']; ?></td>
                                          <td><?= $data['quantity_type']; ?></td>

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
                          <!-- End Cardbody -->
                        </div>
                        <!-- End Card -->
                      </div>
              <?php

                    }
                  }
                }
              } else {
                // echo '<p style="color:white;"><i>No Data available</i></p>';
              }
              ?>

              <?php

              // if (!empty($request)) {
              //   $i = 1;
              //   foreach ($request as $orderrow) {

              //     $count = getNumRows('order_request_template_product', array('ort_id' => $orderrow['ortid']));
              ?>
                  <!-- <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Request ID #<?= $orderrow['timestamp']; ?></h4>
                         
                        <h6>Request by - Admin</h6>
                        <h6>Title - <?= $orderrow['product_title']; ?></h6>
                        
                        <p>
                          <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $orderrow['ortid']; ?>" aria-expanded="false" aria-controls="collapseExample<?= $orderrow['ortid']; ?>">
                            View products (<?= $count ?>)
                          </button>
                           
                        </p>
                        <div class="collapse  " id="collapseExample<?= $orderrow['ortid']; ?>">
                          <div class="card card-body mb-0 p-0">
                            <table class="table mb-0">

                              <thead class="table-light">
                                <tr>
                                  <th>#</th>
                                  <th>Product</th>
                                  <th>Qty.</th>
                                  <th>Qty. Type</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                // $i = 1;
                                // $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['ortid']);
                                // if (!empty($data)) {
                                //   foreach ($data as $datarow) {
                                //     $data = getSingleRowById('products', array('product_id' => $datarow['product']));
                                ?>
                                    <tr>
                                      <th scope="row"><?= $i ?></th>
                                      <td><?= $data['pro_name']; ?></td>
                                      <td><?= $datarow['quantity']; ?></td>
                                      <td><?= $data['quantity_type']; ?></td>

                                    </tr>
                                <?php
                                //     $i++;
                                //   }
                                // }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>

                      </div>
                      
                    </div>
                    
                  </div> -->
              <?php
              //     $i++;
              //   }
              // }
              ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">

                    <div class="row">
                      <div class="col-xl-2 col-md-2 col-6">

                        <div class="card bg-primary mini-stat position-relative">
                          <a href="<?= base_url('Childcare_homes/order_request') ?>" class="waves-effect">
                            <div class="card-body">
                              <div class="mini-stat-desc">
                                <div class="text-white">
                                  <h5 class="text-uppercase font-size-12 text-white-50">New <br>request</h5>
                                  <h3 class="mb-3 text-white">
                                    <?= $new ?>
                                  </h3>
                                </div>
                                <div class="mini-stat-icon">
                                  <!-- <i class="mdi mdi-buffer display-2"></i>  -->
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>

                      </div>
                      <div class="col-xl-2 col-md-2 col-6">

                        <div class="card bg-primary mini-stat position-relative">
                          <a href="<?= base_url('Childcare_homes/accepted_order_request') ?>" class="waves-effect">
                            <div class="card-body">
                              <div class="mini-stat-desc">
                                <div class="text-white">
                                  <h5 class="text-uppercase font-size-12 text-white-50">Accepted by admin</h5>
                                  <h3 class="mb-3 text-white">
                                    <?= $accepted ?>
                                  </h3>
                                </div>
                                <div class="mini-stat-icon">
                                  <!-- <i class="mdi mdi-buffer display-2"></i>  -->
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>

                      </div>
                      <div class="col-xl-2 col-md-2 col-6">

                        <div class="card bg-primary mini-stat position-relative">
                          <a href="<?= base_url('Childcare_homes/rejected_order_request') ?>" class="waves-effect">
                            <div class="card-body">
                              <div class="mini-stat-desc">
                                <div class="text-white">
                                  <h5 class="text-uppercase font-size-12 text-white-50">Rejected by admin</h5>
                                  <h3 class="mb-3 text-white">
                                    <?= $rejected ?>
                                  </h3>
                                </div>
                                <div class="mini-stat-icon">
                                  <!-- <i class="mdi mdi-buffer display-2"></i>  -->
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>

                      </div>

                      <div class="col-xl-2 col-md-2 col-6">
                        <div class="card bg-primary mini-stat position-relative">
                          <a href="<?= base_url('Childcare_homes/donation') ?>" class="waves-effect">
                            <div class="card-body">

                              <div class="mini-stat-desc">
                                <div class="text-white">
                                  <h5 class="text-uppercase font-size-12 text-white-50"> All <br>Contribution </h5>
                                  <h3 class="mb-3 text-white">
                                    <?= $order_acc ?>
                                  </h3>
                                </div>
                                <!--<div class="mini-stat-icon">-->
                                <!--  <i class="mdi mdi-cube-outline display-2"></i>-->
                                <!--</div>-->
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xl-2 col-md-2 col-6">
                        <div class="card bg-primary mini-stat position-relative">
                          <a href="<?= base_url('Childcare_homes/donation') ?>" class="waves-effect">
                            <div class="card-body">
                              <div class="mini-stat-desc">
                                <div class="text-white">
                                  <h5 class="text-uppercase font-size-12 text-white-50">Accepted By Merchant</h5>
                                  <h3 class="mb-3 text-white">
                                      <?= $rashu ?>
                                  </h3>
                                </div>
                                <!--<div class="mini-stat-icon">-->
                                <!--  <i class="mdi mdi-buffer display-2"></i>-->
                                <!--</div>-->
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>

                      <div class="col-xl-2 col-md-2 col-6">
                        <div class="card bg-primary mini-stat position-relative">
                          <a href="<?= base_url('Childcare_homes/confirmed_donation') ?>" class="waves-effect">
                            <div class="card-body">
                              <div class="mini-stat-desc">

                                <div class="text-white">
                                  <h5 class="text-uppercase font-size-12 text-white-50">Completed Contribution </h5>

                                  <h3 class="mb-3 text-white">
                                    <?= $completed ?>
                                  </h3>

                                </div>
                                <!--<div class="mini-stat-icon">-->
                                <!--  <i class="mdi mdi-buffer display-2"></i>-->
                                <!--</div>-->
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- container-scroller -->
          <?php $this->load->view('admin/template/footer_link'); ?>

        </div>
      </div>
    </div>
</body>
<script>
                    
                    $(document).on('click', '.status', function(){
                        // $('.status').click(function() {
                            var id = $(this).data('id');
                            var status = $(this).data('status');
                            var msg = confirm('Are you sure ?');
                            if (msg) {
                                $.ajax({
                                    method: "POST",
                                    url: "<?= base_url('Ajax/cchdonationrequestStatus') ?>",
                                    data: {
                                        id: id,
                                        status: status
                                    },
                                    beforeSend: function() {
                                        $(this).text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        if (response == '0') {
                                            $('.delivered' + id).hide();
                                            $('.deliveredmsg' + id).show();
                                            $('.deliveredmsgs' + id).hide();
                                        } else {
                                            alert('Server Error');
                                        }
                                    }
                                });
                            }

                        });
                    </script>
</html>