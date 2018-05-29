<?php
if(isset($_POST['isSignout'])){
    if($_POST['isSignout']==true){
        $CookieMaker->deleteCookie('UserEmailCookie');
        $CookieMaker->deleteCookie('UserPswCookie');
        $CookieMaker->deleteCookie('UserIDCookie');
        $SessionMaker->deleteSession('UserEmailSession');
        $SessionMaker->deleteSession('UserPswSession');
        $SessionMaker->deleteSession('UserIDSession');
    }

}

?>