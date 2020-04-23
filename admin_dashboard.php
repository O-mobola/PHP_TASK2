<?php require('lib/head.php');?>
<?php require('lib/nav.php');?>

<?php
if(!isset($_SESSION['loggedIn'])){
  header("Location: login.php");
}
?>
<div class="admin">
  <div><h2>SNH Administrator Dashboard</h2></div>
<hr/>

  Welcome back Admin <?php echo $_SESSION['name']; ?>

  <?php $timeZone; ?>
  <P><?php echo "Registered on " .$_SESSION['date_registered']. "<br/>Time: ". $_SESSION['time_registered'];?></P>
  <P><?php echo "Last login date: " .$currentLogin;?></P>
  <P><?php echo "Last login time: " .$currentLogin;?></P>


<?php require('lib/footer.php');?>