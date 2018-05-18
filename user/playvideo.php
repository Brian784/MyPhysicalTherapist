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
if ($CookieMaker->getCookieValue('UserEmailCookie') != null && $CookieMaker->getCookieValue('UserPswCookie') != null) {
    //Received completed Cookies
    //decrypt
    $email = $encryptor->crypt_function($CookieMaker->getCookieValue('UserEmailCookie'), 'd');
    $pass = $encryptor->crypt_function($CookieMaker->getCookieValue('UserPswCookie'), 'd');
    $UserID = $encryptor->crypt_function($CookieMaker->getCookieValue('UserIDCookie'), 'd');
    $isLogined = $dbConn->validateUser($email, $pass);

} else {
    if ($SessionMaker->getSession('UserEmailSession') != null && $SessionMaker->getSession('UserPswSession') != null) {
        //received complete sessions
        //decrypt
        $email = $encryptor->crypt_function($SessionMaker->getSession('UserEmailSession'), 'd');
        $pass = $encryptor->crypt_function($SessionMaker->getSession('UserPswSession'), 'd');
        $UserID = $encryptor->crypt_function($SessionMaker->getSession('UserIDSession'), 'd');
        $isLogined = $dbConn->validateUser($email, $pass);
    } else {
        //InvalidAccess
        //no cookies no sessions
        header('Refresh: 4;url=index.php');
        die('<p>Only registered user can access this page,you will be redirectd to welcome page in 4 seconds</p>');

    }
}
if (isset($_POST['videoID'])) {
    $sql = 'SELECT a.Video_ID,a.Video_Title,a.Video_Description,a.Video_URL,a.TimePublished,b.First_Name,b.Last_Name,b.Therapist_ID FROM video_library a INNER JOIN therapist_account b WHERE a.Therapist_ID=b.Therapist_ID AND a.Video_ID = ' . $_POST['videoID'];
    $dbConn->setQuery($sql);
    $result = $dbConn->executeSelectQuery();

    if(isset($_POST['action'])){

    switch ($_POST['action']){
        case 'addVideo':
            if(!$dbConn->isVideoSaved($UserID,($_POST['videoID']))){
                $sql = 'INSERT INTO `saved_videos` (`Video_ID`, `User_ID`, `Time_Saved`) VALUES (\'' . $_POST['videoID'] . '\',\'' . $UserID . '\', CURRENT_TIMESTAMP)';
                $dbConn->setQuery($sql);
                $dbConn->executeQuery();
            }
            break;
        case 'deleteVideo':
            if($dbConn->isVideoSaved($UserID,($_POST['videoID']))){
                $sql = 'DELETE FROM `saved_videos` WHERE `saved_videos`.`Video_ID` = '.$_POST['videoID'] .' AND `saved_videos`.`User_ID` = '.$UserID;
                $dbConn->setQuery($sql);
                $dbConn->executeQuery();
            }
            break;
        case 'postComment':
            $insertSQL='INSERT INTO `video_comments` (`Video_Comment_ID`, `Account_ID`, `Video_ID`, `Time_Stamp`, `Comment`, `isApprove`) VALUES (NULL,'. $UserID.','.$_POST['videoID'].', CURRENT_TIMESTAMP,\''.$_POST['comment'].'\',1)';
            $dbConn->setQuery($insertSQL);
            $dbConn->executeQuery();
            break;
    }

    }


} else {
    header('Location: videos.php');
    die();
}

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
    <link href="assets/css/3-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8357713287289102",
            enable_page_level_ads: true
        });
    </script>
</head>
<body>
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php"><img src="images/MyPtLogo.png" width="150" height="90"></a></li>
                <li><a href="index.php">Home</a></li>
                <li>
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
                <li class="current">

                    <a href="#">Videos</a>
                    <ul>
                        <form id="UpperForm" action="videos.php" method="get">
                            <input type="hidden" name="part" value="upper">
                        </form>
                        <form id="LowerForm" action="videos.php" method="get">
                            <input type="hidden" name="part" value="lower">
                        </form>
                        <li><a onclick="document.getElementById('UpperForm').submit();">Upper Body</a></li>
                        <li><a onclick="document.getElementById('LowerForm').submit();">Lower Body</a></li>
                        <li><a href="savevideos.php">Saved Videos</a></form></li>
                    </ul>
                </
                >

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

