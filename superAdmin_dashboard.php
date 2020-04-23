<?php require('lib/head.php');?>
<?php require('lib/nav.php');?>

<?php
if(!isset($_SESSION['loggedIn'])){
  header("Location: login.php");
}
?>
<div class="admin">
  <div><h2>SHN Super Administrator Dashboard</h2></div>
  <div>
    <p><a href="new_admin.php">Add Admin</a></p>
    <p><a href="new_user.php">Add User</a></p>
  </div>
</div>
<hr/>

  Welcome back <?php echo $_SESSION['name'];?>

  <P><?php echo "Registered on " .$_SESSION['date_registered']. "<br/>Time: ". $_SESSION['time_registered'];?></P>
  <P><?php echo "Last login date: " .$currentDate;?></P>
  <P><?php echo "Last login time: " .$currentTime;?></P>


<?php require('lib/footer.php');?>