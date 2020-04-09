<?php
//starts session
//unset session
//destroy session
//redirect to login page

session_start();

session_unset();

session_destroy();

header("Location: login.php");


?>