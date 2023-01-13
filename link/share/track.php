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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Assets/style.css" />
    <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
    />

    <?php
    require "../shareInclude.php";
    $track_id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

    $song = new Song($con, $track_id);
    $artist = $song->getArtist();
    $song_title = $song->getTitle();
    $song_album = $song->getAlbum();
    $song_genre = $song->getGenrelink()->getGenre();
    $song_artist_id = $artist->getId();
    $song_Genre_id = $song->getGenre();
    $song_id = $song->getId();
    $song_path = $song->getPath();

    ?>

    <?php if ($song->getTitle() != null) : ?>
        <title><?= $song->getTitle() ?> - <?= $artist->getName() ?></title>
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?= $song->getTitle() ?>">
        <meta property="og:description" content="<?= $artist->getName() ?> - <?= $song->getTag() ?> - <?= $song->getDateAdded() ?>. Click the link to Listen now on Mwonya Stream">
        <meta property="og:url" content="https://mwonya.com/song?id=<?= $song->getId() ?>">
        <meta property="og:site_name" content="Mwonya Music">
        <meta property="article:published_time" content="<?= $song->getDateAdded() ?>">
        <meta property="article:modified_time" content="<?= $song->getDateAdded() ?>">
        <meta property="og:update_time" content="<?= $song->getDateAdded() ?>">
        <meta property="og:image" content="<?= $song_album->getArtworkPath() ?>">
        <meta property="og:image:secure_url" content="<?= $song_album->getArtworkPath() ?>">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">
        <meta property="og:image:alt" content="<?= $song->getTitle() ?> - <?= $artist->getName() ?>">
    <?php else : ?>
        <title>Mwonya</title>
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Mwonya: African Entertainment">
        <meta property="og:description" content="Mwonya Platform provides Music, Live Radio, Podcasts,Dj Mixes and Poems All available on the go and at your demand.">
        <meta property="og:url" content="https://mwonya.com/">
        <meta property="og:site_name" content="Mwonya Music">
        <meta property="article:published_time" content="02 Dec 2022">
        <meta property="article:modified_time" content="02 Dec 2022">
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
                    src="<?=$song_album->getArtworkPath()?>"
                    alt="<?=$song_title ?>"
                    class="product-img"
            />
            <a href="https://mwonya.com/song?id=<?= $song_id ?>" target="_blank" class="view_on">View on Mwonya</a>
        </div>

        <div class="description">

            <h1 class="col_title"><?= $song_title ?></h1>
            <p><?=$song_album->getTitle()?> - <?=$artist->getName() ?> - <?=$song->getGenrelink()->getGenre() ?> - <?=$song->getTag() ?> - <?=$song->getPlays() ?></p>
            <div class="songviewshareaction">
                <a class="downloadbtn" href="https://play.google.com/store/apps/details?id=com.pkasemer.mwonyaa" target="_blank">Download The Mwonya App</a>
            </div>

            <div class="details_box">
                <span class="details"><i class="bx bx-user iconLable"></i><?=$artist->getName() ?></span>
                <span class="details"><i class='bx bx-signal-4 iconLable'></i><?=$song_album->getTitle()?></span>
                <span class="details"><i class='bx bx-calendar iconLable'></i><?=$song->getDateAdded()?></span>

                <span class="details"><i class='bx bx-folder iconLable'></i><?=$song_album->getType() ?></span>

            </div>

        </div>

    </div>
    <div class="playerView">
        <div class="audio-player">

            <audio id="audio">
                <source src="<?= $song_path ?>" type="audio/mp3">
                <source src="<?= $song_path ?>" type="audio/ogg">
                <source src="<?= $song_path ?>" type="audio/mpeg">
            </audio>

            <div class="player-controls">

                <!-- <div id="radioIcon"></div> -->
                <p class="playtrack_lable">Play Track</p>

                <button id="playAudio"></button>

                <div id="seekObjContainer">
                    <div id="seekObj">
                        <div id="percentage"></div>
                    </div>
                </div>

                <p><small id="currentTime">00:00</small></p>

            </div>
        </div>
    </div>


</section>

<script src="../Assets/main.js"></script>
</body>
</html>
