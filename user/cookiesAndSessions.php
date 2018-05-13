<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>

<?php

class CookiesTracking {

	function createCookie($cookie_name, $cookie_value){
		setcookie($cookie_name, $cookie_value, time() + (86400 *30), '/');
	}

	function getCookieValue($cookie_name){

		if(!isset($_COOKIE[$cookie_name])) {
    		return false;
		} else {
    		return $_COOKIE[$cookie_name];
    	}
	}

	function deleteCookie($cookie_name,$cookie_value){
	    unset($_COOKIE[$cookie_name]);
		setcookie($cookie_name, $cookie_value, time() - 3600, '/');
	}

}


class SessionsTracking {

    function createSession($session_name, $session_value){
        $_SESSION["$session_name"] = $session_value;
    }

    function getSession($session_name){

        if(!isset($_SESSION[$session_name]))
        {
            return false;
        }
        else
        {
            return $_SESSION[$session_name];
        }
    }

    function deleteSession($session_name){
        unset($_SESSION[$session_name]); //destroy product session item
    }
}