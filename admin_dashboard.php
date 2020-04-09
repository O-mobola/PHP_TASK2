<?php require('lib/head.php');?>
<?php require('lib/nav.php');?>

<?php
if(!isset($_SESSION['loggedInAdmin'])){
  header("Location: admin_login.php");
}
?>
<div class="admin">
  <div><h2>Administrator Dashboard</h2></div>
  <div>
    <p><a href="new_admin.php">Add Admin</a></p>
    <p><a href="new_user.php">Add User</a></p>
  </div>
</div>
<hr/>

  Welcome come back Admin <?php echo  $first_name; ?>
  <?php echo "Last login is" .$currentLogin;?>


<?php require('lib/footer.php');?>