<?php debug_backtrace() || die ("<h2>Access Denied!</h2> This file is protected and not available to public."); ?>
<!-- Nav -->
<div>

    <nav id="nav">
        <ul>
            <li><a href="../index.html"><img src="images/MyPtLogo.png" width="150" height="90"></a></li>
            <li>
                <a href="index.php">Articles</a>
                <ul>
                    <li><a href="index.php">Articles</a></form></li>
                    <li><a href="#">New Articles</a></form></li>
                    <li><a href="myarticles.php">My Articles</a></form></li>
                </ul>
            </li>
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

                <a href="#">Videos</a>
                <ul>
                    <li><a href="videos.php?part=upper">Videos</a></li>
                    <li><a href="#">New Video</a></form></li>
                    <li><a href="#">My Videos</a></form></li>
                    <li><a href="savevideos.php">Saved Videos</a></form></li>
                </ul>
            </li>

            <li>
                <a href="#">Appointment</a>
                <ul>
                    <li><a href="newappointment.php">Appointment Request</a></li>
                    <li><a href="myappointment.php">My Appointment</a></li>
                </ul>
            </li>

        </ul>


    </nav>
</div>