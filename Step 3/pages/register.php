<?php
$username = $email = $password_one = $password_two = "";
$form_error = $name_error = $email_error = $pass_error = "";

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

	// Validate email
	if(empty($_POST["email"])) {
		$form_error = "All form inputs are required";
	} else {
		$email = test_input($_POST["email"]);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = "Email is invalid";
		}
	}

	if((empty($_POST["password_one"])) || (empty($_POST["password_one"]))) {
		$form_error = "All form inputs are required";
	} else {
		$password_one = test_input($_POST["password_one"]);
		$password_two = test_input($_POST["password_two"]);

		// Check if passwords match
		if($password_one != $password_two) {
			$pass_error = "Passwords do not match";
		}
	}

	// If no errors are present, go to success
	if(($form_error == "") && ($name_error == "") && ($email_error == "") && ($pass_error == "")) {
		header('Location: reg_success.php');
	}
}
?>

<!doctype html>

<html lang="en">
	<head>
		<title>Registration</title>

		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>

	<body>
		<div class="main-wrapper">
			<h1>A website</h1>

			<div class="form-wrapper">
				<h2>Register an account</h2>

				<form name="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<label>Username</label>
					<span class="small-text">Only alphanumeric chars and underscores allowed</span>
					<input type="text" name="username" />

					<label>Email address</label>
					<input type="text" name="email" />

					<label>Password</label>
					<input type="password" name="password_one" />

					<label>Retype password</label>
					<input type="password" name="password_two" />

					<input type="submit" name="register_submit" value="Register" />
				</form>

				<p class="form-error"><?php echo $form_error; ?></p>
				<p class="form-error"><?php echo $name_error; ?></p>
				<p class="form-error"><?php echo $email_error; ?></p>
				<p class="form-error"><?php echo $pass_error; ?></p>
			</div>
		</div>
	</body>
</html>
