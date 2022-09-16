<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>.
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
</head>
<body>
    <form action="<?= base_url('Index/login') ?>" method="post" class="login-form" id="login_form2">
        <div class="row">
            <div class="form-group form-grp col-sm-6">
                <label>Mobile No</label>
                <input type="text" id="loginnumber" placeholder="Enter phone number" name="uname" class="form-control" required>
                <span id="otploginmsg" class="text-danger"></span>
            </div>
           
                <div class="form-group form-grp col-sm-6 otp" style="display: none;">
                    <label>Enter OTP</label>
                    <input type="text" id="verificationCode" placeholder="Enter verification code" class="form-control">
                </div>

                
            
            <div class="form-group form-grp col-sm-12">
                <!--<input type="submit" value="Login"  class="btn blue-btn">-->
                <div id="recaptcha-container" class="hideit"></div>
               

                <span id="g-recaptcha-error" class="text-danger"></span>
            </div>
            <!-- <div class="form-grp col-sm-6">
                <label for="username">Contact no. <span>*</span></label>
                <input type="text" class="form-control" name="email" placeholder="Contact no.">
            </div>
            <div class="form-grp col-sm-6">
                <label for="password">Password <span>*</span></label>
                <input type="password" class="form-control" name="password" placeholder="*****">
            </div>
                 -->
            <div class="form-grp col-sm-12 text-center">
                <button type="button" onclick="codeverify();" class="btn blue-btn otp" style="display: none;">Verify code</button>
                <button type="button" class="btn blue-btn hideit" onclick="phoneAuth();">Send Otp</button>
                <br>
                <a href="<?= base_url('Index/forget_password') ?>" class="text-center"> Forget password ?? </a>
            </div>



        </div>
    </form>
 <div id="srecaptcha-container" class="hideit"></div>
</body>
</html><script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
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
<!--<script src="<?= base_url(); ?>assets/js/firebase.js" type="text/javascript"></script>-->
<script>
    // Your web app's Firebase configuration

    window.onload = function() {
        render();
         
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
        window.srecaptchaVerifier = new firebase.auth.RecaptchaVerifier('srecaptcha-container');
        srecaptchaVerifier.render();
         
    }

    // function phoneAuth() {
    //     //get the number
    //     var number = '+91' + document.getElementById('loginnumber').value;
    //     var ch_number = document.getElementById('loginnumber').value;
    //     if (ch_number === '') {
    //         $('#otploginmsg').text('Contact no required');
    //     } else {
    //         var response = grecaptcha.getResponse();
    //         console.log(response);
    //         if (response.length == 0 || response == '') {
    //             document.getElementById('g-recaptcha-error').innerHTML = 'This field is required. ';
    //         } else {
    //             $.ajax({
    //                 method: "POST",
    //                 url: "<?= base_url('Ajax/login') ?>",
    //                 data: {
    //                     contact: ch_number
    //                 },
    //                 success: function(response) {
    //                     console.log(response);
    //                     if (response == '1') {
    //                         //it takes two parameter first one is number and second one is recaptcha
    //                         firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
    //                             //s is in lowercase
    //                             window.confirmationResult = confirmationResult;
    //                             coderesult = confirmationResult;
    //                             console.log(coderesult);
    //                             alert("Enter OTP sent to your mobile");
    //                             $('.otp').show();
    //                             $('#number').attr('readonly', true);
    //                             $('.hideit').hide();
    //                             $('#otploginmsg').text('');
    //                             $('#g-recaptcha-error').text('');
    //                         }).catch(function(error) {
    //                             alert(error.message);
    //                         });
    //                     } else {
    //                         $('#otploginmsg').text('Please register with us to continue');
    //                     }
    //                 }
    //             });
    //         }
    //     }
    // }

    // function codeverify() {
    //     var code = document.getElementById('verificationCode').value;
    //     // alert(code);
    //     var ch_number = document.getElementById('loginnumber').value;
    //     coderesult.confirm(code).then(function(result) {
    //         $.ajax({
    //             method: "POST",
    //             url: "<?= base_url('Ajax/loginsession') ?>",
    //             data: {
    //                 contact: ch_number
    //             },
    //             success: function(response) {}
    //         });
    //         alert("You have login successfully");
    //         var user = result.user;
    //         console.log(user);
    //         window.location.href = "<?= base_url('Ajax/user_redirect') ?>";
    //     }).catch(function(error) {
    //         alert(error.message);
    //     });
    // }
</script>