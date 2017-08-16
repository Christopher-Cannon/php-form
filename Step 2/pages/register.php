<?php
$username = $email = $password_one = $password_two = "";
$form_error = "";

// Remove unnecessary chars, slashes and sanitise special characters
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// If form has been submitted, we can validate the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// All form fields are required
	if(empty($_POST["username"]) && empty($_POST["email"]) &&
	empty($_POST["password_one"]) && empty($_POST["password_two"])) {
		$form_error = "All form inputs are required";
	} else {
		$username = test_input($_POST["username"]);
	  $email = test_input($_POST["email"]);
	  $password_one = test_input($_POST["password_one"]);
	  $password_two = test_input($_POST["password_two"]);
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

				<span class="form-error"><?php echo $form_error; ?></span>

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
			</div>
		</div>
	</body>
</html>
