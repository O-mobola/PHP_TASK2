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

$token= $_POST['token'] != "" ? $_POST['token'] : $errorCount++;
$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password= $_POST['password'] != "" ? $_POST['password'] : $errorCount++;


$_SESSION['token'] = $token;
$_SESSION['email'] = $email;


if($errorCount > 0) {

  //what to do ; redirect to another page
  $session_error = "You have " .$errorCount. " error";

  if($errorCount > 1) {
    $session_error .= "s";
  }
  $session_error .= " in your submission";
  $_SESSION['error'] = $session_error;

  header("Location: reset.php");
} else {

  /*auto ID generator. Count all users and assign next number to next user by increment of 1
  */

 $allUsersTokens = scandir("db/tokens/");
 $countAllUsersTokens = count($allUsersTokens);



  /*save user data into a file created specifically for user and store it in the database also as a .json file
  */

  /*  $userObjects = [
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
*/
    //checks for if user exist

    for ($counter = 0; $counter < $countAllUsersTokens; $counter++) {
       // code...
       $currentUserTokens = $allUsersTokens[$counter];
       if ($currentUserTokens == $email. ".json") {
         // code...
         die();
       }
    }

  //create file and redirect
    $_SESSION['error'] = "Password reset failed. Invalid email or token.";
    header("Location: reset.php");
  #die();
}







?>