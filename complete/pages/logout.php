<?php
session_start();

// Only logout user if they pressed the logout button
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['logout-button']))) {
  if(isset($_SESSION['username'])) {
  	unset($_SESSION['username']);

    session_unset();
    session_destroy();

    // Redirect to login page
    header('Location: ../index.php');

    exit();
  }
}
// Redirect if page accessed directly
// Home page would be better choice than a login form
header('Location: ../index.php');
?>
