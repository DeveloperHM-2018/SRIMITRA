<ul class="row">
    <?php
    $i = 1;
    if (count($this->cart->contents()) > 0) {
        $arr = group_by_array($this->cart->contents(), 'orphane');
        foreach ($arr as $cch_item) :
            $oid = key($arr);
            $orphane = getSingleRowById('tbl_orphanage', array('id' => $oid));
            echo ' <div class="inv-details-title col-md-12">
                                            <div class="review-top-left">
                                                <h5>Cart Items for ' . $orphane['name'] . '</h5>
                                            </div>
                                        </div> ';
            foreach ($cch_item as $items) :
                $img = '';
                // print_R($items);
                if ($items['image'] != '') {
                    if ($items['product_status'] == 1) {
                        if ((file_exists(FCPATH . 'uploads/products/' . $items['image']))) {
                            $img = base_url()  . 'uploads/products/' . $items['image'];
                        } else {
                            $img = base_url('assets/img/1.jpg');
                        }
                    } else {
                        if ((file_exists(FCPATH . 'uploads/ordercover/' . $items['image']))) {
                            $img = base_url() . 'uploads/ordercover/' . $items['image'];
                        } else {
                            $img = base_url('assets/img/1.jpg');
                        }
                    }
                } else {
                    $img = base_url('assets/img/1.jpg');
                }
                $product_data = explode('-', $items['id']);
                if ($items['product_status'] == 0) {
                    $orderproduct = getSingleRowById('tbl_orphange_order_product', array('id' => $product_data[2]));
                    $product = getSingleRowById('merchant_products', array('id' => $orderproduct['product']));
                }
                if ($items['product_status'] == 1) {
                    $product = getSingleRowById('order_request_template', array('ortid' => $product_data[2]));
                }
    ?>
                <li class="col-md-12" id="<?= $items['rowid'] ?>">
                    <div class="single-comment row">
                        <div class="comment-avatar-img col-md-2">
                            <img src="<?= $img ?>" alt="<?php echo $items['name']; ?>" style="height:30px;">
                        </div>
                        <div class="comment-text  col-md-10 ">
                            <div class="comment-avatar-info row">
                                <div class="col-md-3">
                                    <h4><?php echo $items['name']; ?></h4>

                                    <span class="comment-date">
                                        <?php if ($items['product_status'] == 0) { ?>( <?= $product['quantity'] ?> <?= $product['quantity_type'] ?> ) <?php  } else { ?>

                                        <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModalLong<?= $product['ortid'] ?>">
                                            Product Info
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal bd-example-modal-lg fade" id="exampleModalLong<?= $product['ortid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle"><?= $orderrow['product_title']; ?> includes</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body row bg-none pt-3 pb-3">

                                                        <?php
                                                                                                                                                        $j = 1;
                                                                                                                                                        $data = getRowById('order_request_template_product', 'ort_id', $product['ortid']);
                                                                                                                                                        if (!empty($data)) {

                                                                                                                                                            foreach ($data as $datarow) {
                                                                                                                                                                $merchant = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                        ?>
                                                                <div class="col-md-4 text-center">
                                                                    <div class="shadow m-2 p-3">

                                                                        <img src="<?= setImage($fetchrow['img'], 'uploads/merchant_products/')  ?>" style="width: 50px;height: 50px;" />
                                                                        <br>
                                                                        <h5 class="text-dark text-capitalise p-0 m-0"><?= $merchant['product_name']; ?></h5>
                                                                        (<?= $merchant['quantity']; ?> <?= $merchant['quantity_type']; ?> X <?= $datarow['quantity']; ?>)
                                                                        <br>
                                                                        <h6 class="text-dark text-capitalise p-0 m-0"> Rs. <?= $merchant['srimitra_price']; ?></h6>


                                                                    </div>
                                                                </div>
                                                        <?php
                                                                                                                                                                $j++;
                                                                                                                                                            }
                                                                                                                                                        }
                                                        ?>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <p><span style="font-size:10px;"> Rate:</span> ₹ <?php echo $this->cart->format_number($items['price']); ?> </p>
                                </div>
                                <div class="col-md-3">
                                    <div class=" ">
                                        <p><span style="font-size:10px;"> Qty:</span> <input type="number" name='' id="qtysidecart<?= $items['rowid']; ?>" value="<?php echo $items['qty']; ?>" class="qty " min="1" data-rowid="<?= $items['rowid']; ?>" style="max-width:60px"> Unit</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h6><span style="font-size:10px;"> Total:</span> ₹ <?php echo ($this->cart->format_number($items['price'] * $items['qty'])) ?>
                                    </h6>
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:void(0)" class="remove removeCarthm btn btn-danger" data-id="<?= $items['rowid'] ?>"> <i class="far fa-trash-alt"></i> </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
        <?php
                $i++;
            endforeach;
            next($arr);
        endforeach;
        ?>

        <div class=" p-3 col-md-12 shadow text-right">
            <h6 class="m-0 text-dark  ">Total: ₹ <?php echo $this->cart->format_number($this->cart->total()); ?></h6>
        </div>
        <input class="form-check-input" type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>">
        <input class="form-check-input" type="hidden" name="email" value="<?= $this->session->userdata('login_user_emailid') ?>">
        <input class="form-control" type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->total(); ?>">
        <input class="form-control" type="hidden" name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>">
        <div class="row col-md-12">
            <div class="form-grp col-sm-6">
            </div>
            <div class="form-grp col-sm-3"><br>
                <button type="button" class="btn btn-block" id="user">
                    <p class="small m-0 twhite">Proceed to checkout</p>
                </button>
            </div>
            <?php
            if (sessionId('login_user_id') == null || sessionId('login_user_id') == 0) {
            ?>
                <div class="form-grp col-sm-3"><br>
                    <button type="button" id="guest" class="btn btn-block p-3 m-0">
                        <p class="small m-0 twhite p-0">Continue As Guest </p>
                    </button>
                </div>
            <?php } ?>
        </div>
    <?php
    } else {
    ?>
        <div class=" col-md-12">
            <div class="review-top-left">
                <h5>No Items in our cart.</h5>
                <button type="submit" class="btn btn-block">
                    <p class="small m-0 twhite">Continue to explore our CCH.</p>
                </button>
            </div>
        </div>
    <?php
    }
    ?>
</ul>