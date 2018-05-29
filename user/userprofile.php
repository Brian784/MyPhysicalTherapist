<?php
session_start();
include 'EncryptClass.php';
include 'cookiesAndSessions.php';
include "DatabaseConnectorClass.php";
$CookieMaker = new CookiesTracking();
$SessionMaker = new SessionsTracking();
$encryptor = new EncryptClass();
$isLogined = true;
$dbConn = new DababaseConnector();
$UserID = null;





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


</style>


<div id="page-wrapper">

    <!-- Header -->
    <div id="header">

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php"><img src="images/MyPtLogo.png" width="150" height="90"></a></li>
                <li><a href="index.php">Home</a></li>
                <li class="current">
                    <a href="#">User</a>
                    <ul>


                        <?php

                        echo '<form id="UserIDForm"  action="userprofile.php" method="get">
  <input type="hidden" name="userID" value=' . $UserID . '>
</form>';
                        echo '<form id="LogoutForm"  action="login.php" method="post">
  <input type="hidden" name="isSignout" value="true">
</form>';
                        echo ' <li><a  href="userprofile.php">User Profile</a></form></li>';

                        echo ' <li><a onclick="document.getElementById(\'LogoutForm\').submit();">Logout</a></li>';

                        ?>

                    </ul>
                </li>
                <li>

                    <a href="#">Videos</a>
                    <ul>
                        <li><a href="videos.php?part=upper">Upper Body</a></li>
                        <li><a href="videos.php?part=lower">Lower Body</a></li>
                        <li><a  href="savevideos.php">Saved Videos</a></form></li>
                    </ul>
                </li>

                <li>
                    <a href="#">Appointment</a>
                    <ul>
                        <li><a href="newappointment.php">New Appointment</a></li>
                        <li><a href="myappointment.php">My Appointment</a></li>
                    </ul>
                </li>
                <li><a href="contactinfo.php">Contact Information</a></li>
            </ul>


        </nav>

    </div>



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
                                <div class="panel-heading">  <h4 >User: ameraIbrahim2</h4></div>
                                <div class="panel-body" style = "width: 100%">
                                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                                        <img class="fa-tumblr-square d-flex" width="80%" alt="User Pic" src="https://scontent.fmnl15-1.fna.fbcdn.net/v/t1.0-9/25660154_1928942137371855_1011372740605600366_n.jpg?_nc_cat=0&oh=4344c8616dbee95c93ed39dc97d29bfc&oe=5B8C6DDF"
                                             id="profile-image1" class="img-circle img-responsive">





                                    </div>
                                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                                        <div class="container" >
                                            <h2>Amera Ibrahim</h2>
                                            <p>Regular   <b> Member</b></p>


                                        </div>
                                        <hr>
                                        <ul class="container details" >
                                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>amera.ayman@gmail.com</p></li>
                                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span>Female</p></li>
                                            <li><p><span class="glyphicon glyphicon-info-sign one" style="width:50px;"></span>18 years old</p></li>
                                            <li><p><span class="glyphicon glyphicon-home" style="width:50px;"></span>in <b>Manila</b></p></li>

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

                        <div class="personal-wrapper">

                            <div class = "change">
                            <input type = "button" value = "Change Profile">
                            </div>

                        </div>

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