<?php include_once('lib/head.php');?>


   <h3>
	 Book an appointment with a specialist.
	 </h3><hr/>
<p>All required fields must be appropriately filled.</p>

<!--form start-->
<form method="POST" action="processregister.php">


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
    <label for="firstname">First Name</label><br/>
    <input type="text" name="firstname" placeholder="First Name" />
  </p>
  <p>
    <label for="lastname">Last Name</label><br/>
    <input type="text" name="lastname" placeholder="Last Name"/>
  </p>
  <p>
    <label for="email">Email</label><br/>
    <input type="email" name="email" placeholder="Email"/>
  </p>
  <p>
    <label for="password">Password</label><br/>
    <input type="password" name="password" placeholder="Password" required/>
  </p>
  <p>
    <label for="gender">Gender</label><br/>
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
	<label for="date">Select Date</label><br/>
	<input type="date" name="date" required/>
	</p>
 <p>
	<label for="time">Select Time</label><br/>
	<input type="time" name="time" required/>
	</p>
 <p>
	<label for="message">Leave message</label><br/>
	<textarea type="text" name="message">put your message here...</textarea>
	</p>
  <p>
    <label for="department">Department</label><br/>
     <input type="text" name="department"/>
  </p>
  <p>
    <button type="submit" name="submit">Book</button>
  </p>
</form>


<?php include_once('lib/footer.php');?>