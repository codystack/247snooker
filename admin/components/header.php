<?php
//Connect Database
include ('./config/db.php');

session_start();

if (!isset($_SESSION['email'])) {
    header('location: logout');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: ../");
}

?>
<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <title>247Snooker :: Admin Dashboard</title>
    <link rel="icon" type="image/png" href="assets/img/247Favicon.png">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/utility.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/datatable.css">
    <link rel="stylesheet" href="assets/css/font/fonts.css">
    <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />

    <style>
        @supports (animation: grow .5s cubic-bezier(.25, .25, .25, 1) forwards) {
            .tick {
                stroke-opacity: 0;
                stroke-dasharray: 29px;
                stroke-dashoffset: 29px;
                animation: draw .5s cubic-bezier(.25, .25, .25, 1) forwards;
                animation-delay: .6s
            }

            .circle {
                fill-opacity: 0;
                stroke: #219a00;
                stroke-width: 16px;
                transform-origin: center;
                transform: scale(0);
                animation: grow 1s cubic-bezier(.25, .25, .25, 1.25) forwards;
            }
        }

        @keyframes grow {
            60% {
                transform: scale(.8);
                stroke-width: 4px;
                fill-opacity: 0;
            }
            100% {
                transform: scale(.9);
                stroke-width: 8px;
                fill-opacity: 1;
                fill: #219a00;
            }
        }

        @keyframes draw {
            0%, 100% { stroke-opacity: 1; }
            100% { stroke-dashoffset: 0; }
        }

        .ck-editor__editable {
            min-height: 200px;
        }
    </style>

</head>

<body class="bg-body-tertiary">