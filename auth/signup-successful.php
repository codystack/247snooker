<?php
session_start();

require_once "config/db.php";

if (!isset($_SESSION['email'])) {
    header('location: signup');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['email']);
  header("location: login");
}

?>
<?php
require_once "./auth/account.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="You will appreciate our warm and welcoming atmosphere the moment you walk in! At 24/7 Snooker Spot Ball we provide our members with an array of different activities from pool, to chess and the best of snooker; we have it all to offer.">
    <meta name="keywords" content="Port Harcourt, PH, Pitakwa, Ediz, Ediz Winebar, Snooker, Snooker Lounge, Snooker in Port Harcourt, Snooker in Nigeria, Edwin Okolie, CEO, Afro Chao, Rivers State">
    <meta name="author" content="webify.com.ng"/>
    <link rel="shortcut icon" href="../assets/images/247Favicon.png" type="image/x-icon" />

    <link href="assets/fonts/feather/feather.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Signup :: 24/7 Snooker&trade;</title>
</head>

<style>
    .checkmark {
    width: 150px;
    margin: 0 auto;
    }

    .path {
    stroke-dasharray: 1000;
    stroke-dashoffset: 0;
    animation: dash 2s ease-in-out;
    -webkit-animation: dash 2s ease-in-out;
    }

    .spin {
    animation: spin 2s;
    -webkit-animation: spin 2s;
    transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    }

    /* p {
    font-family: sans-serif;
    color: pink;
    font-size: 30px;
    font-weight: bold;
    margin: 20px auto;
    text-align: center;
    animation: text .5s linear .4s;
    -webkit-animation: text .4s linear .3s;
    } */

    @-webkit-keyframes dash {
    0% {
    stroke-dashoffset: 1000;
    }
    100% {
    stroke-dashoffset: 0;
    }
    }

    @keyframes dash {
    0% {
    stroke-dashoffset: 1000;
    }
    100% {
    stroke-dashoffset: 0;
    }
    }

    @-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
    }
    }

    @keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
    }
    }

    @-webkit-keyframes text {
    0% {
        opacity: 0; }
    100% {
        opacity: 1;
    }

    
    @keyframes text {
    0% {
        opacity: 0; }
    100% {
        opacity: 1;
    }
    }
</style>
<body style="background: url('assets/images/pic1.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">

    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <div class="card bg-white shadow">
                    <div class="card-body p-6">
                        <div class="mb-4 text-center">
                            <a href="./">
                                <img src="assets/images/LogoBlack.svg" class="mb-4" alt="" width="100" />
                            </a>
                            <div class="checkmark">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                                    <path class="path" fill="none" stroke="#0f9372" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                        c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                        c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
                                    <circle class="path" fill="none" stroke="#0f9372" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
                                    <polyline class="path" fill="none" stroke="#0f9372" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
                                        74.1,108.4 48.2,86.4 "/>

                                    <circle class="spin" fill="none" stroke="#0f9372" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
                                </svg>
                            </div>
                            <h2 class="mt-4 mb-3">Registration Successful</h2>
                            <p class="text-dark fw-light fs-3">Hello! <span class="fw-bold"><?php echo $_SESSION['firstName']; ?>,</span> welcome to the tribe, your registration was successful, login to complete registration. </p>
                            <a href="logout" class="text-danger mt-5 fw-bold">Login Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/theme.min.js"></script>
</body>

</html>