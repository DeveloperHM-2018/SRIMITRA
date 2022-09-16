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
        <section class="contact-area pt-120" style="background-image: url('<?= base_url() ?>assets/img/pattern3.jpg')">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdPq_cX4KzuT9amsFUDBfbwxmCtiB1876dP1JGOn1t5WxloCg/viewform?embedded=true" width="640" height="3828" frameborder="0" marginheight="0" marginwidth="0" class="google_form" >Loading…</iframe>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="blog--post mb-40">

                            <div class="blog--post--content">
                                <div class="blog--post--tag">
                                    <span class="date">November 14, 2021</span>
                                </div>
                                <h2><a href="#">Needed content creater</a></h2>
                                <!-- <p>Exp - 1 yr.</p> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    View details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Needed content creater</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                some description for JD.
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="blog--post--meta">
                                        <ul>
                                            <li class="avatar"><div class="thumb"><img src="img/blog/blog_post_avatar.png" alt=""></div><a href="#">Dani jeans</a></li>
                                            <li class="date"><span>Feb 17, 2021</span><span>3 Views</span></li>
                                            <li class="social">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php //include('includes/upfooter.php'); 
        ?>
    </main>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
</body>

</html>