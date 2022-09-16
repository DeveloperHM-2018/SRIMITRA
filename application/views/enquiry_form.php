<div class="widget mb-30">
    <h3 class="widget-title">Enquire Now</h3>
    <h6 class="text-warning"><?php
if ($this->session->has_userdata('msg')) {
 echo $this->session->userdata('msg');
 $this->session->unset_userdata('msg');
}
?>
</h6>
    <div class="sidebar-form">
        <form action="<?= base_url('Index/enquiry_now') ?>" class="donation_form" method="post">
            <div class="form-grp">

                <input type="text" placeholder=" Name" name="name" required>
            </div>
            <div class="form-grp">

                <input type="text" placeholder=" Number(optional)" name="number">
            </div>
            <div class="form-grp">

                <input type="text" placeholder=" Email" name="email" required>
            </div> 
            <div class="form-grp"> 
                <textarea name="Message" class="textarea" id=""
                    placeholder=" Message..." required></textarea>
            </div>


            <div class="form-grp">
                <input type="submit" value="Submit" class="donation_submit_btn">
            </div>
        </form>
    </div>
</div>