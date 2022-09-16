<?php
if (!empty($orderDetails)) {
    foreach ($orderDetails as $checkrow) {
        $orphane = getSingleRowById('tbl_orphanage', array('id' => $checkrow['cch_id']));
        $occ = getSingleRowById('tbl_occassion', array('occ_id' => $checkrow['occasion']));
        $budget = getSingleRowById('tbl_budget', array('budget_id' => $checkrow['budget']));
?>
        <div class=" col-md-6 p-4 ">
            <div class="inventory-list-item row  ">
                <div class="inventory-list-content  ">
                    <div class="inv-content-top">
                        <ul>
                            <li class="option">
                                <p class="mr-5"><b><?= $checkrow['create_date'] ?></b> <br>
                                    <a class="badge btn-<?= (($checkrow['status'] == 0) ? 'primary ' : (($checkrow['status'] == '1') ? 'success' : (($checkrow['status'] == '2') ? 'danger' : 'info'))) ?>" href="#"><?= (($checkrow['status'] == 0) ? 'NEW ' : (($checkrow['status'] == '1') ? ' ACCEPTED' : (($checkrow['status'] == '2') ? ' DECLINED' : 'UNKNOWN'))) ?></a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <h4><a href="#"><?= (($orphane == '') ? '' : $orphane['name']); ?></a></h4>
                    <h6>Occasion: <?= (($occ == '') ? '' : $occ['occ_name']); ?><br>
                        Budget: <?= (($budget == '') ? '' : $budget['budget_name']); ?></h6>
                    <ul>
                        <li class="price"><b>
                                &nbsp; Min Advance: ₹ <?= $checkrow['amount'] ?><span> /-</span><BR>Transaction ID: <?= (($checkrow['payment_id'] == '') ? 'Not Paid' : $checkrow['payment_id']) ?>
                            </b>
                        </li>
                    </ul>
                    <div class="">
                        <div class="">
                            <details>
                                <summary> Share how you want to do it </summary>
                                <div class="content">
                                    <?= (($checkrow['how_want_to_do'] == '') ? 'Not Feed' : $checkrow['how_want_to_do']) ?>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo '<h4>No Result Found.</h4>';
}
?>