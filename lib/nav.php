
<!--NAVIGATION BAR-->
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php if(!isset($_SESSION['loggedIn']) /*||!isset($_SESSION['loggedInAdmin'])*/) { ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
 <li><a href="forgot.php">Forgot Password</a></li>
        <?php } else {?>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="reset.php">Reset Password</a></li>
		<?php } ?>
      </ul>
    </nav>
<!--END OF NAVIGATION-->