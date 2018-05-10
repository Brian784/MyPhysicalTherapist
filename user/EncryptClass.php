<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<?php

class EncryptClass
{
    private $secret_key= 'Javaislife';
    private $secret_iv = 'Javamakesyouabetterperson';
function crypt_function( $string, $action) {
// you may change these values to your own
$output = false;
$encrypt_method = "AES-256-CBC";
$key = hash( 'sha256', $this->secret_key );
$iv = substr( hash( 'sha256', $this->secret_iv ), 0, 16 );

if( $action == 'e' ) {
$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
}
else if( $action == 'd' ){
$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
}

return $output;
}

}