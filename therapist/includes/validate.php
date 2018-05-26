<?php
include '../user/EncryptClass.php';
include '../user/cookiesAndSessions.php';
include "DatabaseConnectorClass.php";
$CookieMaker = new CookiesTracking();
$SessionMaker = new SessionsTracking();
$encryptor = new EncryptClass();
$isLogined = true;
$dbConn = new DababaseConnector();
$UserID = null;
if ($CookieMaker->getCookieValue('TherapistEmailCookie') != null && $CookieMaker->getCookieValue('TherapistPswCookie') != null) {
    //Received completed Cookies
    //decrypt
    $email = $encryptor->crypt_function($CookieMaker->getCookieValue('TherapistEmailCookie'), 'd');
    $pass = $encryptor->crypt_function($CookieMaker->getCookieValue('TherapistPswCookie'), 'd');
    $UserID = $encryptor->crypt_function($CookieMaker->getCookieValue('TherapistIDCookie'), 'd');
    $isLogined = $dbConn->validateTherapist($email, $pass);

} else {
    if ($SessionMaker->getSession('TherapistEmailSession') != null && $SessionMaker->getSession('TherapistPswSession') != null) {
        //received complete sessions
        //decrypt
        $email = $encryptor->crypt_function($SessionMaker->getSession('TherapistEmailSession'), 'd');
        $pass = $encryptor->crypt_function($SessionMaker->getSession('TherapistPswSession'), 'd');
        $UserID = $encryptor->crypt_function($SessionMaker->getSession('TherapistIDSession'), 'd');
        $isLogined = $dbConn->validateTherapist($email, $pass);
    } else {
        //InvalidAccess
        //no cookies no sessions
        header('Location:login.php');
        die('<p>Only registered user can access this page,you will be redirectd to welcome page in 4 seconds</p>');

    }
}
?>


