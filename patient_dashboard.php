<?php require('lib/head.php');?>
<?php require('lib/nav.php');?>

<?php
if(!isset($_SESSION['loggedIn'])){
  header("Location: login.php");
}
?>

<h3>SNH PATIENT DASHBOARD</h3>
<h4>Welcome <?php echo $_SESSION['name'];?></h4>

  <P>You are logged in as <?php echo $_SESSION['designation']; ?>
  </p>
  <p>User ID: <?php echo $_SESSION['loggedIn']; ?>
  </p>

<?php $timeZone;?>
  <p>Registered on
  <?php echo $_SESSION['date_registered']. " ".$_SESSION['time_registered'];?>
  </p>

<div>
  <p><a href="patient_appointment.php">Book Appointment</a>
  </p>
  <p><a href="pay_bill.php" target="_blank">Pay Bill</a>
  </p>
</div>

<?php require('lib/footer.php');?>