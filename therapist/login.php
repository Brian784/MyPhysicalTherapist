<?php
session_start();

include "../user/cookiesAndSessions.php";
include "../user/EncryptClass.php";
include "DatabaseConnectorClass.php";
$cookieMaker = new CookiesTracking();
$sessionMaker = new SessionsTracking();
$DBconn = new DababaseConnector();
$encrtptor = new EncryptClass();


if (isset($_POST['isSignout'])) {
    if ($_POST['isSignout'] == true) {
        $EmaiCookielValue = $cookieMaker->getCookieValue('TherapistEmailCookie');
        $PsdCookieValue = $cookieMaker->getCookieValue('TherapistPswCookie');
        $UserIDCookie = $cookieMaker->getCookieValue('TherapistIDCookie');
        $emailSessionValue = $sessionMaker->getSession('TherapistEmailSession');
        $psdSessionValue = $sessionMaker->getSession('TherapistPswSession');
        $UserSessionValue = $sessionMaker->getSession('TherapistIDSession');
        if ($EmaiCookielValue != null) {
            $cookieMaker->deleteCookie('TherapistEmailCookie', '');
        }
        if ($PsdCookieValue != null) {
            $cookieMaker->deleteCookie('TherapistPswCookie', '');
        }
        if ($UserIDCookie != null) {
            $cookieMaker->deleteCookie('TherapistIDCookie', '');
        }
        if ($emailSessionValue != null) {
            $sessionMaker->deleteSession('TherapistEmailSession');
        }
        if ($psdSessionValue != null) {
            $sessionMaker->deleteSession('TherapistEmailSession');
        }
        if ($UserSessionValue != null) {
            $sessionMaker->deleteSession('TherapistIDSession');
        }

    }
}

$EmaiCookielValue = $cookieMaker->getCookieValue('TherapistEmailCookie');
$PsdCookieValue = $cookieMaker->getCookieValue('TherapistPswCookie');
if ($EmaiCookielValue != null && $PsdCookieValue != null) {
    $EmaiCookielValue = $encrtptor->crypt_function($EmaiCookielValue, 'd');
    $PsdCookieValue = $encrtptor->crypt_function($PsdCookieValue, 'd');
    $isValid = $DBconn->validateTherapist($EmaiCookielValue, $PsdCookieValue);
    if ($isValid) {
        header('Location: index.php');
    } else {
        $cookieMaker->deleteCookie('TherapistEmailCookie');
        $cookieMaker->deleteCookie('TherapistPswCookie');
        $cookieMaker->deleteCookie('TherapistIDCookie');

    }

} else {
    $emailSessionValue = $sessionMaker->getSession('TherapistEmailSession');
    $psdSessionValue = $sessionMaker->getSession('TherapistPswSession');
    $psdSessionValue = $encrtptor->crypt_function($psdSessionValue, 'd');
    $emailSessionValue = $encrtptor->crypt_function($emailSessionValue, 'd');

    $isValid = $DBconn->validateTherapist($emailSessionValue, $psdSessionValue);
    if ($isValid) {
        header('Location: index.php');
    } else {
        $sessionMaker->deleteSession('TherapistEmailSession');
        $sessionMaker->deleteSession('TherapistPswSession');
        $sessionMaker->deleteSession('TherapistSession');
    }

}

//submit
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $isValid = $DBconn->validateTherapist($email, $password);
    if ($isValid) {
        $id = $DBconn->getTherapist($email, $password);
        $encryptedPsd = $encrtptor->crypt_function($password, 'e');
        $encryptedEmail = $encrtptor->crypt_function($email, 'e');
        $encryptedID = $encrtptor->crypt_function($id, 'e');
        $check_value = isset($_POST['rememberMe']) ? 1 : 0;
        if ($check_value == 1) {
            $cookieMaker->createCookie('TherapistEmailCookie', $encryptedEmail);
            $cookieMaker->createCookie('TherapistPswCookie', $encryptedPsd);
            $cookieMaker->createCookie('TherapistIDCookie', $encryptedID);

        }
        session_start();
        $sessionMaker->createSession('TherapistEmailSession', $encryptedEmail);
        $sessionMaker->createSession('TherapistPswSession', $encryptedPsd);
        $sessionMaker->createSession('TherapistIDSession', $encryptedID);

        header('Location: index.php');
        exit();
    } else {
        echo '<script>alert("User Not Found");</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>


    <link rel='stylesheet prefetch' href='vendor/bootstrap/css/bootstrap.min.css'>

    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

<div class="wrapper">
    <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please login</h2>
        <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus=""/>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me

            <label>
                <a href="google.com">Register</a>
            </label>
        </label>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

    </form>
</div>


</body>

</html>
