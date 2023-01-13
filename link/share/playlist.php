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

      $playlist = new Playlist($con, $track_id);
      $playlist_id = $playlist->getId();
      $playlist_name = $playlist->getName();
      $playlist_image = $playlist->getCoverimage();
      $playlist_owner = "Mwonya";
      $playlist_description = $playlist->getDescription();
      $playlist_date = $playlist->getDateCreated();
      $playlist_featured = $playlist->getFeaturedplaylist();
      $playlist_noTracks = $playlist->getNumberOfSongs();



      ?>

      <?php if ($playlist_id != null) : ?>
          <title><?= $playlist_name ?> - Playlist</title>
          <meta property="og:locale" content="en_US">
          <meta property="og:type" content="article">
          <meta property="og:title" content="<?= $playlist_name ?> - Playlist">
          <meta property="og:description" content="Featuring - <?= $playlist_noTracks ?> tracks - <?= $playlist_description ?>. Stream on demand at Mwonya">
          <meta property="og:url" content="https://mwonya.com/playlist?id=<?= $playlist_id ?>">
          <meta property="og:site_name" content="Mwonya Music">
          <meta property="article:published_time" content="<?= $playlist_date ?>">
          <meta property="article:modified_time" content="<?= $playlist_date ?>">
          <meta property="og:update_time" content="<?= $playlist_date ?>">
          <meta property="og:image" content="<?= $playlist_image ?>">
          <meta property="og:image:secure_url" content="<?= $playlist_image ?>">
          <meta property="og:image:width" content="300">
          <meta property="og:image:height" content="300">
          <meta property="og:image:alt" content="<?= $playlist_name ?> - playlist">
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
            src="<?=$playlist_image ?>"
            alt="<?=$playlist_name ?>"
            class="product-img"
          />
          <a href="https://mwonya.com/playlist?id=<?= $playlist_id ?>" target="_blank" class="view_on">View on Mwonya</a>
        </div>

        <div class="description">

          <h1 class="col_title"><?= $playlist_name ?></h1>
          <p><?=$playlist_description ?></p>
            <div class="songviewshareaction">
                <a class="downloadbtn" href="https://play.google.com/store/apps/details?id=com.pkasemer.mwonyaa" target="_blank">Download The Mwonya App</a>
            </div>

          <div class="details_box">
            <span class="details"><i class="bx bx-user iconLable"></i><?=$playlist_owner ?></span>
            <span class="details"><i class="bx bx-music iconLable"></i><?=$playlist_noTracks ?></span>
            <span class="details"><i class="bx bxl-deezer iconLable"></i><?=$playlist_featured ?></span>
            <span class="details"><i class='bx bx-calendar iconLable'></i><?=$playlist_date?></span>


          </div>
       
        </div>
        
      </div>
    </section>

    <script src="../Assets/main.js"></script>
  </body>
</html>
