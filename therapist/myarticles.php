<?php
session_start();
require "includes/validate.php";
$itemperpage = 15;
$sql = 'SELECT COUNT(*) as `total` FROM article a INNER JOIN therapist_account b WHERE a.Therapist_ID =b.Therapist_ID AND b.isValidated =1 and a.Therapist_ID=' . $UserID;
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
if ($pageCntentRange1 < 0) {
    $pageCntentRange1 = 0;
}
if (!isset($_GET['keyword'])) {
    $sql = 'SELECT a.Therapist_ID,a.Article_ID,a.Article_Title,
SUBSTRING( a.Article,1,300) as Article,b.First_Name,b.Last_Name FROM article a
 INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND b.isValidated = 1 AND a.Therapist_ID=' . $UserID . ' ORDER BY a.Article_ID DESC LIMIT ' . $pageCntentRange1 . ',' . $itemperpage;
} else {
    $sql = 'SELECT a.Therapist_ID,a.Article_ID,a.Article_Title,
SUBSTRING( a.Article,1,300) as Article,b.First_Name,b.Last_Name FROM article a
 INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND a.Therapist_ID=' . $UserID . ' AND (a.Article_Title LIKE \'%' . $_GET['keyword'] . '%\' OR b.First_Name LIKE \'%' . $_GET['keyword'] . '%\' OR b.Last_Name LIKE \'%' . $_GET['keyword'] . '%\') AND b.isValidated = 1 ORDER BY a.Article_ID DESC LIMIT ' . $pageCntentRange1 . ',' . $itemperpage;
}

$dbConn->setQuery($sql);
$result = $dbConn->executeSelectQuery();

?>
<!DOCTYPE HTML>

<html>
<head>
    <title>My Physical Therapist-Therapist</title>
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
        <?php
        require("includes/header.php");
        ?>
    </div>

</div>
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 ">

            <h2 class="my-4">Hello <?php echo $dbConn->getTherapistName($UserID)?>, here are your articles.
            </h2>
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = @mysqli_fetch_array($result)) { ?>
                    <div class="col-lg-6 portfolio-item">
                        <div class="card h-100 mh-100">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <form id="article<?php echo $row['Article_ID'] ?>" action="article.php"
                                          method="post">
                                        <input type="hidden" name="articleID" value="<?php echo $row['Article_ID'] ?>">
                                    </form>

                                    <a onclick="document.getElementById('article<?php echo $row['Article_ID'] ?>' ).submit();"><?php echo $row['Article_Title'] ?></a>
                                </h4>

                                <p class="card-text">
                                    <?php echo $row['Article'] . '...' ?>
                                </p>

                                <button type="button" class="btn btn-success btn-md">
                                    <span class="glyphicon glyphicon-plus"></span> New
                                </button>

                                <button type="button" class="btn btn-warning btn-md">
                                    <span class="glyphicon glyphicon-font"></span> Modify
                                </button>

                                <button type="button" class="btn btn-danger btn-md">
                                    <span class="glyphicon glyphicon-remove"></span> Delete
                                </button>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            <?php } else { ?>
                <h1>No Contents</h1>
            <?php } ?>


        </div>
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <form id="searchForm" action="myarticles.php" method="get">
                            <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                        </form>
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button"
                          onclick="document.getElementById('searchForm').submit();">Search!</button>

                </span>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header"><strong>Article Section</strong></h5>
                <div class="card-body">
                    Manage your articles.
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
