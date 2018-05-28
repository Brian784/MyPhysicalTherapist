<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="../index.html"><img src="images/MyPtLogo.png" width="150" height="90"></a></li>
        <li><a href="index.php">Home</a></li>
        <li>
            <a href="#">User</a>
            <ul>
                <?php

                echo '<form id="UserIDForm"  action="userprofile.php" method="get">
  <input type="hidden" name="userID" value=' . $UserID . '>
</form>';
                echo '<form id="LogoutForm"  action="login.php" method="post">
  <input type="hidden" name="isSignout" value="true">
</form>';
                echo ' <li><a  href="userprofile.php">User Profile</a></form></li>';

                echo ' <li><a onclick="document.getElementById(\'LogoutForm\').submit();">Logout</a></li>';

                ?>

            </ul>
        </li>
        <li>

            <a href="videos.php"">Videos</a>
            <ul>
                <li><a href="videos.php">Videos</a></li>
                <li><a href="savevideos.php">Saved Videos</a></form></li>
            </ul>
        </li>

        <li>
            <a href="#">Appointment</a>
            <ul>
                <li><a href="newappointment.php">New Appointment</a></li>
                <li><a href="myappointment.php">My Appointment</a></li>
            </ul>
        </li>
        <li><a href="contactinfo.php">Contact Information</a></li>
    </ul>


</nav>