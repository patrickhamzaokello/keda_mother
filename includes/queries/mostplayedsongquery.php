<?php

$userId = $userId;

$recentSongIds = array();


$resetMonthPlays = mysqli_query($con, "UPDATE frequency SET playsmonth=0 WHERE userid='$userId' AND dateAdded < DATE_ADD(NOW(), INTERVAL -6 DAY)");

$recentlyPlayedsongs = mysqli_query($con, "SELECT  songid FROM frequency WHERE userid='$userId' ORDER BY plays DESC LIMIT 20");

while ($row = mysqli_fetch_array($recentlyPlayedsongs)) {

    array_push($recentSongIds, $row['songid']);

}



?>