<?php

$userId = $userId;

$recentSongIds = array();


$recentlyPlayedsongs = mysqli_query($con, "SELECT  songid FROM frequency WHERE userid='$userId' ORDER BY plays DESC LIMIT 20");

while ($row = mysqli_fetch_array($recentlyPlayedsongs)) {

    array_push($recentSongIds, $row['songid']);

}



?>