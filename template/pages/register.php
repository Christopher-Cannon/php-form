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
					<input type="text" name="password_one" />

					<label>Retype password</label>
					<input type="text" name="password_two" />

					<input type="submit" name="register_submit" value="Register" />
				</form>
			</div>
		</div>
	</body>
</html>
