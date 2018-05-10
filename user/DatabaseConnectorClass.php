<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<?php
Class DababaseConnector{
    var $host='localhost';
    var $username='id5592625_gregariousxx18';
    var $password='Havanaunana';
    var $dbname='id5592625_myphysicaltherapist';
    var $query;
    var $conn;

    function __construct(){

    }
    function setQuery($var){
        $this->query=$var;
    }
    function getConnection(){
        $this->conn= mysqli_connect($this->host, $this->username, $this->password,$this->dbname);
        if (!$this->conn) {

            die("Connection failed" . mysqli_connect_error());
        }else{
           return $this->conn;
        }
    }
    function executeQuery(){
        $returnValue=False;
        $conn = $this->getConnection();
        if (!$conn) {

            die("Connection failed" . mysqli_connect_error());
        }else{
            if ($conn->query($this->query) === TRUE) {
                $returnValue=true;
            }else{
                echo "Query Failded";
            }
        }
        return $returnValue;

    }
    function executeSelectQuery(){
        $conn =$this->getConnection();
        if (!$conn) {

            die("Connection failed" . mysqli_connect_error());
        }else{
            $response = @mysqli_query($conn, $this->query);
            return $response;
        }
    }
    function closeConn(){
        mysqli_close($this->conn);
    }



}

?>