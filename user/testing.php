<?php
include "DatabaseConnectorClass.php";
$DatabaseConn=new DababaseConnector();
$sql='SELECT a.Comment_Log_ID ,a.Article_ID,a.Article_Title,SUBSTRING( a.Article,1,1000) as Article,b.First_Name,b.Last_Name FROM Article a INNER JOIN Therapist_Account b WHERE a.Therapist_ID = b.Therapist_ID AND b.isValidated = 1';
echo $sql;
$DatabaseConn->setQuery($sql);
$result=$DatabaseConn->executeSelectQuery();

while ($row = @mysqli_fetch_array($result)) {
    echo '<br>' . $row['First_Name'] . ' | ';
    echo $row['Last_Name'] . ' | ';
    echo $row['Article_Title'] . ' | ';
    echo '<p>'.$row['Article'] . ' </p> ';
    echo $row['Comment_Log_ID'] . ' | ';
}
$DatabaseConn->closeConn();
?>
