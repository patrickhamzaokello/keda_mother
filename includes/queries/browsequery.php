<?php

$dataArrays = [
    'publicplaylistsarray' => [],
    'curatedplaylist' => [],
    'featuredartists' => [],
    'albumsarray' => [],
    'podcastsarray' => [],
    'poemsarray' => [],
    'djmixesarray' => []
];

$queries = [
    'publicplaylistsarray' => "SELECT * FROM playlists WHERE status = 1 AND featuredplaylist ='yes' ORDER BY RAND() LIMIT 20",
    'curatedplaylist' => "SELECT * FROM curatedplaylist WHERE expirystate = 0 LIMIT 20",
    'featuredartists' => "SELECT * FROM artists WHERE tag = \"music\" AND featured = 1 ORDER BY RAND() LIMIT 20",
    'albumsarray' => "SELECT * FROM albums WHERE tag = \"music\" AND featured = 1 ORDER BY RAND() LIMIT 20",
    'podcastsarray' => "SELECT * FROM albums WHERE tag = \"podcast\" GROUP BY artist  ORDER BY datecreated DESC LIMIT 20",
    'poemsarray' => "SELECT * FROM albums WHERE tag = \"poem\" GROUP BY artist  ORDER BY datecreated DESC LIMIT 20",
    'djmixesarray' => "SELECT * FROM albums WHERE tag = \"dj\" GROUP BY artist  ORDER BY datecreated DESC LIMIT 20"
];

$stmt = mysqli_stmt_init($con);

foreach ($queries as $arrayName => $query) {
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_array($result)) {
            array_push($dataArrays[$arrayName], $row);
        }
    }
}

mysqli_stmt_close($stmt);