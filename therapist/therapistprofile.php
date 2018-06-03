<?php
session_start();
require 'includes/validate.php';

$sql= "SELECT `First_Name`, `Last_Name`, `License_Id`, `License_Type`, `Profile_Picture`, `Contact_Number` FROM `therapist_account` WHERE Therapist_ID = ".$_POST['therapistID'];

$dbConn->setQuery($sql);

$user=$dbConn->executeSelectQuery();

while($row = @mysqli_fetch_array($user)){
    
    $firstName = $row['First_Name'];
    $lastName = $row['Last_Name'];
    $license = $row['License_Type'];
    $userPicture = $row['Profile_Picture'];
    $contact = $row['Contact_Number'];

}

$sqlSched = "SELECT `Working_Day`, `Hospital_Name`, `Start_Time`, `End_Time` FROM `therapist_schedule` WHERE Therapist_ID = ".$_POST['therapistID'];

$dbConn->setQuery($sqlSched);

$sched=$dbConn->executeSelectQuery();
 

?>


<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>My Physical Therapist</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ie9.css"/><![endif]-->
    <link rel="stylesheet" href="assets/css/ie9.css"/>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>


</head>
<body>
<style>


    .profilepicx{

        width: 140px;
        height: 140px;
        top: 255px;
        left: 400px;
        position: absolute;
        border-radius: 2px/2px;
        -webkit-box-shadow: 0 3px 8px rgba(0,0,0,.25);

    }

    .names{

        width: 200px;
        top: 200px;
        left: 0%;
        color: black;
        font-family: verdana;
        font-size: 20px;
        position: absolute;

    }

    .change{

        width: 50px;
        top: 150px;
        left: 450px;
        position: absolute;

    }
    
    .rowSpace{
          padding-bottom: 1em;
    }
    
    table, th, td {
    border: 1px solid black;
    width: 50%;
    text-align: center;
}


</style>


<div id="page-wrapper">

    <!-- Header -->
    <div id="header">
        <?php
        require("includes/header.php");
        ?>
    </div>

        <!-- Nav -->
       



    <div class="about-me clearfix" id="about-me">
        <div class="container">
            <div class="row">
                <!-- Profile Pic -->
                <div style="margin-top: 2rem" class="my-pic center col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="200">

                </div>

                <div class="names">

                    <div class="">
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">  <h4 >You are viewing <?Php echo $firstName ?></h4></div>
                                <div class="panel-body" style = "width: 100%">
                                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                                        <img class="fa-tumblr-square d-flex" width="80%" alt="User Pic" src="<?php echo'../therapist/therapistprofilepictures/'.$userPicture; ?>"
                                             id="profile-image1" class="img-circle img-responsive">





                                    </div>
                                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                                        <div class="container" >
                                            <h2><?Php echo $firstName ." ". $lastName  ?></h2>
                                            <p>Licensed <b> <?Php echo $license ?></b></p>


                                        </div>
                                        <hr>
                                        <ul class="container details" >
                                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?Php echo $email ?></p></li>
                                            
                                              <li><p><span class="fa fa-mobile" style="width:50px;"></span><?Php echo $contact ?> </p></li>
                                            
                                            
                                            
                                            <li><p><span class="fa fa-hospital-o" style="width:50px;"></span>  
                                                
                                               
                                               <?Php
                                                 echo "<table>"
                                                 ?>
                                               
                                                <tr>
                                                    <td><b>Work Days</b></td>
                                                    <td><b>Hospital</b></td>
                                                    <td><b>Start Time</b></td>
                                                    <td><b>End Time</b></td>
                                                </tr>
                                               
                                                <?Php
                                                
                                                while($row = @mysqli_fetch_array($sched)){
    
                                               echo "<tr><td>" . $row['Working_Day'] . "</td><td>" . $row['Hospital_Name'] . "</td><td>" . 
                                                    $row['Start_Time'] . "</td><td>" . 
                                                    $row['End_Time'] . "</td></tr>" ;
                                            
                                            }  
                                            
                                                echo "</table>"
                                            
                                                ?>
                                                
                                            </p></li>
                                            
                                            
                                            
                                            
                                          

                                        </ul>
                                        <hr>
                                        <div class="col-sm-5 col-xs-6 tital " >Joined MyPT on: January 25, 2018</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="profile col-sm-4 col-xs-12 wow fadeInUp text-center" data-wow-duration="0.5s" data-wow-offset="200">
                    <h3 class = "names"></h3>
                    <div class="heading-line"></div>

                </div>
                <div class="why-me col-sm-8 col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="200">
                    <!-- Start Accordion -->
                    <div class="accordion">

                      

                    </div> <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]>
<script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>