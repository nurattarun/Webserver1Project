<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		form {
			margin: 0 auto;
			width: 50%;
			padding: 10px;
			border: 1px solid #f2f2f2;
			background-color: #f9f9f9;
		}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 10px;
			margin: 5px 0 10px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		button[type=submit], button[type=button] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}
		button[type=submit]:hover, button[type=button]:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
			font-size: 12px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<?php
		// define variables and initialize with empty values
		$username = $password = "";
		$username_err = $password_err = "";

		// process data when the form is submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// validate username
			if (empty($_POST["username"])) {
				$username_err = "Username is required";
			} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST["username"])) {
				$username_err = "Only letters and numbers are allowed";
			} else {
				$username = test_input($_POST["username"]);
			}

			// validate password
			if (empty($_POST["password"])) {
				$password_err = "Password is required";
			} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST["password"])) {
				$password_err = "Only letters and numbers are allowed";
			} else {
				$password = test_input($_POST["password"]);
			}

			// if no errors, attempt to log in
			if (empty($username_err) && empty($password_err)) {
				// replace with actual login code
				echo "Logged in successfully!";
			}
		}

		// function to sanitize input data
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h2>Login Form</h2>
		<?php if (!empty($username_err)) { ?>
			<span class="error"><?php echo $username_err; ?></span>
		<?php } ?>
		<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
		<?php if (!empty($password_err)) { ?>
			<span class="error"><?php echo $password_err; ?></span>
		<?php } ?>
		<input type="password" name="password" placeholder="Password">
		<button
