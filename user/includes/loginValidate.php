<?php

include "cookiesAndSessions.php";
include "EncryptClass.php";
include "DatabaseConnectorClass.php";
$cookieMaker = new CookiesTracking();
$sessionMaker = new SessionsTracking();
$DBconn = new DababaseConnector();
$encrtptor = new EncryptClass();

$EmaiCookielValue = $cookieMaker->getCookieValue('UserEmailCookie');
$PsdCookieValue = $cookieMaker->getCookieValue('UserPswCookie');
if ($EmaiCookielValue != null && $PsdCookieValue != null) {
    $EmaiCookielValue = $encrtptor->crypt_function($EmaiCookielValue, 'd');
    $PsdCookieValue = $encrtptor->crypt_function($PsdCookieValue, 'd');
    $isValid = $DBconn->validateUser($EmaiCookielValue, $PsdCookieValue);
    if ($isValid) {
        header('Location: index.php');
    } else {
        $cookieMaker->deleteCookie('UserEmailCookie');
        $cookieMaker->deleteCookie('UserPswCookie');
        $cookieMaker->deleteCookie('UserIDCookie');

    }

} else {
    $emailSessionValue = $sessionMaker->getSession('UserEmailSession');
    $psdSessionValue = $sessionMaker->getSession('UserPswSession');
    if($emailSessionValue!=null && $psdSessionValue!=null){
    $psdSessionValue = $encrtptor->crypt_function($psdSessionValue, 'd');
    $emailSessionValue = $encrtptor->crypt_function($emailSessionValue, 'd');

    $isValid = $DBconn->validateUser($emailSessionValue, $psdSessionValue);
    if ($isValid) {
        header('Location: index.php');
    } else {
        $sessionMaker->deleteSession('UserEmailSession');
        $sessionMaker->deleteSession('UserPswSession');
        $sessionMaker->deleteSession('UserIDSession');
    }
   }

}

//submit
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $isValid = $DBconn->validateUser($email, $password);
    if ($isValid) {
        $encryptedPsd = $encrtptor->crypt_function($password, 'e');
        $encryptedEmail = $encrtptor->crypt_function($email, 'e');
        $encryptedID = $encrtptor->crypt_function($DBconn->getUser($email,$password), 'e');
        $check_value = isset($_POST['rememberMe']) ? 1 : 0;
        if ($check_value == 1) {
            $cookieMaker->createCookie('UserEmailCookie', $encryptedEmail);
            $cookieMaker->createCookie('UserPswCookie', $encryptedPsd);
            $cookieMaker->createCookie('UserIDCookie', $encryptedID);

        }
        session_start();
        $sessionMaker->createSession('UserEmailSession', $encryptedEmail);
        $sessionMaker->createSession('UserPswSession', $encryptedPsd);
        $sessionMaker->createSession('UserIDSession', $encryptedID);

        header('Location: index.php');
        exit();
    } else {
        echo '<script>alert("User Not Found");</script>';
    }

}
?>