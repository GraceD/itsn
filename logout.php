<?php
// closing a session (i.e. logging out)

// 1. Find the session
session_start();

// 2. Unset all the session variables
unset($_SESSION['user_info']);	
unset($_SESSION['email']); 		
unset($_SESSION['pw']);	

// 3. Redirect to home page
echo "<script> window.location.assign('index.php'); </script>";
?>
