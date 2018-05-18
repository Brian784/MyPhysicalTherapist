<?php
session_start();
include 'EncryptClass.php';
include 'cookiesAndSessions.php';
include "DatabaseConnectorClass.php";
$CookieMaker = new CookiesTracking();
$SessionMaker = new SessionsTracking();
$encryptor = new EncryptClass();
if (isset($_POST['isSignout'])) {
    if ($_POST['isSignout'] == true) {
        $EmaiCookielValue = $CookieMaker->getCookieValue('UserEmailCookie');
        $PsdCookieValue = $CookieMaker->getCookieValue('UserPswCookie');
        $UserIDCookie = $CookieMaker->getCookieValue('UserIDCookie');
        $emailSessionValue = $SessionMaker->getSession('UserEmailSession');
        $psdSessionValue = $SessionMaker->getSession('UserPswSession');
        $UserSessionValue = $SessionMaker->getSession('UserIDSession');
        if ($EmaiCookielValue != null) {
            $CookieMaker->deleteCookie('UserEmailCookie', '');
        }
        if ($PsdCookieValue != null) {
            $CookieMaker->deleteCookie('UserPswCookie', '');
        }
        if ($UserIDCookie != null) {
            $CookieMaker->deleteCookie('UserIDCookie', '');
        }
        if ($emailSessionValue != null) {
            $SessionMaker->deleteSession('UserEmailSession');
        }
        if ($psdSessionValue != null) {
            $SessionMaker->deleteSession('UserEmailSession');
        }
        if ($UserSessionValue != null) {
            $SessionMaker->deleteSession('UserIDSession');
        }

    }
}

$isLogined = true;
$dbConn = new DababaseConnector();
$UserID = null;
$itemperpage = 15;
$totalRecords = null;
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
        $isLogined = false;
    }
}

$sql = 'SELECT COUNT(*) as `total` FROM article a INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND b.isValidated = 1';
$dbConn->setQuery($sql);
$totalRecords = $dbConn->executeSelectQuery();
while ($row = @mysqli_fetch_array($totalRecords)) {
    $totalRecords = $row['total'];
}
$totalPages = ceil($totalRecords / $itemperpage);

if (!isset($_GET['page'])) {
    $_GET['page'] = 0;
} else {
    // Convert the page number to an integer
    $_GET['page'] = (int)$_GET['page'];

}

// If the page number is less than 1, make it 1.
if ($_GET['page'] < 1) {
    $_GET['page'] = 1;
    // Check that the page is below the last page
} else if ($_GET['page'] > $totalPages) {
    $_GET['page'] = $totalPages;
}


$pageCntentRange1 = ($_GET['page'] - 1) * $itemperpage;
$pageCntentRange2 = $_GET['page'] * $itemperpage;

$sql = 'SELECT a.Therapist_ID,a.Article_ID,a.Article_Title,
SUBSTRING( a.Article,1,300) as Article,b.First_Name,b.Last_Name FROM article a
 INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND b.isValidated = 1 AND Article_ID >= ' . $pageCntentRange1 . ' AND Article_ID < ' . $pageCntentRange2 . ' ORDER BY a.Article_ID DESC ';
$dbConn->setQuery($sql);
$result = $dbConn->executeSelectQuery();

?>

<!DOCTYPE HTML>

<html>
<head>
    <title>My Physical Therapist</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ie9.css"/><![endif]-->
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
                <li class="current"><a href="index.php">Home</a></li>
                <li>
                    <a href="videos.php">User</a>
                    <ul>
                        <?php
                        if (!$isLogined) {
                            echo ' <li><a href="login.php">Login</a></li>';
                            echo ' <li><a href="#">Register</a></li>';
                        } else {

                            echo '<form id="LogoutForm"  action="index.php" method="post">
  <input type="hidden" name="isSignout" value="true">
</form>';
                            echo ' <li><a  href="userprofile.php">User Profile</a></li>';
                            echo ' <li><a onclick="document.getElementById(\'LogoutForm\').submit();">Logout</a></li>';
                        }
                        ?>

                    </ul>
                </li>
                <li>

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
                        <?php
                        if ($isLogined) {
                            echo '<li><a  href="savevideos.php">Saved Videos</a></li>';
                        }
                        ?>
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

</div>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Newsfeeds</h1>

    <div class="row">

        <?php while ($row = @mysqli_fetch_array($result)) { ?>
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            <form id="article<?php echo $row['Article_ID'] ?>" action="article.php" method="post">
                                <input type="hidden" name="articleID" value="<?php echo $row['Article_ID'] ?>">
                            </form>

                            <a onclick="document.getElementById('article<?php echo $row['Article_ID'] ?>' ).submit();"><?php echo $row['Article_Title'] ?></a>
                        </h4>
                        <form id="therapist<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php"
                              method="post">
                            <input type="hidden" name="therapistID" value="<?php echo $row['Therapist_ID'] ?>">
                        </form>

                        <h5><span class="glyphicon glyphicon-user">
                    </span> Post by <a
                                    onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] . '  ' . $row['Last_Name'] ?></a>
                        </h5>
                        <p class="card-text">
                            <?php echo $row['Article'] ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php } ?>


    </div>
    <!-- Pagination -->
    <ul class="pagination justify-content-center">

        <?php

        foreach (range(1, $totalPages) as $page) {
            // Check if we're on the current page in the loop

            if ($page == $_GET['page']) {
                echo '<li class="page-item active">';
                echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                echo '</li>';
            } else if ($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                echo '   <li class="page-item ">
            <a class="page-link" href="?page=' . $page . '">' . $page . '</a>
        </li>';
            }

        }
        ?>

    </ul>


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