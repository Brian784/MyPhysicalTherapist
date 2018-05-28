<?php
session_start();
require "includes/validate.php";
$sql=null;
$totalRecords=null;
$itemperpage=10;
$sql='SELECT COUNT(a.Video_ID) AS total FROM video_library a INNER JOIN therapist_account b WHERE a.Therapist_ID=b.Therapist_ID AND a.Therapist_ID=$User_ID AND b.isValidated =1 ';
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

$isSearch=null;
$sql = 'SELECT b.Therapist_ID,a.Video_ID,a.Video_Title,SUBSTRING(a.Video_Description,1,300) as Video_Description,a.Video_URL,b.First_Name,b.Last_Name FROM video_library a INNER JOIN therapist_account b WHERE a.Therapist_ID=b.Therapist_ID AND a.Therapist_ID= '.$UserID.' AND b.isValidated =1 ORDER BY a.Video_ID DESC LIMIT '.$pageCntentRange1.','.$itemperpage;
if(isset($_GET['part'])) {
            $isSearch = true;
            $sql = 'SELECT b.Therapist_ID,a.Video_ID,a.Video_Title,SUBSTRING(a.Video_Description,1,300) as Video_Description,a.Video_URL,b.First_Name,b.Last_Name FROM video_library a INNER JOIN therapist_account b WHERE a.Therapist_ID=b.Therapist_ID AND a.Therapist_ID= '.$UserID.' AND  b.isValidated =1 AND (a.Video_Title LIKE \'%' . $_GET['part'] . '%\' OR b.First_Name LIKE \'%'.$_GET['part'].'%\' OR  b.Last_Name LIKE \'%'.$_GET['part'].'%\') ORDER BY a.Video_ID DESC';
}else{
    $isSearch=false;
}
$dbConn->setQuery($sql);
$result = $dbConn->executeSelectQuery();
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

</head>
<body>
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">
        <?php
        require("includes/header.php");
        ?>
    </div>

</div>
<!-- Page Content -->
<div class="container">

    <div class="row">


        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="my-4">My videos
            </h1>
            <?php if($isSearch){ ?>
                <h6 class="my-4"><?php echo 'Search \''.ucfirst($_GET['part']).'\'';?>
                </h6>
            <?php } ?>
            <!-- Blog Post -->
            <?php if($result->num_rows>0){?>
            <?php while ($row = @mysqli_fetch_array($result)) { ?>
            <div class="card mb-4">
             <!--   <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
                <div class="card-body">
                    <h2 class="card-title"><?php echo $row['Video_Title']?></h2>
                    <form id="video<?php echo $row['Video_ID'] ?>" action="playvideo.php" method="post">
                        <input type="hidden" name="videoID" value="<?php echo $row['Video_ID'] ?>">
                    </form>
                    <p class="card-text"> <?php echo $row['Video_Description']?></p>
                    <a onclick="document.getElementById('video<?php echo $row['Video_ID'] ?>' ).submit();" class="btn btn-success"> New</a>
                    <a onclick="document.getElementById('video<?php echo $row['Video_ID'] ?>' ).submit();" class="btn btn-warning">Modify</a>
                    <a onclick="document.getElementById('video<?php echo $row['Video_ID'] ?>' ).submit();" class="btn btn-danger">Delete </a>
                    <a onclick="document.getElementById('video<?php echo $row['Video_ID'] ?>' ).submit();" class="btn btn-primary">Watch &rarr;</a>
                </div>

            </div>
                <?php } ?>
            <?php }?>

        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <form id="searchForm" action="myvideos.php" method="get">
                        <input type="text" name='part' class="form-control" placeholder="Search for...">
                        </form>
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button" onclick="document.getElementById('searchForm').submit();">Search!</button>
                </span>
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



    <ul class="pagination justify-content-center">

        <?php
if($isSearch) {
    foreach (range(1, $totalPages) as $page) {
        // Check if we're on the current page in the loop
        if($page!=0) {
            if ($page == $_GET['page']) {
                echo '<li class="page-item active">';
                echo '<a class="page-link" href="?part=' . $_GET['part'] . '&?page=' . $page . '">' . $page . '</a>';
                echo '</li>';
            } else if ($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                echo '   <li class="page-item ">
            <a class="page-link" href="?part=' . $_GET['part'] . '&?page=' . $page . '">' . $page . '</a>
        </li>';
            }
        }

    }
}else{
    foreach (range(1, $totalPages) as $page) {
        // Check if we're on the current page in the loop
        if($page!=0) {
            if ($page == $_GET['page']) {
                echo '<li class="page-item active">';
                echo '<a class="page-link" href="?page='. $page.'">' . $page . '</a>';
                echo '</li>';
            } else if ($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                echo '   <li class="page-item ">
            <a class="page-link" href="?page=' . $page . '">' . $page . '</a>
        </li>';
            }
        }

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
<?php
include_once '../Ads.php';
$ads= new Ads();
echo $ads->getAds();
?>

</body>
</html>
