<table id="datatable" class="table table-bordered dt-responsive nowrap" style="
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    ">
    <thead>
        <tr>
        <tr>
            <th>S.N.</th>
            <th>Order Date</th>
            <th>Orphanage Contact details </th>
            <th>View Order details</th>
            <th>Order Status</th>
            <th>Payment Details</th>
            <!-- <th>Delete </th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if (!empty($checkout)) {
            foreach ($checkout as $row) {
                $orphane =  $this->CommonModal->getRowById('tbl_orphanage', 'id',  $row['orphane_id']);
        ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td style="word-wrap: break-word;"><?php echo convertDatedmy($row['create_date']); ?>

                    </td>
                    <td style="word-wrap: break-word;">
                        <?php echo $row['name']; ?><?= $orphane[0]['name']; ?><br>Cont. - <?= $orphane[0]['number']; ?><br>Add. - <?php echo $orphane[0]['address']; ?>
                    </td>
                    <td><a href="<?php echo base_url() . 'Merchant/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger edit"><i class="fas fa-eye"></i></a></td>
                    <td>

                        <!-- Modal -->
                        <div class="modal fade bs-example-modal-center<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Update status
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('Merchant/statusupdate') ?>" method="POST">
                                        <div class="modal-body">

                                            <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                            <select name="status" class="form-control">
                                                <option value="0">New</option>
                                                <option value="1">On-working</option>

                                                <option value="2">Delivered</option>
                                                <!-- <option value="3">Completed</option> -->
                                                <!--<option value="">On-working</option>-->
                                            </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?= $i ?>" class="btn btn-<?= (($row['status'] == 0) ? 'info' : (($row['status'] == 1) ? 'warning' : (($row['status'] == 2) ? 'danger' : (($row['status'] == 3) ? 'success' : (($row['status'] == 4) ? 'warning' : 'secondary'))))) ?>"> <?= (($row['status'] == 0) ? 'New order' : (($row['status'] == 1) ? 'On the way' : (($row['status'] == 2) ? 'Cancelled' : (($row['status'] == 3) ? 'Order completed' : (($row['status'] == 4) ? 'cancel requested' : ''))))) ?>
                        </button>

                    </td>
                    <td><?php echo (($row['razorpay_payment_id'] == '') ? '<a href="#" class="btn btn-warning">Payment Pending</a> ' : $row['razorpay_payment_id']); ?></td>
                    <!-- <td><a href="<?php echo base_url() . 'Merchant/orderdelete/' . $row['id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></a></td> -->


                </tr>

        <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url() ?>assets/admin/js/pages/datatables.init.js"></script>