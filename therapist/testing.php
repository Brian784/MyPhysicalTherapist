<?php
/**
 * Created by PhpStorm.
 * User: RyanKitcat
 * Date: 5/26/2018
 * Time: 2:36 PM
 */
session_start();
include_once "DatabaseConnectorClass.php";
include_once "../user/cookiesAndSessions.php";
include_once "../user/EncryptClass.php";
$cookieMaker = new CookiesTracking();
$sessionMaker = new SessionsTracking();
$DBconn = new DababaseConnector();
$encrtptor = new EncryptClass();

$EmaiCookielValue = $cookieMaker->getCookieValue('TherapistEmailCookie');
$PsdCookieValue = $cookieMaker->getCookieValue('TherapistPswCookie');
$IDCookieValue = $cookieMaker->getCookieValue('TherapistIDCookie');

$EmaiCookielValue = $encrtptor->crypt_function($EmaiCookielValue, 'd');
$PsdCookieValue = $encrtptor->crypt_function($PsdCookieValue, 'd');
$IDCookieValue = $encrtptor->crypt_function($IDCookieValue, 'd');
$isValid = $DBconn->validateTherapist($EmaiCookielValue, $PsdCookieValue);
echo $DBconn->query;

echo $isValid.'<br>';
echo $IDCookieValue.'<br>';
echo $EmaiCookielValue.'<br>';
echo $PsdCookieValue.'<br>';

