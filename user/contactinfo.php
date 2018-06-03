<?php
session_start();
require 'includes/validate.php';
$itemperpage=10;
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
$isSearch=false;
if($pageCntentRange1<0){
    $pageCntentRange1=0;
}
if(!isset($_GET['keyword'])){
    $sql = 'SELECT a.First_Name,a.Last_Name,a.License_Type,a.Email,a.Contact_Number,a.Profile_Picture,a.Therapist_ID
from therapist_account a ORDER BY a.Therapist_ID ASC LIMIT '.$pageCntentRange1.','.$itemperpage;
$isSearch=false;
}else{
$isSearch=true;
    $sql='SELECT a.First_Name,a.Last_Name,a.License_Type,a.Email,a.Contact_Number,a.Profile_Picture,a.Therapist_ID
FROM  therapist_account a WHERE (a.First_Name LIKE \'%' . $_GET['keyword'] . '%\' OR a.Last_Name LIKE \'%'. $_GET['keyword'] . '%\' OR a.License_Type LIKE \'%'. $_GET['keyword']. '\''.') AND a.isValidated = 1  ORDER BY a.Therapist_ID  ASC LIMIT '.$pageCntentRange1.','.$itemperpage;
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
                <?php
                if($isSearch==true){
                    echo '<h5>\'Search \''.$_GET['keyword'].'\'';
                }
                ?>
            </h1>

            <?php if($result->num_rows){?>
                <?php while ($row = @mysqli_fetch_array($result)) { ?>
                    <div class="col-lg-6 portfolio-item">
                        <div class="card h-100 mh-100 ">
                            <img class="card-img-top fa-facebook-square, img-responsive" style="width:inherit ;height auto" src="../therapist/therapistprofilepictures/<?php echo $row['Profile_Picture']?>" alt="">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <form id="therapist<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php"
                                          method="post">
                                        <input type="hidden" name="therapistID" value="<?php echo $row['Therapist_ID'] ?>">
                                    </form>
                                    <a onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] ?>&nbsp;<?php echo $row['Last_Name'] ?></a>
                                </h3>
                               <p class="card-text">
                                   <?php echo "Specialization: "?><?php echo $row['License_Type'] ?>
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
                        <form id="searchForm" action="contactinfo.php" method="get">
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
        if($isSearch) {
            foreach (range(1, $totalPages) as $page) {
                // Check if we're on the current page in the loop

                if ($page == $_GET['page']) {
                    echo '<li class="page-item active">';
                    echo '<a class="page-link" href="?keyword=' . $_GET['keyword'] . '&?page=' . $page. '">' . $page . '</a>';
                    echo '</li>';
                } else if ($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                    echo '   <li class="page-item ">
            <a class="page-link" href="?keyword=' . $_GET['keyword'] . '&?page=' .$page  . '">' . $page . '</a>
        </li>';
                }

            }
        }else{
            foreach (range(1, $totalPages) as $page) {
                // Check if we're on the current page in the loop

                if ($page == $_GET['page']) {
                    echo '<li class="page-item active">';
                    echo '<a class="page-link" href="?page=' . $page. '">' . $page . '</a>';
                    echo '</li>';
                } else if ($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                    echo '   <li class="page-item ">
            <a class="page-link" href="?page=' .$page  . '">' . $page . '</a>
        </li>';
                }

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