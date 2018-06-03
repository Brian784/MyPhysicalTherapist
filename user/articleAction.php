
<?php
/**
 * Created by PhpStorm.
 * User: RyanKitcat
 * Date: 6/1/2018
 * Time: 2:25 PM
 */
require 'includes/validate.php';

if(isset($_POST['action'])){
    if($_POST['action']==='postComment'){
        $sql='INSERT INTO `arcticle_comments` (`Article_Comment_ID`, `Account_ID`, `Article_ID`, `Time_Stamp`, `Comment`, `isApproved`) VALUES (NULL,'.$UserID.',\''.$_POST['articleID']. '\','.'current_timestamp,'.'\''.$_POST['comment'].'\',1)';
        $dbConn->setQuery($sql);
        $dbConn->executeQuery();
    }
    unset($_POST['action']);
    header('HTTP/1.1 307 Temporary Redirect');
    header('Location: article.php');
}else{
    header('location :index.php');
}