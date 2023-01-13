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
      $collection_id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

      $album = new Album($con, $collection_id);
      $album_id = $album->getId();
      $album_title = $album->getTitle();
      $album_artist_name = $album->getArtist()->getName();
      $album_genre = $album->getGenre()->getGenre();
      $album_date = $album->getDatecreated();
      $album_no_tracks = $album->getNumberOfSongs();
      $album_artwork = $album->getArtworkPath();
      $album_description = $album->getDescription();
      $album_type = $album->getType();
      $album_featured = $album->getFeatured();
      $album_tag = $album->getTag();

      ?>

      <?php if ($album_title != null) : ?>
          <title><?= $album_title ?> - <?= $album_artist_name ?></title>
          <meta property="og:locale" content="en_US">
          <meta property="og:type" content="article">
          <meta property="og:title" content="<?= $album_title ?>">
          <meta property="og:description" content="<?= $album_artist_name ?> - <?= $album_no_tracks ?> tracks - <?= $album_date ?>. Stream this on demand at Mwonya">
          <meta property="og:url" content="https://mwonya.com/album?id=<?= $album_id ?>">
          <meta property="og:site_name" content="Mwonya Music">
          <meta property="article:published_time" content="<?= $album_date ?>">
          <meta property="article:modified_time" content="<?= $album_date ?>">
          <meta property="og:update_time" content="<?= $album_date ?>">
          <meta property="og:image" content="<?= $album_artwork ?>">
          <meta property="og:image:secure_url" content="<?= $album_artwork ?>">
          <meta property="og:image:width" content="300">
          <meta property="og:image:height" content="300">
          <meta property="og:image:alt" content="<?= $album_title ?> - <?= $album_artist_name ?>">
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
            src="<?=$album_artwork ?>"
            alt="<?=$album_title ?>"
            class="product-img"
          />
          <a href="https://mwonya.com/album?id=<?= $album_id ?>" target="_blank" class="view_on">View on Mwonya</a>
        </div>

        <div class="description">

          <h1 class="col_title"><?= $album_title ?></h1>
          <p><?=$album_description ?></p>
            <div class="songviewshareaction">
                <a class="downloadbtn" href="https://play.google.com/store/apps/details?id=com.pkasemer.mwonyaa" target="_blank">Download The Mwonya App</a>
            </div>

          <div class="details_box">
            <span class="details"><i class="bx bx-user iconLable"></i><?=$album_artist_name ?></span>
            <span class="details"><i class="bx bx-music iconLable"></i><?=$album_genre ?></span>
            <span class="details"><i class="bx bxl-deezer iconLable"></i><?=$album_tag ?></span>
            <span class="details"><i class='bx bx-calendar iconLable'></i><?=$album_date?></span>
            <span class="details"><i class='bx bx-signal-4 iconLable'></i><?=$album_no_tracks?></span>
            <span class="details"><i class='bx bx-popsicle iconLable'></i><?=$album_featured ?></span>
            <span class="details"><i class='bx bx-folder iconLable'></i><?=$album_type ?></span>
  
          </div>
       
        </div>
        
      </div>
    </section>

    <script src="../Assets/main.js"></script>
  </body>
</html>
