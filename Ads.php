<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<?php
/**
 * Created by PhpStorm.
 * User: RyanKitcat
 * Date: 5/21/2018
 * Time: 2:15 AM
 */

class Ads
{
    private $script='
<script type="text/javascript">
sa_client = "2d307c716faa09e235f3d9da5b018a1d";
sa_code = "9c42a7c48626a5dfb1d92164c3dc8d06";
sa_protocol = ("https:"==document.location.protocol)?"https":"http";
sa_pline = "3";
sa_maxads = "4";
sa_bgcolor = "FFFFFF";
sa_bordercolor = "DDDDFF";
sa_superbordercolor = "DDDDFF";
sa_linkcolor = "000080";
sa_desccolor = "000000";
sa_urlcolor = "008000";
sa_b = "1";
sa_format = "linkbox_180x90";
sa_width = "180";
sa_height = "90";
sa_location = "5";
sa_radius = "10";
sa_borderwidth = "1";
sa_font = "0";
</script>
<script type="text/javascript" src="//sa.entireweb.com/sense2.js"></script>
';
    function getAds(){
        return $this->script;
    }

}