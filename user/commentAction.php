<?php
/**
 * Created by PhpStorm.
 * User: RyanKitcat
 * Date: 6/1/2018
 * Time: 2:38 AM
 */
require 'includes/validate.php';
if(isset($_POST['action'])){
    switch ($_POST['action']){
        case 'addVideo':
            if(!$dbConn->isVideoSaved($UserID,($_POST['videoID']))){
                $sql = 'INSERT INTO `user_saved_videos` (`Video_ID`, `User_ID`, `Time_Saved`) VALUES (\'' . $_POST['videoID'] . '\',\'' . $UserID . '\', CURRENT_TIMESTAMP)';
                $dbConn->setQuery($sql);
                $dbConn->executeQuery();
                echo $sql;
            }
            break;
        case 'deleteVideo':
            if($dbConn->isVideoSaved($UserID,($_POST['videoID']))){
                $sql = 'DELETE FROM `user_saved_videos` WHERE `user_saved_videos`.`Video_ID` = '.$_POST['videoID'] .' AND `user_saved_videos`.`User_ID` = '.$UserID;
                $dbConn->setQuery($sql);
                $dbConn->executeQuery();
            }
            break;
        case 'postComment':
            $sql='INSERT INTO `video_comments` (`Video_Comment_ID`, `Account_ID`, `Video_ID`, `Time_Stamp`, `Comment`, `isApprove`) VALUES (NULL,'. $UserID.','.$_POST['videoID'].', CURRENT_TIMESTAMP,\''.$_POST['comment'].'\',1)';
            $dbConn->setQuery($sql);
            $dbConn->executeQuery();
            break;
    }
    unset($_POST['action']);
    header('HTTP/1.1 307 Temporary Redirect');
    header('Location: playvideo.php');

}