<?php


  $allusers = scandir('db/users/');
     $numOfUsers = count($allusers);
     for ($counter = 0; $counter < $numOfUsers; $counter++) {
         $currentUser = $allusers[$counter];
         if ($currentUser == $email . ".json") {
             $userObject = json_decode(file_get_contents('db/users/' . $currentUser));
             $passwordFromDB = $userObject->password;
             if (password_verify($password, $passwordFromDB)) {
                 $_SESSION['LoggedIn'] = $userObject->id;
                 $_SESSION['email'] = $userObject->email;
                 // $_SESSION['first_name'] = $userObject->firstname;
                 $_SESSION['role'] = $userObject->designation;
                 $_SESSION['userObject'] = json_encode($userObject);
                 // $_SESSION['register_date'] = $userObject->dateRegistered;
 
                 if ($userObject->designation == "Medical Team(MT)") {
                     header("location: dashboard.php");
                     die();
                 }
                 if ($userObject->designation == "Patient") {
                     header("location: patientDashboard.php");
                     die();
                 }
                 if ($userObject->designation == "Super Admin") {
                     header("location: adminDashboard.php");
                     die();
                 }
             }
         }
     }
             ?>