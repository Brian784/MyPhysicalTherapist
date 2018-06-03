<?php
session_start();
require 'includes/validate.php';

if (isset($_POST['articleID'])) {
    $sql = 'SELECT a.Article_Title,a.Article_Picture,a.TimePublished,a.Article,b.Therapist_ID,b.First_Name,b.Last_Name FROM article a INNER JOIN therapist_account b WHERE a.Therapist_ID=b.Therapist_ID and a.Article_ID='. $_POST['articleID'];
    $dbConn->setQuery($sql);
    $result = $dbConn->executeSelectQuery();

} else {
    header('Location: index.php');
    die();
}

?>


<!DOCTYPE HTML>

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

<style>
    .lead{
        text-align: justify;
        text-justify: inter-word;
    }
</style>

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

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = @mysqli_fetch_array($result)) { ?>
                    <!-- Title -->
                    <h2 class="mt-4"><?php echo $row['Article_Title'] ?></h2>
                    <form id="therapist<?php echo $row['Therapist_ID'] ?>" action="therapistprofile.php"
                          method="get">
                        <input type="hidden" name="therapistID" value="<?php echo $row['Therapist_ID'] ?>">
                    </form>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded, img-responsive" style="width:inherit ;height auto" src="../therapist/articlepictures/<?php echo $row['Article_Picture']?>" alt="">

                    <hr>
                    <!-- Date/Time -->
                    <p class="lead">
                        <span class="glyphicon glyphicon-user"></span>
                        Posted by
                        <a onclick="document.getElementById('therapist<?php echo $row['Therapist_ID'] ?>' ).submit();"><?php echo $row['First_Name'] . ' ' . $row['Last_Name'] ?></a>

                    </p>
                    <p>Posted on <?php echo $row['TimePublished'] ?></p>

                    <!-- Article -->
                    <div class="lead">
                        <p>
                            <?php echo "\r\n" .$row['Article']?>

                            <br/>
                        </p>
                    </div>

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

                    <form action="articleAction.php" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name='comment' rows="3"></textarea>
                        </div>
                        <input type="hidden" name="articleID" value="<?php echo $_POST['articleID'] ?>">
                        <input type="hidden" name="action" value="postComment">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        
            <?php
            $commentSql='(SELECT b.First_Name,\'user\' AS \'type\' ,b.Last_Name,b.Profile_Picture,a.Comment,a.Time_Stamp FROM arcticle_comments a INNER JOIN user_account b WHERE a.Account_ID=b.User_ID AND a.Article_ID = '.$_POST['articleID'].' ) UNION(SELECT b.First_Name ,\'therapist\' AS \'type\',b.Last_Name,b.Profile_Picture,a.Comment,a.Time_Stamp FROM arcticle_comments a INNER JOIN therapist_account b WHERE a.Account_ID=b.Therapist_ID AND a.Article_ID = '.$_POST['articleID'].') ORDER BY Time_Stamp DESC';
            $dbConn->setQuery($commentSql);
            $comments=$dbConn->executeSelectQuery();
            ?>
            <?php if($comments->num_rows>0){?>
                <?php while ($row = @mysqli_fetch_array($comments)) { ?>
                    <div class="media mb-4">

                        <?php if($row['type']==='user'){?>
                            <img class="d-flex mr-3 rounded-circle"  height="42" width="42"  src="<?php echo'../user/userprofilepictures/'.$row['Profile_Picture']; ?>">
                        <?php }else{?>
                            <img class="d-flex mr-3 rounded-circle"  height="42" width="42"  src="<?php echo'/therapist/therapistprofilepictures/'.$row['Profile_Picture']; ?>">
                        <?php }?>
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
                        <form id="searchForm" action="index.php" method="get">
                            <input type="text" name='keyword' class="form-control" placeholder="Search for...">
                        </form>
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
