<?php
class User
{

	private $con;
	private $username;

	public function __construct($con, $username)
	{
		$this->con = $con;
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getEmail()
	{
        $query = "SELECT email FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $email);
            mysqli_stmt_fetch($stmt);
            return $email;
        }
	}

	public function getcheckuser(){
		$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$this->username'");
		if (mysqli_num_rows($query) != 0) {
			return true;
		}
	}


	public function getUsernameemail()
	{
		$query = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $username);
            mysqli_stmt_fetch($stmt);
            return $username;
        }
	}



	public function getFirstAndLastName()
	{

        $query = "SELECT concat(firstName, ' ', lastName) as 'name' FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $name);
            mysqli_stmt_fetch($stmt);
            return $name;
        }
	}

	public function getUserId()
	{

        $query = "SELECT id FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id);
            mysqli_stmt_fetch($stmt);
            return $id;
        }
	}

	public function getuserCoverimage(){
	    $query = "SELECT profilePic FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $profilePic);
            mysqli_stmt_fetch($stmt);
            return $profilePic;
        }

	}

	public function getPoints()
	{
        $query = "SELECT points FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $points);
            mysqli_stmt_fetch($stmt);
            return $points;
        }
	}

	public function getUserrole(){
		$query = "SELECT mwRole FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $mwRole);
            mysqli_stmt_fetch($stmt);
            return $mwRole;
        }
	}

	public function getUserStatus(){
	    $query = "SELECT status FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($this->con);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $this->username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $status);
            mysqli_stmt_fetch($stmt);
            return $status;
        }
	}
}