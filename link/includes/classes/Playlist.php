<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Playlist
{

	private $con;
	private $id;
	private $name;
	private $owner;
	private $coverart;
    private $description;
    private $dateCreated;
    private $featuredplaylist;




	public function __construct($con, $data)
	{

		if (!is_array($data)) {

			//data is a string
			$query = mysqli_query($con, "SELECT * FROM playlists WHERE id='$data'");
			$data = mysqli_fetch_array($query);
		}

		if ($data) {
			$this->con = $con;
			$this->id = $data['id'];
			$this->name = $data['name'];
			$this->owner = $data['owner'];
			$this->coverart = $data['coverurl'];
			$this->description = $data['description'];
			$this->dateCreated = $data['dateCreated'];
			$this->featuredplaylist = $data['featuredplaylist'];
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getOwner()
	{
		return $this->owner;
	}


	public function getCoverimage()
	{
		return $this->coverart;
	}

	public function checkOwner()
	{
		$query = mysqli_query($this->con, "SELECT id, name FROM playlists WHERE id='$this->id' AND owner='$this->owner'");
		return mysqli_num_rows($query);
	}

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        $phpdate = strtotime($this->dateCreated);
        $mysqldate = date('d/M/Y', $phpdate);

        return $mysqldate;
    }

    /**
     * @return mixed
     */
    public function getFeaturedplaylist()
    {
        if($this->featuredplaylist == "yes"){
            $this->featuredplaylist =   "Public";
        } else {
            $this->featuredplaylist =   "Private";

        }
        return $this->featuredplaylist;

    }






	public function getNumberOfSongs()
	{
		$query = mysqli_query($this->con, "SELECT DISTINCT songId FROM playlistsongs WHERE playlistId='$this->id'");
		return mysqli_num_rows($query);
	}

	public function getSongIds()
	{
		$query = mysqli_query($this->con, "SELECT DISTINCT songId FROM playlistsongs WHERE playlistId='$this->id' ORDER BY playlistOrder ASC");
		$array = array();

		while ($row = mysqli_fetch_array($query)) {
			array_push($array, $row['songId']);
		}

		return $array;
	}

	public static function getPlaylistsDropdown($con, $username)
	{

		$dropdown = '<select class="item playlistname">
							<option value="">Add to Playlist</option>    
						';

		$query = mysqli_query($con, "SELECT id, name FROM playlists WHERE owner='$username'");

		while ($row = mysqli_fetch_array($query)) {
			$id = $row['id'];
			$name = $row['name'];
			$dropdown = $dropdown . "<option value='$id' >$name</option>";
		}

		return $dropdown . "</select>";
	}
}