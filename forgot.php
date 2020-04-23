<?php include_once('lib/head.php');?>
<?php include_once('lib/nav.php');?>

<h3>Forgot Password</h3>
<p>Please provide the email used to register</p>

<form action="processforgot.php" method="post">

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
  <input <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
  echo "value=" .$_SESSION['email'];
}?>
		 type="email" name="email" placeholder="sample@email.com" required/>
</p>

  <p>
	<button type="submit" name="submit">Send</button>
  </p>

</form>

<?php include_once('lib/footer.php');?>