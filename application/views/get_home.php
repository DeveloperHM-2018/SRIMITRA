<?php
$i = 1;
if (!empty($all_data)) {
    foreach ($all_data as $cons) {
        $data = getSingleRowById('tbl_orphanage_gallery', array('orphanage_id' => $cons['id']));
?>
        <div class="col-md-12 inventory-list-item">
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
                <div class="row">

                    <div class="col-md-6">
                        <h6><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['category'] ?></a></h6>
                        <h4><a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>"><?= $cons['name'] ?></a></h4>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> <?= (($cons['address'] == '') ? 'Unknown' : $cons['address']) ?></p>
                    </div>
                    <div class="inv-content-top col-md-6">
                        <ul>
                            <li class="option">
                                <a target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>">VIEW</a>
                                <a class="new orangebtn" target="_blank" href="<?= base_url() ?>child_care_home_profile/<?= encryptId($cons['id']) ?>/<?= url_title($cons['name']) ?>#Donate">CONTRIBUTE</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="inv-item-meta">
                    <ul class="mt-2 pt-2">

                        <li><?= (($cons['description'] == '') ? 'We know only too well that what we are doing is nothing more than a drop in the ocean. But if the drop were not there, the ocean would be missing something.' : strip_tags(substr($cons['description'], 0, 150)))  ?>...</li>

                    </ul>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo 'Oops , No child care home matched with your keyword.';
}
?>