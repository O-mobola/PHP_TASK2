
<!--NAVIGATION BAR-->
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php if(!isset($_SESSION['loggedIn']) ||!isset($_SESSION['loggedInAdmin'])) { ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="admin_login.php">Login as Admin</a></li>
        <?php } else {?>
        <li><a href="logout.php">Logout</a></li>
        <?php } ?>
        <li><a href="reset.php">Reset</a></li>
      </ul>
    </nav>
<!--END OF NAVIGATION-->