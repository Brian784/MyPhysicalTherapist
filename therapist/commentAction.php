<?php
/**
 * Created by PhpStorm.
 * User: RyanKitcat
 * Date: 6/1/2018
 * Time: 3:10 AM
 */
require 'includes/validate.php';
if(isset($_POST['action'])){

    switch ($_POST['action']){
        case 'addVideo':
            if(!$dbConn->isVideoSaved($UserID,($_POST['videoID']))){
                $sql = 'INSERT INTO `therapist_saved_videos` (`Video_ID`, `Therapist_ID`, `Time_Saved`) VALUES (\'' . $_POST['videoID'] . '\',\'' . $UserID . '\', CURRENT_TIMESTAMP)';
                $dbConn->setQuery($sql);
                $dbConn->executeQuery();
            }
            break;
        case 'deleteVideo':
            if($dbConn->isVideoSaved($UserID,($_POST['videoID']))){
                $sql = 'DELETE FROM `therapist_saved_videos` WHERE `therapist_saved_videos`.`Video_ID` = '.$_POST['videoID'] .' AND `therapist_saved_videos`.`Therapist_ID` = '.$UserID;
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

}
header('HTTP/1.1 307 Temporary Redirect');
header('Location: playvideo.php');

