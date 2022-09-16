<?php
if (!empty($orderDetails)) {
    foreach ($orderDetails as $checkrow) {
        $orphane = getRowByMoreId('tbl_orphanage', array('id' => $checkrow['orphane_id']))[0];
        $products = getRowByMoreId('checkout_product', array('checkoutid' => $checkrow['id']));
        

?>
        <div class="inventory-list-item row blue-box">

            <div class="inventory-list-content">

                <div class="row">
                   <div class="col-sm-8"><h4> <?= $orphane['name'] ?> </h4>
                    <p>Order ID: <?= str_replace('-', '', $checkrow['create_date_only']) . $checkrow['id'] ?> <br>
                            <?php if ($checkrow['status'] == 1) {
                            ?>
                                 <!--<img src="<?= base_url() ?>assets/img/check.png" style="width:50px;" /> -->
                            <?php
                            } ?>
                             Amount: &nbsp; ₹ <?= $checkrow['totalamount'] ?><span> /-</span></p></div>
                       <div class="col-sm-4 text-right">
                            <p class="mr-5"><b><?= $checkrow['create_date_only'] ?></b> <br>
                            <a class="btn btn-warning p-1 " href="#"><?= (($checkrow['chechout_status'] == 0) ? 'NEW ContributION' : (($checkrow['chechout_status'] == '1') ? 'ContributION CONFIRMED' : (($checkrow['chechout_status'] == '2') ? 'ContributION CANCELLED' : (($checkrow['chechout_status'] == '3' || $checkrow['chechout_status'] == '4') ? 'ContributION IN-PROCESS' : (($checkrow['chechout_status'] == '5') ? 'ContributION DELIVERED' : 'ContributION COMPLETED'))))) ?></a>
                           </p>
                            <?php
                            if ($checkrow['certificate'] != '') {
                            ?>
                                <a href="<?= base_url('uploads/certificate/' . $checkrow['certificate']) ?>" target="_blank">Download certificate</a>
                            <?php
                            }
                            ?>
                       </div>
                       
                        
                    
                </div>

                 

                
                 <details>    <summary>    Product Details </summary>
                        <div class="content">
                            <ol>
                                <?php
                                if (!empty($products)) {
                                    $i = 1;
                                    foreach ($products as $pro) {
                                        $singleproducts = getRowByMoreId('products', array('product_id' => $pro['product_id']   ));
                                        
                                ?>
                                        <li><b> <?= $i . ') ' . $pro['product_name'] ?></b> 
                                        <b>(<?= $pro['product_quantity'] ?> <?= $singleproducts[0]['quantity_type'] ?>) ₹ <?= $pro['product_price'] ?> /-</b></li>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </ol>

                        </div>
                        
                        
                        </details>
                   

            </div>
        </div>
<?php
    }
} else {
    echo '<h4>No Result Found.</h4>';
}
?>
