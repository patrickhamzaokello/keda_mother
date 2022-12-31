<?php


$recentSongIds = array();


$sql_query = "SELECT f.songid, s.title, s.genre, s.tag,g.name, SUM(f.playsmonth) as total_plays FROM frequency f JOIN songs s ON f.songid = s.id JOIN genres g on s.genre = g.id WHERE f.lastPlayed BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() AND s.tag = 'music' AND s.genre != 3 GROUP BY f.songid ORDER BY total_plays DESC , f.lastPlayed DESC  LIMIT 20";
$topchart = mysqli_query($con, $sql_query);


while ($row = mysqli_fetch_array($topchart)) {

    array_push($recentSongIds, $row['songid']);
}