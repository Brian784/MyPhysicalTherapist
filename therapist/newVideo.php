<?php
session_start();
require "includes/validate.php";
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
        min-height: 20rem;
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
    <h3>Upload New Video</h3>
    <form enctype="multipart/form-data" style="margin-top: 1rem" method="post" action="videoUpload.action.php">
        <fieldset>
            <label>Video Title</label>
            <input type="text" id="title" name="title" class="input-block-level" placeholder="Video Title" MINLENGTH="10" maxlength="300" style="margin-bottom: 1rem" required>
            <label>Video File</label>
            <input id="file" name="file" accept="video/mp4" class="input-file input-block-level" style="margin-bottom: 1rem" type="file">
            <label>Categories</label>
            <select id="categorie" name="part" style="height: 3rem ; width: 30%" class="form-control">
                <option value="upper">Upper</option>
                <option value="lower">Lower</option>
            </select>
            <label>Description</label>
            <textarea name="description" id="editor" minlength="20"></textarea>
            <script src="assets/js/CKE.js"></script>
            <input type="hidden" name="action" value="upload">

            <a href="myvideos.php" style="margin-top: 1rem" class="btn btn-danger pull-right">Cancel</a>
            <button type="submit" class="btn btn-success pull-right" style="margin-right: 1rem; margin-top: 1rem">Post</button>
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
<script>
    var uploadField = document.getElementById("file");

    uploadField.onchange = function() {
        if(this.files[0].size > 134217728){
            alert("File is too big!");
            this.value = "";
        };
    };
</script>
</body>
</html>
