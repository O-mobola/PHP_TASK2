<?php include_once('lib/head.php');
#session_start();

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  header("Location: superAdmin_dashboard.php");
}
?>

<?php
//insert navigation bar
include_once('lib/nav.php');
?>

<p>
    <strong>
        You are here, please register.
    </strong>
</p>
<hr />
<p>All required fields must be appropriately filled.</p>

<!--form start-->
<form method="POST" action="processadmin.php">

    <p>
        <?php
    if(isset($_SESSION['error']) && !empty ($_SESSION['error'])) {
      echo "<span style='color: red'>" .$_SESSION['error']."</span>";

     #clear session error log
      session_unset();
    }
    ?>
    </p>
    <p>
        <label for="firstname">First Name</label><br />
        <input type="text" name="firstname" placeholder="First Name" />
    </p>
    <p>
        <label for="lastname">Last Name</label><br />
        <input type="text" name="lastname" placeholder="Last Name" />
    </p>
    <p>
        <label for="email">Email</label><br />
        <input type="email" name="email" placeholder="Email" />
    </p>
    <p>
        <label for="password">Password</label><br />
        <input type="password" name="password" placeholder="Password" required />
    </p>
    <p>
        <label for="gender">Gender</label><br />
        <select name="gender" required>
            <option>Select one</option>
            <option <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male'){
        echo 'selected';
      } ?>>Male</option>
            <option <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
        echo 'selected';
      } ?>>Female</option>
        </select>
    </p>
    <p>
        <label for="designation">Designation</label><br />
        <select name="designation" required>
            <option selected>Select one</option>
            <option <?php if(isset($_SESSION['designation'])){
        echo "value=" .$_SESSION['designation'];
      } ?>>Super Admin</option>
            <option <?php if(isset($_SESSION['designation'])){
        echo "value=" .$_SESSION['designation'];
      } ?>>Admin</option>
        </select>
    </p>
    <p>
        <button type="submit" name="submit">Register</button>
    </p>
</form>

<?php
//insert footer
require('lib/footer.php')
?>
