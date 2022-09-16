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
                            <h2>
                                <?= $data['title'] ?>
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"  onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="color:white">
                                        <?= $data['title'] ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="faq-area position-relative fix pt-60 pb-120">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                    <?= $data['description'] ?>
                    </div>
                </div>
            </div>
            <div class="faq-bg-dots" data-background="<?= base_url() ?>assets/img/bg/faq_dots_bg.jpg"></div>
        </div>

        <?php //include('includes/upfooter.php'); 
        ?>

    </main>




    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>