<!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>

    <main>

        <section class="breadcrumb-area breadcrumb-bg" data-background="<?= base_url() ?>assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Order Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?><?= base_url() ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="inventory-details-area gray-lite-bg pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">

                        <form action="<?= base_url('Index/checkoutpay') ?>" method="POST">
                            <div class="inventory-review-wrap mb-30">
                                <div class="inv-details-title">
                                    <div class="review-top-left">
                                        <h5>Cart items</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul class="row">

                                        <?php
                                        
                                        $i = 1;
                                        $arr = group_by_array($this->cart->contents(), 'orphane');

                                        foreach ($arr as $cch_item) :
                                            print_R($cch_item);
                                            foreach ($cch_item as $items) :
                                                $img = '';
                                                print_R($items);
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
                                        ?>
                                                <li class="col-md-12" id="<?= $items['rowid'] ?>">
                                                    <div class="single-comment row">
                                                        <div class="comment-avatar-img col-md-2">

                                                            <img src="<?= $img ?>" alt="<?php echo $items['name']; ?>" style="height:30px;">
                                                        </div>
                                                        <div class="comment-text  col-md-10 ">
                                                            <div class="comment-avatar-info row">
                                                                <div class="col-md-4">
                                                                    <h4><?php echo $items['name']; ?><span class="comment-date"></span>

                                                                    </h4>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p>₹ <?php echo $this->cart->format_number($items['price']); ?> X <?php echo $items['qty']; ?> Unit</p>

                                                                    <div class="rating">
                                                                        <input type="hidden" name='' id="qtysidecart<?= $items['rowid']; ?>" value="<?php echo $items['qty']; ?>" class="qty form-control" data-rowid="<?= $items['rowid']; ?>" style="max-width:60px" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <h6><span style="font-size:10px;"> Total:</span> ₹ <?php echo ($this->cart->format_number($items['price']) * $items['qty']) ?>
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <a href="javascript:void(0)" class="remove removeCarthm btn btn-danger" data-id="<?= $items['rowid'] ?>"> <i class="far fa-trash-alt"></i> </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>

                                                <input class="form-check-input" type="hidden" name="orphane_id" value="<?= $items['orphane'] ?>">

                                        <?php
                                                $i++;

                                            endforeach;
                                        endforeach;
                                        ?>
                                    </ul>
                                </div>
                            </div>



                            <input class="form-check-input" type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>">
                            <input class="form-check-input" type="hidden" name="email" value="<?= $this->session->userdata('login_user_emailid') ?>">
                            <input class="form-control" type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->total(); ?>">
                            <input class="form-control" type="hidden" name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>">

                            <button type="submit" class="btn btn-block">
                                <h6 class="m-0 twhite">Total ₹ <?php echo $this->cart->format_number($this->cart->total()); ?></h6>
                                <p class="small m-0 twhite">Proceed to checkout</p>
                            </button>



                            </a>

                    </div>
                    </form>

                </div>
            </div>
        </section>

    </main>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>