<?php
session_start();

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

//submit
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $isValid = $DBconn->validateUser($email, $password);
    if ($isValid) {
        $id = $DBconn->getUser($email, $password);
        $encryptedPsd = $encrtptor->crypt_function($password, 'e');
        $encryptedEmail = $encrtptor->crypt_function($email, 'e');
        $encryptedID = $encrtptor->crypt_function($id, 'e');
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
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>


</body>

</html>
