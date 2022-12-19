<?php
$track_id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

// Build the API endpoint URL
$api_url = 'https://shop.mwonyaa.com/Requests/endpoints/singleTrack';
$api_url .= '?trackID=' . urlencode($track_id);

// Make the API request
$response = @file_get_contents($api_url);

if ($response !== false) {
    // request was successful
    // do something with the contents of the URL
    // Decode the JSON response and Return associative array
    $response_data = json_decode($response, true);

    $id = $response_data['id'];
    $title = $response_data['title'];
    $artist = $response_data['artist'];
    $artistID = $response_data['artistID'];
    $album = $response_data['album'];
    $albumID = $response_data['albumID'];
    $artworkPath = $response_data['artworkPath'];
    $genreID = $response_data['genreID'];
    $duration = $response_data['duration'];
    $path = $response_data['path'];
    $totalplays = $response_data['totalplays'];
    $weeklyplays = $response_data['weeklyplays'];

// Print the lyrics
    echo $id;
} else {
    // request was not successful
    // handle the error

    echo "notSuccessful";
}


?>