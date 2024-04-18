<?php
require_once 'pdo.php';
require_once 'pdo2.php';

session_start();
$script_name = $_SERVER['SCRIPT_NAME'];
$pattern = "~(/[\w-]+\.php|/)$~";
$name = '';
if (preg_match($pattern, $script_name, $matches)) {
    $name = trim($matches[1], '/');
}



if ($name != "login.php") {
    if (!isset($_SESSION["food_project_admin_username"])) {
        header("location:login.php");
    }
}


if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:login.php");
}



?>


<head>
    <title>Sweetness Delight</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">

    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nice-select.css">
 
  
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/fonts_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/bootstrap_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/font-aws_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/icon-fonts_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/style_dark.css">



    <!-- <link rel="shortcut icon" type="image/png" href="assets/images/ovalfox/icon.png"> -->
    <link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <link rel="stylesheet" href="assets/css/selectorCustom.css" />

    <?php if ($name == "login.php") {
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/auth.css">

    <?php } ?>

</head>