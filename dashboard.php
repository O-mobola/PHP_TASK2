<?php require('lib/head.php');?>
<?php require('lib/nav.php');?>

<?php
if(!isset($_SESSION['loggedIn'])){
  header("Location: login.php");
}
?>

<h3>Dashboard</h3>

  LoggedIn User ID: <?php echo $_SESSION['loggedIn']; ?>
  <?php echo "Your last login ".$currentLogin;?


<?php require('lib/footer.php');?>