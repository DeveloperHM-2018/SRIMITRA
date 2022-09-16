<aside class="author-profile-sidebar">
    <div class="author-profile-wrap">
        <div class="author-profile-thumb">
            <img src="<?= base_url('uploads/user/' . (($profiledata['img'] != '') ? $profiledata['img'] : 'user.jpg')) ?>" alt="" style="height:100px;">
        </div>

        <h5 class="name"><?= $profiledata['name'] ?></h5>
        <span class="des"><?= $profiledata['number'] ?></span>
        <div class="location">
            <p><i class="fas fa-map-marker-alt"></i> <?= $profiledata['email'] ?></p>
        </div>
        <div class="author-profile-list">
            <ul>
                <li><i class="far fa-address-book"></i>Unconfirmed Contribution  <span>
                        <?php
                        $count = getRowsumByMoreId('checkout', array('user_id' => $this->session->userdata('login_user_id'), 'status' => 0), 'grand_total');
                        echo (($count[0]['grand_total'] == '') ? '00' : $count[0]['grand_total']);
                        ?>
                    </span></li>
                <li><i class="far fa-hand-point-right"></i>Confirmed Contribution <span>
                        <?php
                        $count = getRowsumByMoreId('checkout', array('user_id' => $this->session->userdata('login_user_id'), 'status' => 1), 'grand_total');
                        echo (($count[0]['grand_total'] == '') ? '00' : $count[0]['grand_total']);
                        ?>
                    </span></li>
                <!--<li><i class="far fa-bell"></i>Followers <span>1,046</span></li>-->
            </ul>
        </div>
        <div class="author-profile-btn">
            <a href="<?= base_url('Index/my_donation') ?>" class="btn">My Contribution </a>
            <a href="<?= base_url('Index/update_profile') ?>" class="btn black">Edit Profile</a>
            <a href="<?= base_url('Index/child_care_homes') ?>" class="btn">Contribute</a>
        </div>
        <div class="author-contact-info text-center">
            <!--<p>For more information about Child homes reach us </p><br>-->
            <a href="<?= base_url('Index/contact') ?>" class="btn">Reach us For more information </a>
           
        </div>
        <div class="author-profile-social">
            <ul> 
            <li> SHARE NOW ON &nbsp; &nbsp;</li> 
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url() ?>&t=SrimitraIndia | Building the future of Orphan kids to help strengthen civil society by enhancing the effectiveness of philanthropy." onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                </li>  
                <li><a href="whatsapp://send?text=<?= base_url() ?> Building the future of Orphan kids to help strengthen civil society by enhancing the effectiveness of philanthropy. " data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="https://twitter.com/share?url=<?= base_url() ?>&text=SrimitraIndia" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url() ?>&t=SrimitraIndia | Building the future of Orphan kids to help strengthen civil society by enhancing the effectiveness of philanthropy." onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </div>
</aside>