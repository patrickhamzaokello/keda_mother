<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Only execute the code if the request is an AJAX request
    // Load the required files and classes
    require "includes/config.php";
    // Only include necessary class files
    $class_files = [
        'User' => 'includes/classes/User.php',
        'Artist' => 'includes/classes/Artist.php',
        'Album' => 'includes/classes/Album.php',
        'Genre' => 'includes/classes/Genre.php',
        'Song' => 'includes/classes/Song.php',
        'Playlist' => 'includes/classes/Playlist.php',
        'SharedPlaylist' => 'includes/classes/SharedPlaylist.php',
        'Shared' => 'includes/classes/Shared.php',
        'LikedSong' => 'includes/classes/LikedSong.php',
    ];

    foreach ($class_files as $class_name => $file_path) {
        if (class_exists($class_name)) {
            continue;
        }
        require $file_path;
    }

    // Connect to the database
    $db = new Database();
    $con = $db->getConnString();

    // Set default values for the user variables
    $username = 'Guest';
    $userId = null;
    $userrole = null;
    $userRegstatus = "trial";

    // Check if the user is logged in
    if (isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn'] !== null) {
        // User is logged in via session
        $sessionUsername = $_SESSION['userLoggedIn'];
    } elseif (isset($_COOKIE['userID']) && $_COOKIE['userID'] !== null) {
        // User is logged in via cookie
        $sessionUsername = $_COOKIE['userID'];
    }

    if (isset($sessionUsername)) {
        // User is logged in, create a User object and retrieve user data
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