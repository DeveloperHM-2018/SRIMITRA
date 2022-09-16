<!doctype html>
<html class="no-js" lang="en">
<?php include('includes/head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>

    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h3  class="text-white"><?= ucfirst($profiledata['name']) ?></h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active text-white" aria-current="page">Update Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <div class="author-profile-area gray-lite-bg pt-30 pb-30" style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg')">
            <div class="container">
                <div class="row justify-content-center">
                 
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="author-profile-area gray-lite-bg">
                          

                            <div class="contact-form-wrap">
                                
                                <div class="login-wrap m-0">
                                     
                                    <form action="" method="post" class="login-form row" enctype="multipart/form-data">
                                        <div class="form-grp col-md-3">
                                            <label for="name">Name </label>
                                            <input type="text" name="name" value="<?= $profiledata['name'] ?>" required>
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="email">Email </label>
                                            <input type="text" name="email" value="<?= $profiledata['email'] ?>" required>
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">Contact </label>
                                            <input type="text" name="number" value="<?= $profiledata['number'] ?>" readonly>
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">Profile img </label>
                                            <input type="file" name="imgprofile" value="" accept="image/*,.pdf" />
                                            <p style="color:#FF0000;"> Maximum File Size Limit is 1MB. </p>
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">DOB </label>
                                            <input type="date" name="dob" value="<?= $profiledata['dob'] ?>" required>
                                        </div>
                                        <div class="  col-md-3">
                                            <label class="form-label">State</label>
                                            <select  name="state" id="state" class="form-control2 state">
                                                <option value="">Select state </option>
                                                <?php
                                                if ($state_list) {
                                                    foreach ($state_list as $state) {
                                                ?>
                                                        <option value="<?= $state['state_id'] ?>" <?= ($profiledata['state'] == $state['state_id'])? 'selected':'' ?>><?= $state['state_name'] ?></option>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="  col-md-3">
                                            <label class="form-label">City</label>
                                            <select name="city"  id="city"  class="form-control2 city">
                                                <option value="">Select city</option>
                                                <?php
                                                $city = getRowById('tbl_cities','id',$profiledata['city']);
                                                if ($city) {
                                                    foreach ($city as $cit) {
                                                ?>
                                                        <option value="<?= $cit['id'] ?>"  selected><?= $cit['name'] ?></option>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">Passport /PAN no. </label>
                                            <input type="text" name="pass_pan" value="<?= $profiledata['pass_pan'] ?>" required>
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">Facebook link </label>
                                            <input type="text" name="fb" value="<?= $profiledata['fb'] ?>">
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">Instagram link </label>
                                            <input type="text" name="insta" value="<?= $profiledata['insta'] ?>">
                                        </div>

                                        <div class="form-grp  col-md-3">
                                            <label for="message">linkedin link </label>
                                            <input type="text" name="linkedin" value="<?= $profiledata['linkedin'] ?>">
                                        </div>
                                        <div class="form-grp  col-md-3">
                                            <label for="message">Twitter link </label>
                                            <input type="text" name="twitter" value="<?= $profiledata['twitter'] ?>">
                                        </div>
                                        <button class="btn">Submit</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                    
                    
                     <div class="col-xl-12 col-lg-12 col-md-9 mt-3">
                        <div class="author-profile-area gray-lite-bg">
                          

                            <div class="contact-form-wrap">
                                
                                <div class="login-wrap m-0">
                                      <h2 class="view_center">Change Password</h2>
                                      
                                      <?php
                                                if ($this->session->has_userdata('msg')) {
                                                    echo '<p class="alert ' . $this->session->userdata('cmsg_class') . '">' . $this->session->userdata('cmsg') . '</p>';
                                                    $this->session->unset_userdata('cmsg');
                                                }
                                                ?>
                                      <br>
                                    <form action="<?= base_url('Index/change_password') ?>" method="post" class="login-form row" enctype="multipart/form-data">
                                       
                                       
                                                         <div class="form-grp col-md-3">
                                                            <label class="">Old Password</label>
                                                            <input  type="password" name="oldpassword" value="">
                                                        </div>
                                                        <div class="form-grp col-md-3">
                                                            <label class="">New Password</label>
                                                            <input  type="password" name="password" value="">
                                                        </div>
                                                        <div class="form-grp col-md-3">
                                                            <label class="">Confirm Password</label>
                                                            <input  type="password" name="confirmpassword" value="">
                                                        </div>
                                                        <div class="form-grp col-md-3">
                                                            <br>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                        
                                        
                                    </form>
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
        $(document).on('change', '#state', function() {

            var state = $(this).val();
            // console.log(state);
            $.ajax({
                method: "POST",
                url: "<?= base_url('Ajax/getcity') ?>",
                data: {
                    state: state
                },
                success: function(response) {
                    // console.log(response);
                    $('#city').html(response);
                }
            });
        });
    </script>

</body>

</html>