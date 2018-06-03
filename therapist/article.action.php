<?php
require 'includes/validate.php';
if(isset($_POST['action'])){
   switch ($_POST['action']){
       case 'upload':
           echo 'upload';
           $dbConn->insertArticle($UserID,$_POST['title'],$_POST['article']);
           header('location:myarticles.php');
           break;
       case 'delete':
           $conn = $dbConn->getConnection();
           if (!$conn) {
               die("Connection failed" . mysqli_connect_error());
           } else {
               $sql='DELETE FROM `article` WHERE `article`.`Article_ID` = ? AND `article`.`Therapist_ID`= ?';

               $stmt = $conn->stmt_init();
               if (!$stmt->prepare($sql)) {
                   echo $stmt->error;
               } else {
                   $stmt->bind_param("ss", $_POST['articleID'], $UserID);
                   $stmt->execute();
                   $stmt->close();
                   $conn->close();
               }
           }
           header('location:myarticles.php');
           break;

       case 'modify':
           $conn = $dbConn->getConnection();
           if (!$conn) {
               die("Connection failed" . mysqli_connect_error());
           } else {
               $sql='UPDATE `article` SET `Article` = ? ,`Article_Title` = ? WHERE `article`.`Article_ID` = ? AND Therapist_ID=?';
               $stmt = $conn->stmt_init();
               if (!$stmt->prepare($sql)) {
                   echo $stmt->error;
               } else {
                   $stmt->bind_param("ssis", $_POST['article'],$_POST['title'],$_POST['articleID'],$UserID);
                   $stmt->execute();
                   $stmt->close();
                   $conn->close();
               }
           }
           header('location:myarticles.php');

           break;

       default:
           header('location:myarticles.php');
           break;

   }
}else{
    echo "<script>alert('Invalid Access');</script>";
    header('location :index.php');
}