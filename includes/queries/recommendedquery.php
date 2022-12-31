<?php


$recentSongIds = array();

$most_popular_this_week = "SELECT f.songid, s.title, s.genre, g.name, ( SELECT COUNT(DISTINCT f2.userid) FROM frequency f2 WHERE f2.songid = f.songid AND f2.lastPlayed BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() ) as user_count FROM frequency f JOIN songs s ON f.songid = s.id JOIN genres g on s.genre = g.id WHERE f.lastPlayed BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() AND s.tag = 'music' AND s.genre != 3 GROUP BY f.songid  ORDER BY user_count DESC, f.lastPlayed DESC LIMIT 40";

$topchart = mysqli_query($con, $most_popular_this_week);


while ($row = mysqli_fetch_array($topchart)) {

    array_push($recentSongIds, $row['songid']);
}