<?php

if (isset($_POST['isSignout'])) {
    if ($_POST['isSignout'] == true) {
        $EmaiCookielValue = $CookieMaker->getCookieValue('UserEmailCookie');
        $PsdCookieValue = $CookieMaker->getCookieValue('UserPswCookie');
        $UserIDCookie = $CookieMaker->getCookieValue('UserIDCookie');
        $emailSessionValue = $SessionMaker->getSession('UserEmailSession');
        $psdSessionValue = $SessionMaker->getSession('UserPswSession');
        $UserSessionValue = $SessionMaker->getSession('UserIDSession');
        if ($EmaiCookielValue != null) {
            $CookieMaker->deleteCookie('UserEmailCookie', '');
        }
        if ($PsdCookieValue != null) {
            $CookieMaker->deleteCookie('UserPswCookie', '');
        }
        if ($UserIDCookie != null) {
            $CookieMaker->deleteCookie('UserIDCookie', '');
        }
        if ($emailSessionValue != null) {
            $SessionMaker->deleteSession('UserEmailSession');
        }
        if ($psdSessionValue != null) {
            $SessionMaker->deleteSession('UserEmailSession');
        }
        if ($UserSessionValue != null) {
            $SessionMaker->deleteSession('UserIDSession');
        }

    }
}

$isLogined = true;
$dbConn = new DababaseConnector();
$UserID = null;
$itemperpage = 10;
$totalRecords = null;
if ($CookieMaker->getCookieValue('UserEmailCookie') != null && $CookieMaker->getCookieValue('UserPswCookie') != null) {
    //Received completed Cookies
    //decrypt
    $email = $encryptor->crypt_function($CookieMaker->getCookieValue('UserEmailCookie'), 'd');
    $pass = $encryptor->crypt_function($CookieMaker->getCookieValue('UserPswCookie'), 'd');
    $UserID = $encryptor->crypt_function($CookieMaker->getCookieValue('UserIDCookie'), 'd');
    $isLogined = $dbConn->validateUser($email, $pass);

} else {
    if ($SessionMaker->getSession('UserEmailSession') != null && $SessionMaker->getSession('UserPswSession') != null) {
        //received complete sessions
        //decrypt
        $email = $encryptor->crypt_function($SessionMaker->getSession('UserEmailSession'), 'd');
        $pass = $encryptor->crypt_function($SessionMaker->getSession('UserPswSession'), 'd');
        $UserID = $encryptor->crypt_function($SessionMaker->getSession('UserIDSession'), 'd');
        $isLogined = $dbConn->validateUser($email, $pass);
    } else {
        //InvalidAccess
        //no cookies no sessions
        $isLogined = false;
    }
}

?>