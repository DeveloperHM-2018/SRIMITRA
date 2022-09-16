<?php

                                                $i = 1;
                                                if ($products  != '') {
                                                    foreach ($products as $fetchrow) {

                                                        $product = getSingleRowById('products', 'product_id', $fetchrow['product']);
                                                        if ($product) {
                                                            $cat = getRowById('category', 'category_id', $product['category_id']);
                                                            $subcat = getRowById('sub_category', 'sub_category_id', $product['subcategory_id']);
                                                ?>
                                                            <tr>
                                                                <td><?php echo $fetchrow['product_id']; ?></td>
                                                                <td>
                                                                    <?php echo wordwrap($fetchrow['pro_name'], 10, '<br>'); ?></td>
                                                                <td>
                                                                    <?= $cat[0]['cat_name']; ?></td>

                                                                <td><?= $subcat[0]['subcat_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $fetchrow['quantity']; ?>/<?= $fetchrow['quantity_type'] ?>
                                                                </td>
                                                                <td>
                                                                    0
                                                                </td>
                                                            </tr>
                                                <?php
                                                            $i++;
                                                        }
                                                    }
                                                }
                                                ?>