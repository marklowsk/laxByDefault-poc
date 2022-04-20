<?php
// Initialize the session
session_start(['cookie_path' =>  '/', 'cookie_secure' => "1", 'cookie_httponly' => "1"]);
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>
