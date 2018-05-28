<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<?php

Class DababaseConnector
{
    var $host = 'localhost';
    var $username = 'id5592625_gregariousxx18';
    var $password = 'Havanaunana';
    var $dbname = 'u738774436_mypt';
    var $query;

    function __construct ()
    {

    }
    function isVideoSaved($userID,$videoID){
        $sql='SELECT * From therapist_saved_videos WHERE Video_ID='.$videoID.' AND therapist_ID = '.$userID;
        $this->setQuery($sql);
        $rowNum=$this->executeSelectQuery();
        if($rowNum->num_rows<1){
            return false;
        }else{
            return true;
        }
    }

    function setQuery ($var)
    {
        $this->query = $var;
    }

    function getConnection ()
    {
        $conn = @mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (!$conn) {

            die("Connection failed" . mysqli_connect_error());
        } else {
            return $conn;
        }
    }

    function executeQuery ()
    {
        $returnValue = False;
        $conn = $this->getConnection();
        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        } else {
            if ($conn->query($this->query) === TRUE) {
                $returnValue = true;
            } else {
                $returnValue = false;
            }
        }
        $conn->close();
        return $returnValue;

    }

    function executeSelectQuery ()
    {
        $conn = $this->getConnection();
        if (!$conn) {
            $conn->close();
            die("Connection failed" . mysqli_connect_error());
        } else {
            $response = @mysqli_query($conn, $this->query);
            $conn->close();
            return $response;
        }
    }
    function getTherapist($email, $password){
        $this->setQuery("SELECT Therapist_ID FROM `therapist_account` WHERE Email = '$email' AND Password= '$password'");

        $response=$this->executeSelectQuery();
        $UserID=null;
        if($response->num_rows!=0){

            while ($row = @mysqli_fetch_array($response)) {
                $UserID=$row['Therapist_ID'];
            }
        }

        return $UserID;
    }
    function getTherapistName($ID){
        $this->setQuery("SELECT First_Name,Last_Name FROM `therapist_account` WHERE Therapist_ID = ".$ID.' And isValidated =1');

        $response=$this->executeSelectQuery();
        $name=null;
        if($response->num_rows>0){
            while ($row = @mysqli_fetch_array($response)) {
                $name=$row['First_Name'].'  '.$row['Last_Name'];
            }
            return$name;
        }else{
            return false;
        }
    }

    function validateTherapist ($email, $password)
    {
        $conn = $this->getConnection();
        if (!$conn) {

            die("Connection failed" . mysqli_connect_error());
        } else {
            $sql = "SELECT Email, Password FROM `therapist_account` WHERE Email = ? AND Password= ?";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                    echo $stmt->error;
            } else {
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                $numRow = $result->num_rows;
                $stmt->close();
                $conn->close();
                if ($numRow == 0) {
                    return false;
                } else {
                    return true;
                }
            }

        }
 }




}

?>