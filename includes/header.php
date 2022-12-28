<?php
require "includes/config.php";
require "includes/classes/User.php";
require "includes/classes/Artist.php";
require "includes/classes/Album.php";
require "includes/classes/Song.php";


$db = new Database();
$con = $db->getConnString();


$username = 'Guest';
$userId = null;
$userrole = null;
$userRegstatus = "trial";

if (isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn'] !== null) {
    $sessionUsername = $_SESSION['userLoggedIn'];
} elseif (isset($_COOKIE['userID']) && $_COOKIE['userID'] !== null) {
    $sessionUsername = $_COOKIE['userID'];
}

if (isset($sessionUsername)) {
    $userLoggedIn = new User($con, $sessionUsername);
    if ($userLoggedIn->getcheckuser()) {
        $username = $userLoggedIn->getUsername();
        $userId = $userLoggedIn->getUserId();
        $userrole = $userLoggedIn->getUserrole();
        $userRegstatus = $userLoggedIn->getUserStatus();
    }
}

echo "<script>userLoggedIn = '$username'; isRegistered = '$userRegstatus'; currentuser = '$userId';</script>";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YNG3P75VXH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-YNG3P75VXH');
    </script>

    <!-- <script data-ad-client="ca-pub-7169073185899705" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Mwonya Stream</title>

    <!-- favicon -->
    <meta name="theme-color" content="#381b56" />
    <link rel="shortcut icon" href="https://artist.mwonyaa.com/assets/favicon/favicon.ico">
    <meta name="msapplication-config" content="https://artist.mwonyaa.com/assets/favicon/browserconfig.xml">
    <link rel="apple-touch-icon" sizes="57x57" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://artist.mwonyaa.com/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://artist.mwonyaa.com/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://artist.mwonyaa.com/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://artist.mwonyaa.com/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://artist.mwonyaa.com/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://artist.mwonyaa.com/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://artist.mwonyaa.com/assets/favicon/ms-icon-144x144.png">


    <!-- favicon end  -->



<!--    metatags-->

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Mwonya: African Entertainment">
    <meta property="og:description" content="Mwonya Platform provides Music, Live Radio, Podcasts,Dj Mixes and Poems All available on the go and at your demand.">
    <meta property="og:url" content="https://www.mwonya.com/">
    <meta property="og:site_name" content="Mwonya Music">
    <meta property="article:published_time" content="02 Dec 2022">
    <meta property="article:modified_time" content="02 Dec 2022">
    <meta property="og:update_time" content="Mwonya Music">
    <meta property="og:image" content="https://mwonya.com/staticFiles/meta_og_image.png">
    <meta property="og:image:secure_url" content="https://mwonya.com/staticFiles/meta_og_image.png">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:image:alt" content="Mwonya logo">
<!--    metatagsend-->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900'
          rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.css'>

    <link rel="stylesheet" href="staticFiles/css/style.css">
    <!-- <link rel="stylesheet" href="https://d1d1i04hu392ot.cloudfront.net/staticFiles/css/style.css"> -->

    <script
            src="https://code.jquery.com/jquery-3.6.2.min.js"
            integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
            crossorigin="anonymous"></script>
    <script src="staticFiles/js/MainScript.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <!-- <script src="https://unpkg.com/wavesurfer.js"></script> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js"
            integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw_cache_mwonyaa_site.js')
                .then(function() {
                    console.log('Service worker registered!');
                })
                .catch(function(error) {
                    console.error('Error registering service worker:', error);
                });
        } else {
            navigator.serviceWorker.register('/sw_cache_mwonyaa_site.js')
                .then(function() {
                    console.log('Service worker registered!');
                })
                .catch(function(error) {
                    console.error('Error registering service worker:', error);
                });
        }
    </script>



</head>

<body>


<?php

include("includes/headingContainer.php");

?>

<section class="content">

    <?php

    include("includes/navBarContainer.php");

    ?>

    <div class="content__middle">
        <div class="loadercentered">
            <div class="lds-facebook">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="showdialogbox">
            <!-- alertmessage -->
        </div>
        <div class="artist wholecontent is-verified d-none" id="mainContent">