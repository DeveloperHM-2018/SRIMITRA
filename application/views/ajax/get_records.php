<?php
$i = 1;
if ($checkout  != '') {
    foreach ($checkout as $check) {
        $check_pro = getRowById('checkout_product', 'checkoutid', $check['id']);
        $cch = getSingleRowById('tbl_orphanage', array('id' => $check['orphane_id']));
        foreach ($check_pro as $pro) {
            
            $merchant_products = getSingleRowById('merchant_products', array('id' => $pro['product_id']));
            $products = getSingleRowById('products', array('product_id' => $merchant_products['product_id']));
?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?= $check['create_date_only'] ?></td>
                <td><?= $cch['name']; ?></td>
                <td><?= $merchant_products['product_name']; ?><br>(<?= $merchant_products['quantity'] ?> <?= $merchant_products['quantity_type'] ?>)</td>
                <td><?= $pro['product_quantity']; ?></td>
                <td>Rs. <?= $merchant_products['sale_price']; ?></td>
            </tr>
<?php
            $i++;
        }
    }
}
?>