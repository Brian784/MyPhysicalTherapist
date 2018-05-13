<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<?php
Class DababaseConnector{
    var $host='localhost';
    var $username='id5592625_gregariousxx18';
    var $password='Havanaunana';
    var $dbname='id5592625_myphysicaltherapist';
    var $query;

    function __construct(){

    }
    function setQuery($var){
        $this->query=$var;
    }
    function getConnection(){
        $conn= mysqli_connect($this->host, $this->username, $this->password,$this->dbname);
        if (!$conn) {

            die("Connection failed" . mysqli_connect_error());
        }else{
           return $conn;
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
                $returnValue=false;
            }
        }
        $conn->close();
        return $returnValue;

    }
    function executeSelectQuery(){
        $conn =$this->getConnection();
        if (!$conn) {
            $conn->close();
            die("Connection failed" . mysqli_connect_error());
        }else{
            $response = @mysqli_query($conn, $this->query);
            $conn->close();
            return $response;
        }
    }
    function validateUser($email,$password){
       $conn = $this->getConnection();
        if (!$conn) {
            $error = mysqli_connect_error();
            $errno = mysqli_connect_errno();
            print "$errno: $error\n";
            exit();
            die("Connection failed" . mysqli_connect_error());
        }else{
                $sql = "SELECT Email, Password FROM `user_account` WHERE Email = ? AND Password= ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql))
            {
                print "Failed to prepare statement\n";
            }else{
                $stmt->bind_param("ss", $email,$password);
                $stmt->execute();
                $result = $stmt->get_result();
                return $result->num_rows;
            }

        }


    }




}

?>