<?php
require "config.php";
require "classes/User.php";
// require "classes/Artist.php";
// require "classes/Album.php";
// require "classes/Song.php";
if (isset($_GET['id'])) {
    $artistId =  $_GET['id'];
} else {
      header("Location:index");
}

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



$followingquery = mysqli_query($con, "SELECT * FROM artistfollowing WHERE artistid='$artistId' AND userid='$userId'");
if (mysqli_num_rows($followingquery) == 0) {
    echo "<button id='MyButton' class='button-light followbutton' onclick='followArtist(\"".$artistId."\",\"".$userId."\",0)'>Follow</button>";
} else {
    echo "<button id='MyButton' class='button-light unfollowbutton' onclick='followArtist(\"".$artistId."\",\"".$userId."\",1)'>UnFollow</button>";
}



?>