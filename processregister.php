<?php
session_start();
#print_r($_POST);



#getting user input:
//using ternary operator for validation:

$timeZone = date_default_timezone_set('Africa/Lagos');
$dateRegistered = date('d-m-y');
$timeRegistered = date('h:i:sa');

$currentDate = date('d/m/y');
$currentTime = date('h:i:sa');

$errorCount = 0;

$first_name= $_POST['firstname'] != "" ? $_POST['firstname'] : $errorCount++;
$last_name= $_POST['lastname'] != "" ? $_POST['lastname'] : $errorCount++;
$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password= $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$gender= $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation= $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department= $_POST['department'] != "" ? $_POST['department'] : $errorCount++;

#check for retainment of input:
$_SESSION['firstname'] = $first_name;
$_SESSION['lastname'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


   if($errorCount > 0) {

  //what to do ; redirect to another page
    $_SESSION['error'] = "All fields are required please and enter a valid email";
    header("Location: register.php");
} else {

  /*auto ID generator. Count all users and assign next number to next user by increment of 1
  */

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);
    $newUserId = ($countAllUsers-1);

  /*save user data into a file created specifically for user and store it in the database also as a .json file
  */

    $userObjects = [
      'ID' => $newUserId,
      'firstname' => $first_name,
      'lastname' => $last_name,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT),
      'gender' => $gender,
      'designation' => $designation,
      'department' => $department,
      'date_registered' => $dateRegistered,
      'time_registered' => $timeRegistered
      ];

    //checks for if user exist

    for ($counter = 0; $counter < $countAllUsers; $counter++) {
       // code...
       $currentUser = $allUsers[$counter];
       if ($currentUser == $email. ".json") {
         // code...
         $_SESSION['error'] = "Registration failed. User already exist";
         header("Location: register.php");
         die();
       }
    }

  //create file and redirect
  file_put_contents("db/users/" $email. ".json", json_encode($userObjects));
  $_SESSION['message'] = "You have successfully registered " .$first_name."  You can now Log in";
  header("Location: login.php");
  #die();
}

/*$last_name= $_POST['lastname'];
$email= $_POST['email'];
$password= $_POST['password'];
$gender= $_POST['gender'];
$designation= $_POST['designation'];
$department= $_POST['deprtment'];*/

#$errorArray ='';

#validating the emails using if:

// if ($first_name=="") {
//   $errorArray = 'first_name must not be blank';


// if ($first_name=="") {
//   $errorArray = 'first_name must not be blank';
// }

// if ($lastt_name=="") {
//   $errorArray = 'last_name must not be blank';
// }

// if ($email =="") {
//   $errorArray = 'email must not be blank';
// }

// if ($password=="") {
//   $errorArray = 'password must not be blank';
// }
// if ($designation=="") {
//   $errorArray = 'designation must not be blank';
// }
// if ($department=="") {
//   $errorArray = 'deprtment must not be blank';
// }

?>