<?php
require 'includes/validate.php';

$allowedExts = array("mp4");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4"))

    && ($_FILES["file"]["size"] <= 100000000)
    && in_array($extension, $allowedExts))

{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        $sql='SELECT video_library.Video_ID FROM video_library ORDER BY video_library.Video_ID DESC LIMIT 1;';
        $dbConn->setQuery($sql);
        $result=$dbConn->executeSelectQuery();
        while ($row = @mysqli_fetch_array($result)){
            $maxID=(int)$row['Video_ID'];
        }
        ++$maxID;
        $_FILES["file"]["name"]=$maxID.'.'.$extension;
        $sql='INSERT INTO `video_library` (`Video_ID`, `Therapist_ID`, `Video_Title`, `Video_Description`, `Video_URL`, `Body_Part`, `TimePublished`) VALUES ('.$maxID.', \''.$UserID.'\', \''.$_POST['title'].'\', \''.$_POST['description'].'\', \''.$_FILES["file"]["name"].'\', \''.$_POST['part'].'\', CURRENT_TIMESTAMP);';
        echo $sql;
        $dbConn->setQuery($sql);
        $dbConn->executeQuery();
       move_uploaded_file($_FILES["file"]["tmp_name"],
              "videos/" . $_FILES["file"]["name"]);
        header('location:myvideos.php');
    }
}else {
   header('location:index.php');
}
?>