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
$itemperpage = 10;
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
if($pageCntentRange1<0){
    $pageCntentRange1=0;
}
if(!isset($_GET['keyword'])){
    $sql = 'SELECT a.First_Name,a.Last_Name,a.License_Type,b.Hospital_Name,a.Description,a.Email,a.Contact_Number 
from therapist_account a, therapist_schedule b where a.Therapist_ID = b.Therapist_ID ORDER BY a.Therapist_ID ASC LIMIT '.$pageCntentRange1.','.$itemperpage;


}else{

    $sql='SELECT a.First_Name,a.Last_Name,a.License_Type,b.Hospital_Name,a.Description,a.Email,a.Contact_Number,a.Profile_Picture
FROM  therapist_account a, therapist_schedule b WHERE a.Therapist_ID = b.Therapist_ID AND (a.First_Name LIKE \'%' . $_GET['keyword'] . '%\' OR a.Last_Name LIKE \'%'. $_GET['keyword'] . '%\' OR a.License_Type LIKE \'%'. $_GET['keyword'] . '%\' OR b.Hospital_Name LIKE \'%'. $_GET['keyword'] . '%\') AND b.isValidated = 1  ORDER BY a.Therapist_ID  ASC LIMIT '.$pageCntentRange1.','.$itemperpage;
}
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
        <?php
        require("includes/indexHeader.php");
        ?>
    </div>
</div>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 ">

            <h1 class="my-4">Contact Information
            </h1>
            <?php if($result->num_rows){?>
                <?php while ($row = @mysqli_fetch_array($result)) { ?>
                    <div class="col-lg-6 portfolio-item">
                        <div class="card h-100 mh-100 ">
                            <div class="card-body">
                                <img class="card-img-top" src="<?php echo'../therapist/therapistprofilepictures'.$row['Profile_Picture']?>" alt="">
                                <h3 class="card-title">
                                    <form id="<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php" method="post">
                                        <input type="hidden" name="Therapist_ID" value="<?php echo $row['Therapist_ID'] ?>">
                                    </form>

                                    <a onclick="document.getElementById('therapistname<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] ?>&nbsp;<?php echo $row['Last_Name'] ?></a>
                                </h3>
                               <p class="card-text">
                                   <?php echo "Specialization: "?><?php echo $row['License_Type'] ?>
                               </p>
                                <p class="card-text">
                                    <?php echo "Hospital: "?> <?php echo $row['Hospital_Name'] ?>
                                </p>
                                <p class="card-text">
                                    <?php echo "Email: "?> <?php echo $row['Email'] ?>
                                </p>
                                <p class="card-text">
                                    <?php echo "Contact Number: "?> <?php echo $row['Contact_Number'] ?>
                                </p>



                            </div>
                        </div>
                    </div>

                <?php } ?>
            <?php }else{?>
                <h1>No Contents</h1>
            <?php } ?>


        </div>


        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <form id="searchForm" action="index.php" method="get">
                            <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                        </form >
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button" onclick="document.getElementById('searchForm').submit();">Search!</button>

                </span>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <!-- /.row -->
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
<!-- /.container -->


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