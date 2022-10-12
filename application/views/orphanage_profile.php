<!doctype html>
<html class="no-js" lang="en">
<?php include('includes/head-link.php'); ?>
<link rel="stylesheet" href="http://code.ionicframework.com/ion$mar[0]/2.0.1/css/ion$mar[0].min.css">
<style>
    div.stars {
        /* width: 100%; */
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 16px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }

    .sinolo {
        /* width: 35%; */
        float: left;
    }

    .sinolo input {
        width: 45%;
        border: none;
        text-align: center;
    }

    .sinolo button {
        width: 25%;
        font-size: 10px;
        padding: 8px 0px;
    }

    .card {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        /*background-color: #ffffff;*/
        /* margin: 0 20px; */
        /* width: 280px; */
        /* height: 350px; */
        /*border-radius: 5px;*/
        /*box-shadow: 0 10px 20px -10px rgba(0, 0, 0, 0.2);*/
    }

    .card .percent {
        position: relative;
    }

    .card svg {
        position: relative;
        width: 147px;
        height: 159px;
        transform: rotate(-90deg);
    }

    .card svg circle {
        width: 100%;
        height: 100%;
        fill: none;
        stroke: #f0f0f0;
        stroke-width: 10;
        stroke-linecap: round;
    }

    .card svg circle:last-of-type {
        stroke-dasharray: 625px;
        stroke-dashoffset: calc(625px - (625px * var(--percent)) / 100);
        stroke: #3498db;
    }

    .card .number {
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
    }

    .card .number h3 {
        font-weight: 200;
        font-size: 3.5rem;
    }

    .card .number h3 span {
        font-size: 2rem;
    }

    .card .title h2 {
        margin: 25px 0 0;
    }

    .card:nth-child(1) svg circle:last-of-type {
        stroke: #f39c12;
    }

    .card:nth-child(2) svg circle:last-of-type {
        stroke: #2ecc71;
    }

    .grid_graph {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(7rem, 1fr));
        margin: 0;
        grid-column-gap: 30px;
    }

    .container>a {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2em;
    }

    .containerhm>a>img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        box-shadow: 0 2px 16px var(--shadow);
    }

    .containerhm {
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        grid-auto-rows: 120px;
        grid-auto-flow: dense;
    }

    .horizontal {
        grid-column: span 2;
    }

    .vertical {
        grid-row: span 2;
    }

    .big {
        grid-column: span 2;
        grid-row: span 2;
    }

    table {
        width: 100%;
    }

    table,
    thead,
    tbody,
    th,
    td,
    tr {

        border-collapse: collapse;
        margin-bottom: 0.2rem;
        padding: 5px;
        color: #212529;
        border-bottom: #212529 1px solid;
        text-align: center;
    }

    /*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
            border-collapse: collapse;
            margin-bottom: 0rem;
            color: #212529;

            text-align: left;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;

        }

        tr {
            margin: 0 0 1rem 0;
        }

        tr:nth-child(odd) {
            background: #ccc;
        }

        td {
            /* Behave  like a "row" */
            border: none;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 0;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            /* white-space: nowrap; */
            line-height: 15px;
            padding-top: 5px;
            ;
        }

        /*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
        td:nth-of-type(1):before {
            content: "Select here";
        }

        td:nth-of-type(2):before {
            content: "Product";
        }

        td:nth-of-type(3):before {
            content: "Quantity requested";
        }

        td:nth-of-type(4):before {
            content: "Price/unit ";
        }

        td:nth-of-type(5):before {
            content: "Use Button to customize";
        }

        td:nth-of-type(6):before {
            content: "Total Amount";
        }


    }
</style>

<body>
    <?php include('includes/header.php'); ?>

    <main>


        <section class="breadcrumb-area breadcrumb-bg new" style="background: #ffffff !important;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-7 col-md-9 inventory-list-item1">
                        <div class="inventory-list-item wrap inventory-list-item2">
                            <?php
                            if ($mar[0]['profile_type'] == '0') {
                            ?>
                                <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                                    <img src="<?= (($mar[0]['profile'] != '') ? base_url('uploads/orphange/profile/' . $mar[0]['profile']) : base_url('assets/img/1.jpg')) ?>" class="main-img shadow" alt="">
                                </div>
                                <?php
                            } else {
                                if ($mar[0]['profile_video'] != '') {
                                    if (file_exists(FCPATH . 'uploads/orphange/profile/' . $mar[0]['profile_video'])) {
                                ?>
                                        <div class="inventory-list-video text-center" style="background: #f7f7f7;">
                                            <video height="200" controls>
                                                <source src="<?= base_url() ?>uploads/orphange/profile/<?= $mar[0]['profile_video'] ?>" type="video/mp4">
                                            </video>
                                        </div>

                                    <?php } else {
                                    ?>
                                        <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                                            <img src="<?= base_url('assets/img/1.jpg')  ?>" class="main-img shadow" alt="">
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                                        <img src="<?= base_url('assets/img/1.jpg')  ?>" class="main-img shadow" alt="">
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>

                            <div class="inventory-list-content">
                                <div class="row">

                                    <div class="col-md-6">

                                        <h4><a href=""><?= $mar[0]['name'] ?></a></h4>

                                        <p class="location"><i class="fas fa-map-marker-alt"></i> <?= $mar[0]['address'] ?> </p>
                                    </div>
                                </div>



                                <hr>
                                <?= substr($mar[0]['description'], 0, 500); ?>...<a href="#descrip">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="inventory-details-area gray-lite-bg pt-20 pb-60" id="orderrequest_list" style="background-image: url('<?= base_url() ?>assets/img/backgroundimg.jpg')">
            <div class="container">
                <h3 class="text-center pb-4 c-blue"> <?= $mar[0]['tagline']; ?></h3>
                <div class="row">
                    <div class="col-lg-8">
                        <?php if ($order != '') {
                            $j = 1;
                            foreach ($order as $orderrow) {
                        ?>
                                <div class="inventory-features mb-30 tbo">
                                    <div class="inv-details-title">
                                        Requested on -
                                        <?= convertDatedmy($orderrow['create_date']); ?>
                                    </div>
                                    <table class=" " role="table">
                                        <thead role="rowgroup">
                                            <tr role="row">
                                                <th role="columnheader">Product </th>
                                                <th role="columnheader">Qty requested </th>
                                                <th role="columnheader">Price/unit </th>
                                                <th role="columnheader">Total Amount </th>
                                                <th role="columnheader">Contribute Qty </th>
                                                <th role="columnheader">Add to cart</th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            <?php
                                            $data = getRowById('tbl_orphange_order_product', 'o_id', $orderrow['oid']);
                                            if (!empty($data)) {
                                                $i = 1;
                                                foreach ($data as $datarow) {
                                                    $merchant = getSingleRowById('merchant_products', array('id' => $datarow['product']));
                                                    $product = getSingleRowById('products', array('product_id' => $merchant['product_id']));
                                            ?>
                                                    <tr role="row">
                                                        <td role="cell">
                                                            <p>
                                                                <?= $product['pro_name'] ?><br>
                                                                (<?= ($merchant['quantity']) ?> <?= $merchant['quantity_type'] ?>)
                                                            </p>
                                                        </td>
                                                        <td role="cell">
                                                            <p>
                                                                <?= $datarow['quantity'] ?>
                                                            </p>
                                                        </td>
                                                        <td role="cell">
                                                            <?= $merchant['srimitra_price'] ?> /<?= $merchant['quantity_type'] ?>
                                                        </td>
                                                        <td role="cell">
                                                            &#8377; <?= $datarow['quantity'] *  $merchant['srimitra_price'] ?>
                                                        </td>
                                                        <td role="cell">
                                                            <input type="number" name="qty" min="0" max="<?= $datarow['quantity'] ?>" value="<?= $datarow['quantity'] ?>" class="qtysidecart<?= $merchant['id'] ?> p-0 " id="amt<?= $datarow['id'] ?>" style="width:70px">
                                                        </td>
                                                        <td role="cell">
                                                            <button class="btn btn-block savecart" data-or_id="<?= $datarow['id'] ?>" data-order_type="0" data-cchid="<?= $mar[0]['id'] ?>" data-qty="">Add</button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                    </table>
                                </div>
                        <?php
                                $j++;
                            }
                        } else {
                            echo ' <div class="inventory-features mb-30">
                            <div class="inv-details-title">
                                <h5>There is no new request </h5>
                                </div></div>';
                        }
                        ?>
                        <div class="row">
                            <div class=" col-md-4 p-2">
                                <div class="inventory-features mb-30 ">
                                    <div class="inv-details-title text-center">
                                        <img src="<?= base_url() . 'assets/img/19071658243979122.jpg' ?>" class="cimg" />
                                        <h5>
                                            Birthdays Celebration
                                        </h5>
                                        <h6> <br>
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="<?= base_url('celebrate_with_us') ?>" class="btn btn-block   btn-primary  ">Contribute now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($request != '') {
                                $j = 1;
                                foreach ($request as $orderrow) {
                                    $cch = json_decode($orderrow['cch_id_list'], true);

                                    if (in_array($mar[0]['id'], $cch)) {


                            ?>
                                        <div class=" col-md-4  col-6 p-2">
                                            <div class="inventory-features mb-30 ">
                                                <div class="inv-details-title text-center">

                                                    <?php if ($orderrow['cover'] != '') { ?>
                                                        <img src="<?= base_url('uploads/ordercover/' . $orderrow['cover']) ?>" height="100px" class="cimg" />
                                                    <?php


                                                    } else {
                                                        echo '<img src="' . base_url() . 'assets/img/default-image.jpg" class="cimg" /> ';
                                                    }
                                                    ?>

                                                    <h5>
                                                        <?= $orderrow['product_title']; ?>
                                                    </h5>
                                                    <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModalLong<?= $orderrow['ortid'] ?>">
                                                        Product Info
                                                    </button>
                                                    <h6> ₹
                                                        <?= $orderrow['combo_price']; ?>
                                                    </h6>

                                                </div>
                                                <div class="row">
                                                    <input type="hidden" value="1" id="amts<?= $orderrow['ortid'] ?>">
                                                    <button class="btn btn-block savecart" data-or_id="<?= $orderrow['ortid'] ?>" data-cchid="<?= $mar[0]['id'] ?>" data-order_type="1" data-qty="">Add</button>
                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div class="modal bd-example-modal-lg fade" id="exampleModalLong<?= $orderrow['ortid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                    $data = getRowById('order_request_template_product', 'ort_id', $orderrow['ortid']);
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
                                                </div>
                                            </div>
                                        </div>
                            <?php

                                        $j++;
                                    } else {
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="inventory-features mb-30">
                            <div class="inv-details-title">
                                <h5>Gallery</h5>
                            </div>

                            <!--<div class="inventory-details-slide">-->
                            <div class="container-fluid p-0 fix">
                                <div class="row">
                                    <?php
                                    $i = 0;
                                    $v = 0;
                                    if ($gallery != '') {

                                        foreach ($gallery as $img) {
                                            if (file_exists(FCPATH . '/uploads/orphange/gallery/' . $img['img'])) {
                                    ?>
                                                <div class="col-md-4">
                                                    <button type="button" data-toggle="modal" data-target="#exampleModal<?= $img['gid'] ?>" style="border:0; background:none">
                                                        <?php
                                                        if ($img['type'] == '0') {
                                                        ?>
                                                            <img src="<?= base_url('/uploads/orphange/gallery/') . $img['img'] ?>" style="width:100%" /> 

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <video controls style="width:100%">
                                                                <source src="<?= base_url('/uploads/orphange/gallery/') . $img['img'] ?>" type="video/mp4">
                                                            </video>
                                                        <?php
                                                        }
                                                        ?>
                                                    </button>
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal<?= $img['gid'] ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <?php
                                                                    if ($img['type'] == '0') {
                                                                    ?>
                                                                        <img src="<?= base_url('/uploads/orphange/gallery/') . $img['img'] ?>" style="width:100%" />

                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <video controls style="width:100%">
                                                                            <source src="<?= base_url('/uploads/orphange/gallery/') . $img['img'] ?>" type="video/mp4">
                                                                        </video>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php

                                            } else {
                                                $v++;
                                            }
                                            $i++;
                                        }
                                    } else {
                                        echo ' &nbsp;  &nbsp; No gallery found';
                                    }
                                    if ($v > 0) {
                                        echo ' &nbsp;  &nbsp;  No gallery found';
                                    }
                                    ?>

                                </div>
                                <div class="row no-gutters ">
                                    <!--inv-details-active-->
                                </div>
                            </div>
                            <!--</div>-->
                        </div>
                        <div class="inventory-details-description mb-30" id="descrip">
                            <div class="inv-details-title">
                                <h5>Description</h5>
                            </div>
                            <p class="justify">
                                <?= $mar[0]['description']; ?>
                            </p>
                        </div>

                        <div class="row">
                            <div class="inventory-review-wrap mb-30 testimonial_box">
                                <div class="inv-details-title">
                                    <div class="review-top-left">
                                        <h5>See what out Mitra's have to say</h5>
                                        <div class="review">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span>( 4.5 out of 5 )</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-comment">
                                    <ul>

                                        <?php if (!empty($feedback)) {
                                            // $j = 1;
                                            foreach ($feedback as $feed) {

                                        ?>

                                                <li>
                                                    <div class="single-comment">
                                                        <div class="comment-avatar-img">
                                                            <img src="<?= base_url() ?>assets/img/testavtar.png" alt="img">
                                                        </div>
                                                        <div class="comment-text">
                                                            <div class="comment-avatar-info">
                                                                <div class="left">
                                                                    <h5>
                                                                        <?= $feed['name']; ?><span class="comment-date">
                                                                            <?= $feed['email']; ?>
                                                                        </span>
                                                                    </h5>
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                <?= $feed['feedback'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                        <?php
                                            }
                                        }
                                        ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <aside class="blog-sidebar" id="Donate">

                            <?php include('enquiry_form.php'); ?>

                            <div class="widget mb-30" id="feedback">
                                <h3 class="widget-title">Share your valuable feedback</h3>
                                <div class="sidebar-form">
                                    <form action="" method="POST" class="donation_form">

                                        <?php
                                        if ($this->session->has_userdata('feedbackmsg')) {
                                            echo $this->session->userdata('feedbackmsg');
                                            $this->session->unset_userdata('feedbackmsg');
                                        }
                                        ?>
                                        <div class="form-grp">

                                            <input type="text" placeholder="Name" name="name" required>
                                        </div>
                                        <div class="form-grp">
                                            <input type="text" placeholder="Email" name="email" required>
                                        </div>
                                        <div class="form-grp text-left">
                                            <label>Rating</label>
                                            <div class="col-md-12">
                                                <div class="stars">

                                                    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                                    <label class="star star-1" for="star-1"></label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-grp">

                                            <textarea name="feedback" class="textarea" id="" placeholder="Feedback..." required></textarea>
                                        </div>
                                        <div class="form-grp">
                                            <input type="Submit" value="Submit" class="donation_submit_btn">
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <div class="widget mb-30">
                                <h3 class="widget-title">Contact For Any Support</h3>
                                <div class="sidebar-about">
                                    <div class="about-thumb mb-30">
                                        <img src="<?= base_url() ?>assets/img/boy-smiling.jpg" class="boy-image col-md-12" alt="">
                                    </div>
                                    <div class="sidebar-about-content">
                                        <a href="mailto:hello@srimitraindia.com" target="_blank" class="mail">hello@srimitraindia.com</a>
                                    </div>
                                    <div class="sidebar-about-social mt-20 flex_column">
                                        <a href="tel:<?= str_replace(' ', '', $contactdetails[0]['f_contact']) ?>" class="call_btn">Call Now</a>
                                        <span style="margin-top: 5px;">OR</span>
                                        <a href="https://wa.me/91<?= str_replace(' ', '', $contactdetails[0]['f_contact']) ?>?text=Hello Mitra, i have a query ! " class="call_btn">Text us on WhatsApp</a>
                                    </div>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </section>

        <?php include('includes/footer.php'); ?>
        <?php include('includes/footer-link.php'); ?>


        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script>
            (function() {
                const progress = document.querySelector(`.progress`);
                const progressIndicator = document.querySelector(`.progress-indicator`);
                const progressLabel = document.querySelector(`.progress-label > strong`);
                const input = document.querySelector(`input[type="number"]`);

                input.oninput = ({
                    target
                }) => {
                    let value = target.value <= 100 && target.value >= 0 ? target.value : 50;
                    progressLabel.textContent = value;
                    progress.style.setProperty(`--progress-value`, value);
                    progress.dataset.value = value;

                    if (value > 50) progress.classList.add(`progress--upper-half-value`);
                    else
                        progress.classList.contains("progress--upper-half-value") &&
                        progress.classList.remove(`progress--upper-half-value`);
                };
            })();
        </script>

</body>

</html>