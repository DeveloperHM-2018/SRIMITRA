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
                                    <h3 class="widget-title">Register <span> here</span></h3>
                                    <p>
                                        <?php
                                        if ($this->session->has_userdata('loginmsg')) {
                                            echo $this->session->userdata('loginmsg');
                                            $this->session->unset_userdata('loginmsg');
                                        }
                                        ?>
                                    </p>
                                    <form action="<?= base_url('Index/register') ?>" method="post" class="login-form">
                                        <div class="row">
                                            <div class="col-md-12 hideit">
                                                <div class="form-grp m-1">
                                                    <label for="userName">Name <span>*</span></label>
                                                    <input type="text" class="form-control" name="name" id="fullname" placeholder="Name:" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 hideit">
                                                <div class="form-grp m-1">
                                                    <label for="email">Email <span>*</span></label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email:" value=" " required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 hideit">
                                                <div class="form-grp m-1">
                                                    <label for="phone">Contact No.</label>
                                                    <input class="form-control" name="number" id="loginnumber" placeholder="Phone Number" required="" maxlength="10">
                                                    <span id="otploginmsg" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 hideit">
                                                <div class="form-grp m-1">
                                                    <label for="phone">Passport / PAN no.</label>
                                                    <input class="form-control" name="pass_pan" placeholder="Passport / PAN no." id="pass_pan" maxlength="10">
                                                    This information is required to verify identity of Indian Resident
                                                    <!-- <span id="mainphon"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-12 hideit">
                                                <input required="" type="checkbox"> I agree with the Srimitra India <a href="<?= base_url('Index/privacy_policy') ?>">privacy policy</a>.
                                                <!-- <span id="mainphon"></span> -->
                                                <br>
                                                <input required="" type="checkbox"> I am an Indian Citizen.<br>
                                            </div>
                                        </div>
                                        <div class="form-group form-grp col-sm-12 otp" style="display: none;">
                                            <label>Enter OTP</label>
                                            <input type="text" id="verificationCode" placeholder="Enter verification code" class="form-control">
                                            <a href="#" onclick="resend();">Resend OTP</a>
                                        </div>
                                        <div class="form-group form-grp col-sm-12">
                                            <!--<input type="submit" value="Login"  class="btn blue-btn">-->
                                            <div id="recaptcha-container"></div>

                                            <span id="g-recaptcha-error" class="text-danger"></span>
                                        </div>
                                        <div class="form-grp col-sm-12 text-center m-0">
                                            <button type="button" onclick="codeverify();" class="btn blue-btn otp" style="display: none;">Verify code</button>
                                            <button type="button" class="btn blue-btn hideit" onclick="phoneAuth();">Join Srimitra</button>
                                            <br>
                                            <a href="<?= base_url('Index/forget_password') ?>" class="text-center"> Forget password ?? </a>
                                        </div>
                                        <!-- <button class="btn btn-block" type="submit">Join Srimitra</button> -->

                                    </form>
                                    <p class="text-center m-0"><span class="or">OR</span>
                                    <h6 class="text-center">Know more about our services and your contribution impact joined us today.</h6>
                                    </p>
                                    <ul class="action text-center">
                                        <li class="text-center">
                                            <!-- <button href="javascript:void(0)" data-toggle="modal" data-target="#REGModal" class="btn blue-btn">Register With Us</button> -->

                                            <a href="<?= base_url('Index/register') ?>" class="btn blue-btn">Register With Us</a>

                                            <a class="btn  btn-info  m-2 savecart pink-btn" id="savecart" style="display:none">Proceed as guest</a>
                                        </li><br>
                                    </ul>
                                    <div></div>
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
            var fullname = document.getElementById('fullname').value;
            var email = document.getElementById('email').value;
            var pass_pan = document.getElementById('pass_pan').value;
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
                        url: "<?= base_url('Ajax/register') ?>",
                        data: {
                            number: ch_number,
                            name: fullname,
                            email: email,
                            pass_pan: pass_pan
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == '1' || response == '4') {
                                //it takes two parameter first one is number and second one is recaptcha
                                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                                    //s is in lowercase
                                    window.confirmationResult = confirmationResult;
                                    coderesult = confirmationResult;
                                    console.log(coderesult);
                                    if (response == '1') {
                                    alert("You have registered successfully. Enter OTP sent to your mobile for login ");
                                    }else if (response == '4') {
                                        alert("You are already a member. Enter OTP sent to your mobile for login ");
                                    }
                                    $('.otp').show();
                                    $('#number').attr('readonly', true);
                                    $('.hideit').hide();
                                    $('#otploginmsg').text('');
                                    $('#g-recaptcha-error').text('');
                                }).catch(function(error) {
                                    alert(error.message);
                                });
                            } else if (response == '0') {
                                $('#otploginmsg').text('Invalid Contact no. Contact no. should be of 10 digit');
                            } else if (response == '2') {
                                $('#otploginmsg').text('Mail ID Already registered');
                            } else if (response == '3') {
                                $('#otploginmsg').text('Your account is been blocked with multiple  mail ID');
                            } else if (response == '4') {
                                $('#otploginmsg').text('Contact no.asd Already registered');
                            } else if (response == '5') {
                                $('#otploginmsg').text('Your account is been blocked with with multiple contact no.');
                            } else {
                                $('#otploginmsg').text('Contact no. Already registered');
                            }
                        }
                    });
                }
            }
        }

        function resend() {
            //get the number
            var number = '+91' + document.getElementById('loginnumber').value;
            var ch_number = document.getElementById('loginnumber').value;
            if (ch_number === '') {
                $('#otploginmsg').text('Contact no required');
            } else {

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Ajax/register') ?>",
                    data: {
                        number: ch_number
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
                // console.log(user);
                window.location.href = "<?= base_url('Ajax/user_redirect') ?>";
            }).catch(function(error) {
                alert(error.message);
            });
        }
    </script>

</body>

</html>