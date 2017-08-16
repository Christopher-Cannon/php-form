<?php
$username = $password = "";
$form_error = $name_error = $pass_error = "";

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

	// If no errors are present, attempt to find credentials in database
	if(($form_error == "") && ($name_error == "") && ($pass_error == "")) {
		// Database credentials
		$db_server = "localhost";
		$db_user = "root";
		$db_pass = "";
		$db_name = "reg_form";
		// Initialise return values (from the DB)
		$ret_user = "";
		$ret_pass = "";

		// Connect to database
		$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		// Query database for matching username and password
		$sql = "SELECT username, password FROM users WHERE username='$username'";
		$result = $conn->query($sql);

		// Attempt to get results from returned array
		if($result) {
			$row = $result->fetch_assoc();
			$ret_user = $row["username"];
			$ret_pass = $row["password"];
		}

		// Close the connection
		$conn->close();

		// If entered credentials match those in DB, go to success page
		if(($username == $ret_user) && ($password == $ret_pass)) {
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
