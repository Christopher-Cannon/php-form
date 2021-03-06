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
					<input type="text" name="password" />

					<input type="submit" name="login_submit" value="Login" />
				</form>
			</div>

			<a href="pages/register.php">Register an account</a>
		</div>
	</body>
</html>
