<?php

class Event {

    private $con;

    private $no;
    private $id;
    private $title;
    private $description;
    private $startDate;
    private $startTime;
    private $endDate;
    private $endtime;
    private $location;
    private $host_name;
    private $host_contact;
    private $image;
    private $ranking;
    private $featured;
    private $date_created;


    public function __construct($con , $id) {
        $this->con = $con;

        $sql_query = "SELECT `no`, `id`, `title`, `description`, `startDate`, `startTime`, `endDate`, `endtime`, `location`, `host_name`, `host_contact`, `image`, `ranking`, `featured`, `date_created` FROM `events` WHERE id='$id'";

        $query = mysqli_query($this->con, $sql_query);


        if(mysqli_num_rows($query) == 0){
            $this->id = null;
            return false;
        }

        else {

            $mysqliData = mysqli_fetch_array($query);

            $this->no = $mysqliData['no'];
            $this->id = $mysqliData['id'];
            $this->title = $mysqliData['title'];
            $this->description = $mysqliData['description'];
            $this->startDate = $mysqliData['startDate'];
            $this->startTime = $mysqliData['startTime'];
            $this->endDate = $mysqliData['endDate'];
            $this->endtime = $mysqliData['endtime'];
            $this->location = $mysqliData['location'];
            $this->host_name = $mysqliData['host_name'];
            $this->host_contact = $mysqliData['host_contact'];
            $this->image = $mysqliData['image'];
            $this->ranking = $mysqliData['ranking'];
            $this->featured = $mysqliData['featured'];
            $this->date_created = $mysqliData['date_created'];

            return true;
        }


    }

    /**
     * @return mixed
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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
    public function getStartDate()
    {
        $php_date = strtotime($this->startDate);
        return date('d/M/Y', $php_date);
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return date("g:i A", strtotime($this->startTime));
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        $php_date = strtotime($this->endDate);
        return date('d/M/Y', $php_date);
    }

    /**
     * @return mixed
     */
    public function getEndtime()
    {
        return date("g:i A", strtotime($this->endtime));

    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getHostName()
    {
        return $this->host_name;
    }

    /**
     * @return mixed
     */
    public function getHostContact()
    {
        return $this->host_contact;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * @return mixed
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {

        $php_date = strtotime($this->date_created);
        $mysql_date = date('d/M/Y', $php_date);

        return $mysql_date;
    }









}

?>