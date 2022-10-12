<!DOCTYPE html>
<html class="no-js" lang="en">
<?php include('includes/home-head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>
    <main>
        <section class="latest-cars-area gray-lite-bg pt-90 pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-title text-center mb-35">
                            <br>
                        </div>
                    </div>
                </div>
                <div class="latest-cars-wrapper">
                    <div class="row  ">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="widget-title">Log in your <span>account</span></h3>
                                    <p>
                                        <?php
                                        if ($this->session->has_userdata('loginmsg')) {
                                            echo $this->session->userdata('loginmsg');
                                            $this->session->unset_userdata('loginmsg');
                                        }
                                        ?>
                                    </p>
                                    <form action="<?= base_url('Index/login') ?>" method="post" class="login-form" id="login_form2">
                                        <div class="row">
                                            <div class="form-group form-grp col-sm-12">
                                                <label>Mobile No</label>
                                                <input type="text" id="loginnumber" placeholder="Enter phone number" name="uname" class="form-control" value="<?= sessionId('nl_user_contact') ?>" required>
                                                <span id="otploginmsg" class="text-danger"></span>
                                            </div>
                                            <div class="form-group form-grp col-sm-12 otp" style="display: none;">
                                                <label>Enter OTP</label>
                                                <input type="text" id="verificationCode" placeholder="Enter verification code" class="form-control">
                                            </div>
                                            <div class="form-group form-grp col-sm-12">
                                                <!--<input type="submit" value="Login"  class="btn blue-btn">-->
                                                <div id="recaptcha-container" class="hideit"></div>

                                                <span id="g-recaptcha-error" class="text-danger"></span>
                                            </div>
                                            <div class="form-grp col-sm-12 text-center m-0">
                                                <button type="button" onclick="codeverify();" class="btn blue-btn otp" style="display: none;">Verify code</button>
                                                <button type="button" class="btn blue-btn hideit" onclick="phoneAuth();">Send Otp</button>
                                                <br>
                                                <a href="<?= base_url('Index/forget_password') ?>" class="text-center"> Forget password ?? </a>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="text-center m-0"><span class="or">OR</span>
                                    
                                    </p>
                                    <ul class="action text-center">
                                        <li class="text-center">
                                            <!-- <button href="javascript:void(0)" data-toggle="modal" data-target="#REGModal" class="btn blue-btn">Register With Us</button> -->

                                            <a href="<?= base_url('Index/register') ?>" class="btn blue-btn">Register With Us</a>
                                            <?php if ($show == 'yes') {
                                            ?>
                                                <a class="btn  btn-info  m-2   pink-btn" id="guest_id">Proceed as guest</a>
                                            <?php

                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- main-area-end -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-auth.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCzQkopTWOAQwgRAbUWpUMBluZarAVIJOs",
            authDomain: "srimitra-617dd.firebaseapp.com",
            projectId: "srimitra-617dd",
            storageBucket: "srimitra-617dd.appspot.com",
            messagingSenderId: "25614874181",
            appId: "1:25614874181:web:352919fb1891e45741552c",
            measurementId: "G-HVMF7E33R9"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>

    <script>
        // Your web app's Firebase configuration
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function phoneAuth() {
            //get the number
            var number = '+91' + document.getElementById('loginnumber').value;
            var ch_number = document.getElementById('loginnumber').value;
            if (ch_number === '') {
                $('#otploginmsg').text('Contact no required');
            } else {
                var response = grecaptcha.getResponse();
                console.log(response);
                if (response.length == 0 || response == '') {
                    document.getElementById('g-recaptcha-error').innerHTML = 'This field is required. ';
                } else {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('Ajax/login') ?>",
                        data: {
                            contact: ch_number
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == '1') {
                                //it takes two parameter first one is number and second one is recaptcha
                                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                                    //s is in lowercase
                                    window.confirmationResult = confirmationResult;
                                    coderesult = confirmationResult;
                                    console.log(coderesult);
                                    alert("Enter OTP sent to your mobile");
                                    $('.otp').show();
                                    $('#number').attr('readonly', true);
                                    $('.hideit').hide();
                                    $('#otploginmsg').text('');
                                    $('#g-recaptcha-error').text('');
                                }).catch(function(error) {
                                    alert(error.message);
                                });
                            } else {
                                $('#otploginmsg').text('Please register with us to continue');
                            }
                        }
                    });
                }
            }
        }

        function codeverify() {
            var code = document.getElementById('verificationCode').value;
            // alert(code);
            var ch_number = document.getElementById('loginnumber').value;
            coderesult.confirm(code).then(function(result) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Ajax/loginsession') ?>",
                    data: {
                        contact: ch_number
                    },
                    success: function(response) {}
                });
                alert("You have login successfully");
                var user = result.user; 

                window.location.href = "<?= $_SERVER['HTTP_REFERER'] ?>";
            }).catch(function(error) {
                alert(error.message);
            });
        }
        $('#guest_id').click(function() {
            
            $.ajax({
                method: "POST",
                url: "<?= base_url('Ajax/guest_login') ?>", 
                success: function() { 
                    window.location.href = "<?= base_url('Ajax/user_redirect') ?>";
                }
            });
        });
        
    </script>

</body>

</html>