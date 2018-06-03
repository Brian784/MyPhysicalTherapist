<?php
session_start();
require "includes/validate.php";
$sql='SELECT `Article_Title`,`Article` FROM article WHERE article.Article_ID ='.$_POST['articleID'].' AND article.Therapist_ID='.$UserID;
$dbConn->setQuery($sql);
$result=$dbConn->executeSelectQuery();
while ($row = @mysqli_fetch_array($result)) {
$title=$row['Article_Title'];
$article=$row['Article'];
}

?>
<html>
<head>
    <title>My Physical Therapist</title>
    <meta charset="utf-8" />
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ie9.css"/><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../ckeditor5/ckeditor.js"></script>
</head>

<style>
    .ck-editor__editable {
        min-height: 40rem;
    }
</style>

<body>
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">
        <?php
        require 'includes/header.php'
        ?>

    </div>
</div>

<div class="container ">
   <h3>Modify Your Article</h3>
        <form style="margin-top: 1rem" method="post" action="article.action.php">
            <fieldset>
                <input type="text" id="title" name="title" value="<?php echo $title;?>" class="input-block-level" placeholder="Article Title" MINLENGTH="10" maxlength="500" style="margin-bottom: 1rem" required>
                <textarea name="article" id="editor" minlength="150"><?php echo $article;?></textarea>
                   <script src="assets/js/CKE.js"></script>
                <input type="hidden" name="action" value="modify">
                <input type="hidden" name="articleID" value="<?php echo $_POST['articleID'];?>">
                <a href="myarticles.php" style="margin-top: 1rem" class="btn btn-danger pull-right">Cancel</a>
                <button type="submit" class="btn btn-success pull-right" style="margin-right: 1rem; margin-top: 1rem">Modify</button>
            </fieldset>
        </form>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>
