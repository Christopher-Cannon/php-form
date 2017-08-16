<!doctype html>

<html lang="en">
	<head>
		<title>Registration and login</title>

		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<div class="main-wrapper">
			<h1>A website</h1>

			<div class="form-wrapper" method="POST">
				<h2>Register an account</h2>

				<form name="reg-form">
					<label>Username</label>
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

			<div class="form-wrapper">
				<h2>Login to an account</h2>

				<form name="login-form" method="POST">
					<label>Username</label>
					<input type="text" name="username" />

					<label>Password</label>
					<input type="text" name="password" />

					<input type="submit" name="login_submit" value="Login" />
				</form>
			</div>
		</div>
	</body>
</html>
