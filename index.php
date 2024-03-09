<?php

    session_start();
    require('include/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>School Management System - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/theme.css">
</head>
<body>
	<form action="login_process.php" method="post" id="login">
		<h1>School Management System</h1>
		<h2>Login</h2>
		<label for="email">Email:</label>
		<input type="email" id="email" name="login_email" required>
		<label for="password">Password:</label>
		<input type="password" id="password" name="login_password" required>

		<?php
		show_msg();
		?>
		<input type="submit" value="Login">
		<div id="login_save">
		<input type='checkbox' name='login_save' value='yes' /> 
		<label for="checkbox">Remember Me </label>
		</div>
	</form>
</body>
</html>