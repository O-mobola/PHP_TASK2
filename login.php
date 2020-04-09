<?php 
//inserting the head structure
require('lib/head.php');
#session_start();
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  header("Location: dashboard.php");
}
?>
  <p>
    <?php
    if(isset($_SESSION['message']) && !empty ($_SESSION['message'])) {
      echo "<span style='color: green'>" .$_SESSION['message']."</span>";
      
     #clear session login direct log 
      session_destroy();
    }
    ?>
  </p>
  
<h1>Log in</h1><hr/>
 
<?php
//insert navigation bar
require('lib/nav.php')
?>
<p>
<strong>
   Please Login.
  </strong>
</p>
<p>All required fields must be appropriately filled.</p>

<!--form start-->
<form method="POST" action="processlogin.php">
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
    <label for="email">Email</label><br/>
    <input <?php
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
      echo "value =" .$_SESSION['email'];
    }
    ?>
    type="email" name="email" placeholder="Email"/>
  </p>
  <p>
    <label for="password">Password</label><br/>
    <input type="password" name="password" placeholder="Password"/>
  </p>
  <p>
    <button type="submit">login</button>
  </p>
</form>

<?php
//insert footer bar
require('lib/footer.php')
?>