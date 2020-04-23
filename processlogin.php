<?php
session_start();

#print_r($_POST);


//check for errors in submission:

$errorCount = 0;


//email & password validation:
$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password= $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

//retain input
$_SESSION['email'] = $email;

if ($errorCount > 0){
  //what to do ; redirect to another page
  $session_error = "You have " .$errorCount. " error";

  if($errorCount > 1) {
    $session_error .= "s";
  }
  $session_error .= " in your submission";
  $_SESSION['error'] = $session_error;

  header("Location: login.php");
} else {

  //check if user exist by looping through users in database:

  $allUsers = scandir("db/users/");
  $countAllUsers = count($allUsers);

  for ($counter = 0; $counter < $countAllUsers; $counter++) {
       // loop through
      $currentUser = $allUsers[$counter];

  if ($currentUser == $email. ".json") {
      // check for passwords
      $userString = file_get_contents("db/users/".$currentUser);
      $userData = json_decode($userString);
      $passwordFromDB = $userData->password;
      //compare passwords from user & the one in db:
      $passwordFromUser = password_verify($password,$passwordFromDB);


      //what to do
      if($passwordFromDB == $passwordFromUser){
        $_SESSION['loggedIn'] = $userData -> ID;
        $_SESSION['name'] = $userData -> firstname;
        $_SESSION['designation'] = $userData -> designation;
        $_SESSION['date_registered'] = $userData -> date_registered;
        $_SESSION['time_registered'] = $userData -> time_registered;

     /*check the role or designation of the user to send to appropriate page*/

        if ($userData ->designation == 'Medical staff') {
          header("Location: dashboard.php");
		  die();
        }
		if($userData ->designation == 'Patient') {
          header("Location: patient_dashboard.php");
          die();
        }
        if($userData ->designation == 'Super Admin') {
            header("Location: superAdmin_dashboard.php");
            die();
        }
		if($userData ->designation =='Admin') {
		  header("Location: admin_dashboard.php");
		  die();
		}
      }
  }
}
  $_SESSION['error'] = "Invalid email or password";
  header("Location: login.php");
  die();
}

?>