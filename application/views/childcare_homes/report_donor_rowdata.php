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