<?php
include("connect.php");
ini_set('display_errors',1);  error_reporting(E_ALL);

class Page
{
	protected $title, $styles, $scripts, $header, $content, $footer, $styleDir, $jsDir;
	private $tagline;

    public function __construct($title)
    {
        $this->title = $title;
        $this->styles = "";
        $this->scripts = "";
        $this->styleDir = "css/";
        $this->jsDir = "js/";
    }

    function addCss($css)
    {
        $this->styles.="<link rel='stylesheet' href='" . $this->styleDir . $css . "'>";
    }

    function addJs($js)
    {
        $this->scripts.="<script type='text/javascript' src='" . $this->jsDir . $js . "'></script>";
    }

    function build_top()
    {
        $this->style = trim($this->title);
    	$this->tagline = "<h1>" . $this->title . "</h1>";
    	$this->header = "<html><head><title>". $this->title ."</title>" . $this->styles . $this->scripts . "</head><body>";
    	echo $this->header;
    }

    function build_bottom()
    {
        $this->footer = "</body></html>";
        echo $this->footer;
    }

}

class HomePage extends Page
{
    protected $navItems;

    public function __construct($navItems)
    {
        $this->navItems = $navItems;
        foreach($navItems as $nav)
        {
            $this->navItems  = "<li><a href='$nav.php'>$nav</a></li>";
        }
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

