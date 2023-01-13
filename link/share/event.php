<?php

//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../Assets/style.css"/>
    <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
    />

    <?php
    require "../shareInclude.php";
    $page_event_id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

    $event = new Event($con, $page_event_id);
    $event_no = $event->getNo();
    $event_id = $event->getId();
    $title = $event->getTitle();
    $description = $event->getDescription();
    $startDate = $event->getStartDate();
    $startTime = $event->getStartTime();
    $endDate = $event->getEndDate();
    $endTime = $event->getEndtime();
    $location = $event->getLocation();
    $host_name = $event->getHostName();
    $host_contact = $event->getHostContact();
    $image = $event->getImage();
    $ranking = $event->getRanking();
    $featured = $event->getFeatured();
    $date_created = $event->getDateCreated();


    ?>

    <?php if ($event_id != null) : ?>
        <title><?= $title ?> - <?= $startDate ?> - <?= $startTime ?> </title>
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?= $title ?> - <?= $startDate ?> - <?= $startTime ?>">
        <meta property="og:description"
              content="Follow this link for more details about this event hosted by - <?= $host_name ?>, Scheduled to take place on  Date - <?= $startDate ?> and Time - <?= $startTime ?> ">
        <meta property="og:url" content="https://mwonya.com/event?id=<?= $event_id ?>">
        <meta property="og:site_name" content="Mwonya Music">
        <meta property="article:published_time" content="<?= $date_created ?>">
        <meta property="article:modified_time" content="<?= $date_created ?>">
        <meta property="og:update_time" content="<?= $date_created ?>">
        <meta property="og:image" content="<?= $image ?>">
        <meta property="og:image:secure_url" content="<?= $image ?>">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">
        <meta property="og:image:alt" content="<?= $title ?> - <?= $title ?>">
    <?php else : ?>
        <title>Mwonya</title>
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Mwonya: African Entertainment">
        <meta property="og:description"
              content="Mwonya Platform provides Music, Live Radio, Podcasts,Dj Mixes and Poems All available on the go and at your demand.">
        <meta property="og:url" content="https://mwonya.com/">
        <meta property="og:site_name" content="Mwonya Music">
        <meta property="article:published_time" content="02 Dec 2023">
        <meta property="article:modified_time" content="02 Dec 2023">
        <meta property="og:update_time" content="Mwonya Music">
        <meta property="og:image" content="mwonya logo">
        <meta property="og:image:secure_url" content="mwonya logo">
        <meta property="og:image:width" content="250">
        <meta property="og:image:height" content="250">
        <meta property="og:image:alt" content="Mwonya logo">
    <?php endif ?>
</head>
<body>
<header>
    <div class="nav container">
        <a href="#" class="logo">Mwonya Stream</a>
        <i class="bx bx-menu" id="cart-icon"> </i>
        <div class="cart">


            <div class="cart-content">

            </div>


            <i class="bx bx-x" id="close-cart"></i>
        </div>
    </div>
</header>

<section class="shop container">


    <!-- content -->
    <div class="shop-contenr">
        <div class="product-box">
            <img
                    src="<?= $image ?>"
                    alt="<?= $title ?>"
                    class="product-img"
            />
            <a href="https://mwonya.com/event?id=<?= $event_id ?>" target="_blank" class="view_on">View on
                Mwonya</a>
        </div>

        <div class="description">

            <h1 class="col_title"><?= $title ?></h1>
            <p><?= $description ?></p>
            <div class="songviewshareaction">
                <a class="downloadbtn" href="https://play.google.com/store/apps/details?id=com.pkasemer.mwonyaa"
                   target="_blank">Download The Mwonya App</a>
            </div>

            <div class="details_box">
                <span class="details"><i class="bx bx-user iconLable"></i>Host: <?= $host_name ?></span>
                <span class="details"><i class="bx bx-phone iconLable"></i>Contact: <?= $host_contact ?></span>
                <span class="details"><i class='bx bx-map iconLable'></i>Location: <?= $location ?></span>
                <span class="details"><i class="bx bx-calendar iconLable"></i>Date: <?= $startDate ?></span>
                <span class="details"><i class='bx bx-time-five iconLable'></i>Time: <?= $startTime ?></span>
                <span class="details"><i class='bx bx-check-shield iconLable'></i>Yes</span>

            </div>

        </div>

    </div>
</section>

<script src="../Assets/main.js"></script>
</body>
</html>
