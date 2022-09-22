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
              <div class="col-md-8">
                <div class=" d-flex align-items-center justify-content-between">
                  <div class="page-title">
                    <h4 class="mb-0 font-size-18"> <button type="button" class="badge btn-warning" onclick="history.back();">Back</button> | <?= $title; ?></h4>

                  </div>
                </div>
              </div>
              <div class="col-md-4">
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
            <div class="row">

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

                        <?= (($orderrow['status'] == '2') ?  '<h6>Reason - ' . $orderrow['reason'] . '<h6>' : '') ?>
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

                          <?php
                          if ($orderrow['status'] == '0') {
                          ?>
                            <a href="<?= base_url('childcare_homes/edit_order_request/' . encryptId($orderrow['oid'])) ?>">
                              <button class="btn btn-success float-right mt-1 ml-1" type="button">
                                <i class="fa fa-edit"></i> Edit
                              </button>
                            </a>
                          <?php
                          }
                          ?>


                        </p>
                        <div class="collapse  " id="collapseExample<?= $orderrow['oid']; ?>">
                          <div class="card card-body mb-0 p-0">
                            <table class="table mb-0">

                              <thead class="table-light">
                                <tr>
                                  <th>#</th>
                                  <th>Product</th>
                                  <th>Qty.</th>
                                  <th>Total req.</th>
                                   
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
                          </div>
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
                  $order = getRowByMoreId('tbl_orphange_order', array('orphan_id' => $cchrow['id'], 'status' => $status));
                  if ($order != '') {
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

            </div>
            <!-- end row -->
          </div>
        </div>
        <!-- container-scroller -->
        <?php $this->load->view('admin/template/footer_link'); ?>
        <script>
          $('#find_rashu').click(function() {
            getdata_rashu();
          });
          getdata_rashu();

          function getdata_rashu() {
            var filter_status = $('#filter_status').val();
            $.ajax({
              url: "<?= base_url('childcare_homes/fetchorder') ?>",
              method: "POST",
              data: {
                filter_status: filter_status
              },
              success: function(data) {
                console.log(data);
                $('#datas').html(data);
              }
            });

          }
        </script>
      </div>
    </div>
  </div>
</body>

</html>