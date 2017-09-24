<?php
session_start();

// Only logout user if they pressed the logout button
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['logout-button']))) {
  if(isset($_SESSION['username'])) {
  	unset($_SESSION['username']);
  }
}
// Redirect to login page
header('Location: ../index.php');
?>
