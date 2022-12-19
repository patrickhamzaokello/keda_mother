<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require "includes/config.php";
    require "includes/classes/User.php";
    require "includes/classes/Artist.php";
    require "includes/classes/Album.php";
    require "includes/classes/Genre.php";
    require "includes/classes/Song.php";
    require "includes/classes/Playlist.php";
    require "includes/classes/SharedPlaylist.php";
    require "includes/classes/Shared.php";
    require "includes/classes/LikedSong.php";

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

} else {
    include("includes/header.php");
    include("includes/footer.php");

    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();
}
