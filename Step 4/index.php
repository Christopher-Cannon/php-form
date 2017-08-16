<?php
$username = $password = "";
$form_error = $name_error = $pass_error = "";

// Dummy values for testing
$dummy_username = "john_smith";
$dummy_password = "password123";

// Remove unnecessary chars, slashes and sanitise special characters
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// If form has been submitted, we can validate the input
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// Validate username
	if(empty($_POST["username"])) {
		$form_error = "All form inputs are required";
	} else {
		$username = test_input($_POST["username"]);

		if(!preg_match("/^[0-9a-zA-Z_]*$/",$username)) {
			$name_error = "Username is invalid";
		}
	}

	// Validate password
	if(empty($_POST["password"])) {
		$form_error = "All form inputs are required";
	} else {
		$password = test_input($_POST["password"]);
	}

	// If no errors are present, and if credentials are correct, go to success
	if(($form_error == "") && ($name_error == "") && ($pass_error == "")) {
		if(($username == $dummy_username) && ($password == $dummy_password)) {
			header('Location: pages/login_success.php');
		} else {
			$form_error = "Invalid credentials";
		}
	}
}
?>

<!doctype html>

<html lang="en">
	<head>
		<title>Login</title>

		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<div class="main-wrapper">
			<h1>A website</h1>

			<div class="form-wrapper">
				<h2>Login to an account</h2>

				<form name="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<label>Username</label>
					<input type="text" name="username" />

					<label>Password</label>
					<input type="password" name="password" />

					<input type="submit" name="login_submit" value="Login" />
				</form>

				<p class="form-error"><?php echo $form_error; ?></p>
				<p class="form-error"><?php echo $name_error; ?></p>
				<p class="form-error"><?php echo $pass_error; ?></p>
			</div>

			<a href="pages/register.php">Register an account</a>
		</div>
	</body>
</html>
