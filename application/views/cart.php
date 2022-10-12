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
                        <form action="<?= base_url('Index/checkoutpay') ?>" method="POST" id="checkout_cart">
                            <div class="inventory-review-wrap mb-30">
                                <div class="row" id="cart">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
    <script>
        load_product();
        $(document).on('click', '#guest', function() {
            // $('#guest').change(function() {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Ajax/guest_login",
                success: function(response) {
                    if (response == 1) {
                        $('#checkout_cart').submit();
                    }
                }
            });
        });
        $(document).on('click', '#user', function() {
            // $('#guest').change(function() {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Ajax/user_login",
                success: function(response) {
                    if (response == 1) {
                        $('#checkout_cart').submit();
                    }
                }
            });
        });
    </script>
</body>

</html>