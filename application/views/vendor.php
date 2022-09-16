<!DOCTYPE html>
<html lang="zxx">


<?php include('commonpages/head.php'); ?>

<body>

    <?php include('commonpages/header.php'); ?>

    <section class="faq_cta_part section_padding parallaxie cta_bg" style="background: url('<?= base_url() ?>assets/img/cta_bg_2.png');background-attachment: fixed;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="faq_cta_content">
                        <img src="<?= base_url(); ?>assets/img/shopkeeper-with-grocery-stand-vector-25008006.png" alt="#" class="w-100">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq_cta_content card p-5">
                        <h4>Join Now </h4>
                        <hr>
                        <form method="POST" class="form-container row" name="contact-us">
                            <div class="col-md-12"><label for="NameOfShop">Name Of Shop</label><input autocomplete="off" class="form-control" id="NameOfShop" placeholder="Name of shop" type="text" name="NameOfShop"></div>
                            <div class="col-md-12"><label for="AddressOfShop">Address Of Shop</label><input autocomplete="off" class="form-control" id="AddressOfShop" placeholder="Address of shop" type="text" name="AddressOfShop">
                            </div>
                            <div class="col-md-6"><label for="ShopRegitration">Regitration Number of Shop</label><input autocomplete="off" class="form-control" id="ShopRegitration" placeholder="Regitration Number" type="text" name="ShopPAN"></div>
                            <div class="col-md-6"><label for="GST">GST Number of Shop</label><input autocomplete="off" class="form-control" id="GST" placeholder="GST Number" type="text" name="GST"></div>
                            <div class="col-md-6"><label for="MerchantName">Merchant Name</label><input autocomplete="off" class="form-control" id="MerchantName" placeholder="Name of the merchant" type="text" name="MerchantName">
                            </div>
                            <div class="col-md-6"><label for="MerchantPAN">PAN Number of Merchant</label><input autocomplete="off" class="form-control" id="MerchantPAN" placeholder="PAN Number" type="text" name="MerchantPAN"></div>
                            <div class="col-md-6"><label for="MerchantAdhaar">Adhaar Number of Merchant</label><input autocomplete="off" class="form-control" id="MerchantAdhaar" placeholder="Adhaar Number" type="text" name="MerchantAdhaar"></div>
                            <div class="col-md-6"><label for="email">Email</label><input autocomplete="off" class="form-control" id="email" placeholder="Email" type="text" name="Email"></div>
                            <div class="col-md-12 p-2">
                                <input type="submit" name="Submit" id="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <?php include('commonpages/footer.php'); ?>

</body>




</html>