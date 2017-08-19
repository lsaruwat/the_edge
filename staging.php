<?php
include("connect.php");
ini_set('display_errors',1);  error_reporting(E_ALL);

class Page
{
	public $title, $style, $scripts, $header, $content, $footer;
	private $tagline;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function build_top()
    {
        $this->style = trim($this->title);
    	$this->tagline = "<h1>" . $this->title . "</h1>";
    	$this->header = "<html><head><title>". $this->title ."</title><link rel='stylesheet' href='".$this->style.".css'></head><body>" . $this->tagline;
    	echo $this->header;
        echo $this->title;
        echo $this->style;
    }

    public function build_bottom()
    {
        $this->footer = "</body></html>";
        echo $this->footer;
    }

}


class Database
{
    private $conn, $db, $credentials, $table, $row, $collumn, $sql;

    function __construct($db)
    {
        $this->db = $db;
    }

    function connect($credentials)
    {
        $this->credentials = $credentials;
        $this->conn = new PDO('mysql:host=localhost; dbname='.$this->db, $this->credentials[0], $this->credentials[1]);
    }
/*
    function query($sql)
    {
        $this->sql = $sql;
        "SELECT money FROM users WHERE username = :username";
        $psql=$conn->prepare($sql);
        $psql->execute(array(":username"=>$_SESSION['username']));
        $row= $psql->fetch();
    }
*/

}


?>

