<!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="index.php"><img src="images/MyPtLogo.png" width="150" height="90"></a></li>
        <li><a href="index.php">Home</a></li>
        <li>
            <a href="videos.php">User</a>
            <ul>
                <?php
                if (!$isLogined) {
                    echo ' <li><a href="login.php">Login</a></li>';
                    echo ' <li><a href="#">Register</a></li>';
                } else {

                    echo '<form id="LogoutForm"  action="index.php" method="post">
  <input type="hidden" name="isSignout" value="true">
</form>';
                    echo ' <li><a  href="userprofile.php">User Profile</a></li>';
                    echo ' <li><a onclick="document.getElementById(\'LogoutForm\').submit();">Logout</a></li>';
                }
                ?>

            </ul>
        </li>
        <li>

            <a href="#">Videos</a>
            <ul>
                <li><a href="videos.php?part=upper">Upper Body</a></li>
                <li><a href="videos.php?part=lower">Lower Body</a></li>
                <?php
                if ($isLogined) {
                    echo '<li><a  href="savevideos.php">Saved Videos</a></li>';
                }
                ?>
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

</div>