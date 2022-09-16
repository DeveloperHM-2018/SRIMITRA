<!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>

    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h3 class="text-white"><?= ucfirst($profiledata['name']) ?></h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- author-profile-area -->
        <div class="author-profile-area gray-lite-bg pt-60 pb-60" style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg')">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-12 col-lg-12 col-md-9">
                        <div class="alert alert-primary">Update your profile to get nearby Child care homes list.</div>
                        <div class="row justify-content-center">

                            <div class="col-xl-12 col-lg-12">

                                <div class="latest-car-menu-wrap">

                                    <div class="latest-car-menu-active">
                                        <button class="active" data-filter="*">All city</button>
                                        <?php
                                        $i = 1;
                                        if (!empty($statelist)) {
                                            foreach ($statelist as $row) {

                                                $data = getSingleRowById('tbl_state', array('state_id' => $row['state']));
                                                // print_r($data);
                                                if (!empty($data)) {

                                        ?>
                                                    <button class="" data-filter=".cat<?= $data['state_id'] ?>"><?= $data['state_name'] ?></button>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <!--<button class="" data-filter=".cat-two">Indore</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="latest-cars-wrapper">
                            <div class="row latest-car-items-active">
                                <?php
                                $i = 1;
                                if (!empty($all_orphanage)) {
                                    foreach ($all_orphanage as $cons) {

                                        $data = getSingleRowById('tbl_orphanage_gallery', array('orphanage_id' => $cons['id']));
                                        $city = getSingleRowById('tbl_cities', array('id' => $cons['city']));

                                ?>
                                        <div class="col-lg-4 col-md-4 grid-item grid-sizer cat<?= $cons['state'] ?>">
                                            <div class="latest-car-item mb-40">
                                                <div class="latest-car-thumb">

                                                    <?php
                                                    if ($data != '') {
                                                        $imgData = $data['img']; ?>
                                                        <img src="<?= base_url() ?>uploads/orphange/gallery/<?= $data['img'] ?>" class="oimg" alt="<?= $cons['name'] ?>">

                                                    <?php
                                                    } else {
                                                        ?>
                                                    <img src="<?= base_url() ?>assets/img/1.jpg" class="oimg" alt="<?=  $cons['name'] ?>">
                                                    <?php
                                                    }
                                                    ?>

                                                    <a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>" class="btn book-btn">View profile</a>
                                                </div>
                                                <div class="latest-car-content-wrap">
                                                    <div class="latest-car-content">
                                                        <h5><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['name'] ?></a></h5>
                                                        <!-- <h6><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['category'] ?></a></h6> -->
                                                        <p><i class="fas fa-map-marker-alt"></i> <?= (($city == '') ? 'Not updated' : $city['name']) ?></p>
                                                    </div>
                                                    <div class="latest-car-meta">

                                                    </div>
                                                    <div class="latest-car-bottom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="latest-car-btn text-center mt-10">
                                        <a href="<?= base_url('child_care_homes') ?>" class="btn">SHOW ALL OPPORTUNITIES</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- author-profile-area-end -->
        <?php //include('includes/upfooter.php'); 
        ?>

    </main>




    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
    <script>

    </script>
</body>

</html>