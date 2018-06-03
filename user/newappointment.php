<?php
session_start();
require 'includes/validate.php';


$sql = 'SELECT COUNT(*) as `total` FROM therapist_account where therapist_account.isValidated = 1';
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
$sql = 'SELECT a.Therapist_ID,a.Article_ID,a.Article_Title,
SUBSTRING( a.Article,1,300) as Article,b.First_Name,b.Last_Name FROM article a
 INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND b.isValidated = 1 ORDER BY a.Article_ID DESC LIMIT '.$pageCntentRange1.','.$itemperpage;
}else{
    $sql='SELECT a.Therapist_ID,a.Article_ID,a.Article_Title,
SUBSTRING( a.Article,1,300) as Article,b.First_Name,b.Last_Name FROM article a
 INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND (a.Article_Title LIKE \'%' . $_GET['keyword'] . '%\' OR b.First_Name LIKE \'%'. $_GET['keyword'] . '%\' OR b.Last_Name LIKE \'%'. $_GET['keyword'] . '%\') AND b.isValidated = 1 ORDER BY a.Article_ID DESC LIMIT '.$pageCntentRange1.','.$itemperpage;
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
                        <li><a href="videos.php?part=upper">Upper Body</a></li>
                        <li><a href="videos.php?part=lower">Lower Body</a></li>
                        <?php
                        if ($isLogined) {
                            echo '<li><a  href="savevideos.php">Saved Videos</a></li>';
                        }
                        ?>
                    </ul>
                </li>

                <li class="current">
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

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 ">

            <h1 class="my-4">Appointment Request Form</h1>

        <?php if($result->num_rows){?>
            <?php while ($row = @mysqli_fetch_array($result)) { ?>
            <div class="row">
              <div class="col-md-7">
                    <img class="card-img-top fa-facebook-square, img-responsive" style="width:inherit ;height auto" src="../therapist/therapistprofilepictures/<?php echo $row['Profile_Picture']?>" alt="">
              </div>

              <div class="col-md-5">
                <form id="therapist<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php" method="post">
                  <input type="hidden" name="therapistID" value="<?php echo $row['Therapist_ID']?>">
                </form>
                <h3><a onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] . '  ' . $row['Last_Name'] ?></a></h3>
                  <?php "License Type:" ?><?php echo $row['License_Type']?>

                <a class="btn btn-primary" href="myappointment.php">Send Request</a>
              </div>

            </div>
      <!-- /.row -->

        <hr>
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

            <!-- Side Widget -->
            <div class="card my-4">
                <div class="card-body">
                    <?php
                    include_once '../Ads.php';
                    $ads= new Ads();
                    echo $ads->getAds();
                    ?>
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
