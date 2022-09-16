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
                            <h2><?= $title ?></h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"  onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="color:white"><?= $title ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="contact-area pt-60" style="background-image: url('<?= base_url() ?>assets/img/pattern3.jpg');display:flex; justify-content:center;"    >
   
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScHVy2ciZWVWK8fKO93EtcY5rbLfmwLM6uL1YSRFz17a7Ex3Q/viewform?embedded=true" width="100%" height="3421" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
       
       
       
       </section>
    </main>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>