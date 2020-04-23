<?php
//inserting the head structure
require('lib/head.php')
  if(!isset($_GET['token']) && !isset($_SESSION['error'])){
	$_SESSION['error'] = "You cannot vuew this page";
	header("Location: register.php");
  }
?>


<h3>Reset Password [email]</h3><hr/>

<form method="post" action="processreset.php">


  <p>
    <?php
    if(isset($_SESSION['error']) && !empty ($_SESSION['error'])) {
      echo "<span style='color: red'>" .$_SESSION['error']."</span>";

     #clear session error log
      session_unset();
    }
    ?>
  </p>
  <input
		 <?php if(isset($_SESSION['token']){
  echo "value".$_SESSION['token']. "";
}else{
  echo "value" .$_GET['token']. ""
}?>

		type="hidden" name="token" value="<?php echo $_GET['token'];?>"/>

 <p>
	<label for="email"></label><br/>
	<input
		   <?php
				  if(isset($_SESSION['email'])){
	echo "value".$_SESSION['email'];
    }
   type="text" name="email" placeholder="Email"/>
</p>
 <p>
	<label for="password">New Password</label><br/>
	<input type="password" name="password" required/>
</p>
</form>

<?php
//insert footer bar
require('lib/footer.php')
?>