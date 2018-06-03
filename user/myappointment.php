<?php
session_start();
require 'includes/validate.php';

$sql = 'SELECT COUNT(*) as `total` FROM appointments a INNER JOIN therapist_account b WHERE a.Therapist_ID = b.Therapist_ID AND b.isValidated = 1';
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

$itemperpage=10;
$pageCntentRange1 = ($_GET['page'] - 1) * $itemperpage;
if($pageCntentRange1<0){
    $pageCntentRange1=0;
}
if(!isset($_GET['keyword'])){
    $sql = 'SELECT b.Therapist_ID,b.First_Name as \'T_F_Name\',b.Last_Name as \'T_L_Name\', c.First_Name as \'U_F_Name\',c.Last_Name as \'U_L_Name\', a.isApproved, a.Location FROM appointments a INNER JOIN therapist_account b INNER JOIN user_account c WHERE a.Therapist_ID = b.Therapist_ID AND a.User_ID = c.User_ID AND a.User_ID='.$UserID.' ORDER BY a.Appointment_Date DESC LIMIT '.$pageCntentRange1.','.$itemperpage;
    echo $sql;
}else{
    $sql='SELECT b.Therapist_ID,b.First_Name,b.Last_Name FROM appointments a INNER JOIN therapist_account b WHERE a.Therapist_ID=b.Therapist_ID AND b.isValidated =1 AND (a.App LIKE \'%' . $_GET['part'] . '%\' OR b.First_Name LIKE \'%'.$_GET['part'].'%\' OR  b.Last_Name LIKE \'%'.$_GET['part'].'%\') ORDER BY a.Appointment_Date DESC';
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
    <?php
        require("includes/header.php");
    ?>
</div>
      

       

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 ">

            <!-- CheckBox & DropDown -->
            <div class="col-lg-12">
                <h2 class="my-1"><font size="4">
                        Approved: <input type="checkbox" id="myCheck1"  onclick="myFunction()">
                        Pending: <input type="checkbox" id="myCheck2"  onclick="myFunction()">

                        <select id="list" onchange="getSelectedValue();">
                            <option value="recent">Most Recent</option>
                            <option value="alpha">Alpahabetical</option>
                        </select>

                        <p id="text1" style="display:none">Checkbox APPROVED is CHECKED!</p> <!-- FOR CHECKING -->
                        <p id="text2" style="display:none">Checkbox PENDING is CHECKED!</p> <!-- FOR CHECKING -->
                    </font></h2>
            </div><!-- </div class="col-lg-12"> -->

            <hr>

            <!-- Doctors -->
            <?php if($result){?>
                <?php while ($row = @mysqli_fetch_array($result)) { ?>

                    <!-- NEED AN IF STATEMNT TO OUTPUT APPROVED OR PENDING -->
                    <div class="col-lg-4 col-sm-6 text-center mb-4">

                        <!--<form id="therapist<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php" method="post">
              <a onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();">-->
                        <img class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">
                        <!--</a>
                        </form>-->

                        <h3>
                            <a onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] . '  ' . $row['Last_Name'] ?></a>
                        </h3>

                        <p align="left">Time: <?php echo $row['Appointment_Time'] ?></p>
                        <p align="left">Date: <?php echo $row['Appointment_Date'] ?></p>
                        <p align="left">Location: <?php echo $row['Location'] ?></p>
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

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header"><strong>Article Section</strong></h5>
                <div class="card-body">
                    These Articles are posted by certified therapist.They are reliable.
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

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
<script>
    function myFunction() { <!-- For CheckBox -->
        var checkBox_approved = document.getElementById("myCheck1");
        var text_approved = document.getElementById("text1");

        var checkBox_pending = document.getElementById("myCheck2");
        var text_pending = document.getElementById("text2");


        if (checkBox_approved.checked == true){
            text_approved.style.display = "block";
        } else if (checkBox_pending.checked == true){
            text_pending.style.display = "block";
        } else {
            text_approved.style.display = "none";
            text_pending.style.display = "none";
        }

    }

    function getSelectedValue(){ <!-- For DropDown -->
        var selectedValue = document.getElementById("list").value;
        console.log(selectedValue);
    }
</script>
<?php
include_once '../Ads.php';
$ads= new Ads();
echo $ads->getAds();
?>
</body>

</html>
