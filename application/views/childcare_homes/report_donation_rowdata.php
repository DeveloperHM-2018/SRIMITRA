<?php
$i = 1;
if (!empty($donation)) {
    foreach ($donation as $row) {
        $merchant =  $this->CommonModal->getRowById('tbl_merchant_registration', 'id',  $row['merchant_id']);
        $user =  $this->CommonModal->getRowById('tbl_user', 'uid',  $row['user_id']);
?>

        <tr>
            <td><?php echo $i; ?></td>
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
                            <p class="text-warning"><b>Certificate not uploaded</b></p>

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