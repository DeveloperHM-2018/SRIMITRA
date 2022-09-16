<!doctype html>
<html class="no-js" lang="en">
<?php include('includes/head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>
    <main class="text-center">
        <section class="breadcrumb-area breadcrumb-bg" data-background="<?= base_url() ?>assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>
                                <?= $title ?>
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"  onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="color:white">
                                        <?= $title ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
         <section class="contact-area pt-60" style="background-image: url('<?= base_url() ?>assets/img/pattern3.jpg')">
       
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSedkoRWsnsa4KjFzFvn2JfFtpQ2smd3EJjdsWj1kEe2DvJPkg/viewform?embedded=true" width="640" height="4096" frameborder="0" marginheight="0" marginwidth="0" class="google_form">Loading…</iframe>
                        
                            
                           
    </section> 
        <?php //include('includes/upfooter.php'); 
        ?>
    </main>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
</body>

</html>