</div>
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = @mysqli_fetch_array($result)) { ?>
                    <!-- Title -->
                    <h2 class="mt-4"><?php echo $row['Video_Title'] ?></h2>
                    <form id="therapist<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php"
                          method="get">
                        <input type="hidden" name="therapistID" value="<?php echo $row['Therapist_ID'] ?>">
                    </form>
                    <!-- Author -->
                    <p class="lead">
                        <span class="glyphicon glyphicon-user"></span>
                        Posted by
                        <a onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] . ' ' . $row['Last_Name'] ?></a>

                    </p>
                    <hr>
                    <!-- Video-->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="<?php echo $row['Video_URL'];?>" width="100%" height="100%" frameborder="0"
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <hr>
                    <!-- Date/Time -->
                    <p>Posted on <?php echo $row['TimePublished'] ?></p>
                    <!--Save Video -->
                <?php if(!$dbConn->isVideoSaved($UserID,$_POST['videoID'])){?>
                    <form action="playvideo.php" method="post" >
                        <input type="hidden" name="videoID" value="<?php echo $_POST['videoID'] ?>">
                        <input type="hidden" name="action" value="addVideo">
                        <button type="submit" class="btn btn-primary">Save Video</button>
                    </form>
                        <?php }else{?>
                        <form action="playvideo.php" method="post" >
                            <input type="hidden" name="videoID" value="<?php echo $_POST['videoID'] ?>">
                            <input type="hidden" name="action" value="deleteVideo">
                            <button type="submit" class="btn btn-success">Video Saved</button>
                        </form>

                        <?php }?>
                    <hr>
            <p class="lead">Video Description</p>
                    <p><?php echo $row['Video_Description'] ?></p>
                <?php } ?>
            <?php } ?>

            <hr>
<?php
$sql='(SELECT user_account.First_Name,user_account.Last_Name FROM user_account WHERE user_account.User_ID ='.$UserID.')UNION(SELECT therapist_account.First_Name,therapist_account.Last_Name FROM therapist_account WHERE therapist_account.Therapist_ID='.$UserID.' )';
$dbConn->setQuery($sql);
$userName=$dbConn->executeSelectQuery();
?>
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header"><?php while ($row = @mysqli_fetch_array($userName)) {
                    echo 'Hi! '.$row['First_Name'].'   '.$row['Last_Name'];
                    }?>, You Might want to Leave a Comment:</h5>
                <div class="card-body">

                    <form action="playvideo.php" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name='comment'rows="3"></textarea>
                        </div>
                        <input type="hidden" name="videoID" value="<?php echo $_POST['videoID'] ?>">
                        <input type="hidden" name="action" value="postComment">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <?php
            $commentSql='(SELECT b.First_Name ,b.Last_Name,b.Profile_Picture,a.Comment,a.Time_Stamp FROM video_comments a INNER JOIN user_account b WHERE a.Account_ID=b.User_ID AND a.Video_ID = '.$_POST['videoID'].' )
            UNION(SELECT b.First_Name ,b.Last_Name,b.Profile_Picture,a.Comment,a.Time_Stamp FROM video_comments a INNER JOIN therapist_account b WHERE a.Account_ID=b.Therapist_ID AND a.Video_ID = '.$_POST['videoID'].' )';
            $dbConn->setQuery($commentSql);
            $comments=$dbConn->executeSelectQuery();
            ?>
            <?php if($comments->num_rows>0){?>
            <?php while ($row = @mysqli_fetch_array($comments)) { ?>
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle"  height="42" width="42"  src="<?php echo $row['Profile_Picture'] ?>" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $row['First_Name'].' '.$row['Last_Name']?></h5>
                    <?php echo $row['Comment'] ?>
                </div>
            </div>
                <?php } ?>
            <?php }else{?>
                <h3>No Comments</h3>
            <?php } ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <form id="searchForm" action="videos.php" method="get">
                            <input type="text" name='part' class="form-control" placeholder="Search for...">
                        </form>
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button" onclick="document.getElementById('searchForm').submit();">Go!</button>
                </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <form action="videos.php" method="get" id="upperForm">
                                    <input type="hidden" name='part' value="upper">
                                </form>
                                <li>
                                    <a onclick="document.getElementById('upperForm').submit();">Upper Body</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <form action="videos.php" method="get" id="lowerForm">
                                    <input type="hidden" name='part' value="lower">
                                </form>
                                <li>
                                    <a onclick="document.getElementById('lowerForm').submit();">Lower Body</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header"><strong>Reminder</strong></h5>
                <div class="card-body">
                    We would like to remind you that these video tutorials will serve as guide for certain physical injuries. However, My Physical Therapist is not responsible for any event that may occur.
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<?php
$_POST['videoID']=null;

?>
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
