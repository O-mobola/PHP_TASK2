<?php session_start();


#check through registered user & validate user input:
$errorCount = 0;


$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;

$_SESSION['email'] = $email;


   if($errorCount > 0) {

  //if there is/are errors redirect to the same page.
    $_SESSION['error'] = "All fields are required please and enter a valid email";
    header("Location: forgot.php");
} else {

  //scan through user registration files in database
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);



    for ($counter = 0; $counter < $countAllUsers; $counter++) {
       // code...
       $currentUser = $allUsers[$counter];
       if ($currentUser == $email. ".json") {
         // if user email exist, send reset code

//generates token

$token = " ";
$alphabets = ["a","b","c","d","e","A","B","C","D","E"];

for ($i = 0; $i < 20; $i++){
  //gets random alphabets and random numbers
  //stores in token
  $index = mt_rand(0,count($alphabets)-1);
  $token .= $alphabets[$index];
}


$subject = "Password Reset";
$message= "You requested a password reset on your account. If you are not the one, ignore otherwise, visit localhost:8080/php_task2/reset.php"?token="$token";
$headers = "From: no-reply@snh.com" . "\r\n" .
"CC: ssalawudeen06@gmail.com";
		 //stires toke

file_put_contents("db/tokens/" .$email. ".json", json_encode(['token'=>$token]));

$trial = mail($email, $subject,$message,$headers);
		 //check if it works
if($trial) {
  $_SESSION['message'] = "Password reset has been sent to ".$email;
  header("Location: login.php");
  die();
	} else {
  $_SESSION['error'] = "oops! Something went wrong";
  header("Location: register.php");
  die();
		 }
       }
    }
	 //if user email does not exist in database
  $_SESSION['error'] = $email." not recognised. Please enter a pregistered email";
  header("Location: forgot.php");
  die();
   }

?>