<?php

class LikedSong
{

    private $con;
    private $id;
    private $songId;
    private $user_ID_type;



    public function __construct($con, $userID)
    {
        $this->con = $con;
        $this->user_ID_type = $userID;

        $query = mysqli_query($this->con, "SELECT * FROM likedsongs WHERE userID='$this->user_ID_type' ORDER BY `likedsongs`.`dateAdded` DESC");

        if (mysqli_num_rows($query) == 0) {
           
            $this->id = null;
            $this->songId = null;
            $this->user_ID_type = null;
            $this->songorder = null;

        }

        $likedsong = mysqli_fetch_array($query);

        $this->id = $likedsong['id'];
        $this->songId = $likedsong['songId'];
        $this->user_ID_type = $likedsong['userID'];
    }


    public function getOwner()
    {
        return $this->user_ID_type;
    }

    public function getSongorder()
    {

        return $this->songorder;
    }



    public function getNumberOfSongs()
    {
        $query = mysqli_query($this->con, "SELECT DISTINCT songId  FROM likedsongs WHERE userID='$this->user_ID_type'");
        return mysqli_num_rows($query);
    }

    public function getSongIds()
    {
        $query = mysqli_query($this->con, "SELECT DISTINCT songId FROM likedsongs WHERE userID='$this->user_ID_type' ORDER BY `likedsongs`.`dateAdded` DESC");

        $array = array();

        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['songId']);
        }

        return $array;
    }



    public function getArtistYouFollow()
    {
        $query = mysqli_query($this->con, "SELECT DISTINCT artistid FROM artistfollowing WHERE userid='$this->user_ID_type' ORDER BY datefollowed DESC");
        $array = array();

        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['artistid']);
        }

        return $array;
    }

    public function getRecentAlbumId()
    {

        $query = "SELECT a.id FROM artistfollowing af INNER JOIN albums a ON af.artistid = a.artist WHERE af.userid = ? AND a.tag = 'music' AND datecreated > DATE_SUB(NOW(), INTERVAL 14 DAY) ORDER BY a.datecreated DESC, a.artist LIMIT 20;";
        $stmt = mysqli_prepare($this->con, $query);
        mysqli_stmt_bind_param($stmt, "s", $this->user_ID_type);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        $albumidarray = array();
        while (mysqli_stmt_fetch($stmt)) {
            $albumidarray[] = $id;
        }
        mysqli_stmt_close($stmt);
        return array_unique($albumidarray);
    }
}
