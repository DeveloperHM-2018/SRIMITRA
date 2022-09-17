<?php
$i = 1;
if (!empty($all_data)) {
    foreach ($all_data as $cons) {

        $data = getSingleRowById('tbl_orphanage_gallery', array('orphanage_id' => $cons['id']));
        $city = getSingleRowById('tbl_cities', array('id' => $cons['city']));

?>
        <div class="col-md-6 inventory-list-item p-2">

            <?php
            if ($cons['profile_type'] == '0') {
            ?>
                <div class="inventory-list-thumb text-center" style="background: #f7f7f7;">
                    <img src="<?= (($cons['profile'] != '') ? base_url('uploads/orphange/profile/' . $cons['profile']) : base_url('assets/img/1.jpg')) ?>" class="main-img shadow" alt="">
                </div>
                <?php
            } else {
                if ($cons['profile_video'] != '') {
                    if (file_exists(FCPATH . 'uploads/orphange/profile/' . $cons['profile_video'])) {
                ?>
                        <div class="inventory-list-video text-center" style="background: #f7f7f7;">
                            <video height="200" controls>
                                <source src="<?= base_url() ?>uploads/orphange/profile/<?= $cons['profile_video'] ?>" type="video/mp4">
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
                <h6><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['name'] ?> </a></h6>
                <p class="location">
                    <i class="fas fa-map-marker-alt"></i> <?= (($city == '') ? 'Not known' : $city['name']) ?>
                </p>
                <div class="pbars">
                    <div>
                        <a href="#">
                            <h2 class="colorblue" style="height:42px;"><?= $cons['kid_fed'] ?></h2>
                            <p>No of Children</p>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="<?= base_url() ?>assets/home/img/prpgress-bar2.png" alt="progress" style="width: 50px; height:50px;" />
                            <p>Requirements Fulfilled</p>
                        </a>
                    </div>
                    <div>
                        <a href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>#orderrequest_list">
                            <img src="<?= base_url() ?>assets/home/img/list.png" alt="progress" style="width: 50px; height:50px;" />
                            <p>List of Requirements </p>
                        </a>
                    </div>
                </div>
                <div class="inv-content-top">
                    <ul>
                        <li class="option">
                            <a class="new" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>">Let’s Contribute</a>

                            <?php
                            if (sessionId('login_user_id') !== null) {
                            ?>

                            <?php
                            } else {
                            ?>
                                <!-- <a href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>">Contribute Anonymously</a> -->
                            <?php
                            }
                            ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
<?php
    }
}
?>