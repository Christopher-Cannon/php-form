<?php
session_start();

// Set to a default value just in case
$username = "BLANK";

// Get username if user is logged in,
// otherwise redirect to login page
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
} else {
	header('Location: ../index.php');
}
?>

<!doctype html>

<html lang="en">
	<head>
		<title>Login success</title>

		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>

	<body>
		<div class="main-wrapper">
      <h1>Login successful!</h1>

			<?php echo "Welcome back $username"; ?>

			<form name="logout-form" method="POST" action="logout.php">
				<input name="logout-button" type="submit" value="Log out" />
			</form>
		</div>
	</body>
</html>
