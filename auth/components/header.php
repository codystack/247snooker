<?php
//Connect Database
include ('config/db.php');

session_start();
if (!isset($_SESSION['email'])) {
    header('location: ./');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="webify.com.ng">
	<meta name="description" content="You will appreciate our warm and welcoming atmosphere the moment you walk in! At 24/7 Snooker Spot Ball we provide our members with an array of different activities from pool, to chess and the best of snooker; we have it all to offer.">
    <meta name="keywords" content="Port Harcourt, PH, Pitakwa, Ediz, Ediz Winebar, Snooker, Snooker Lounge, Snooker in Port Harcourt, Snooker in Nigeria, Edwin Okolie, CEO, Afro Chao, Rivers State">

    <link rel="shortcut icon" href="./assets/images/247Favicon.png" type="image/x-icon" />

    <link href="assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
    <link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>24/7 Snooker&trade;</title>
</head>

<body>