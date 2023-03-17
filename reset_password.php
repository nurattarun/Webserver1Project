<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	<h2>Reset Password</h2>
	<form method="post" action="reset_password.php">
		<label>Username:</label><br>
		<input type="text" name="username"><br>
		<label>New Password:</label><br>
		<input type="password" name="new_password"><br><br>
		<input type="submit" name="reset" value="Reset">
	</form>
</body>
</html>

<?php
if(isset($_POST['reset'])) {
	$username = $_POST['username'];
	$new_password = $_POST['new_password'];
	// Code to reset the password in the database for the given username
	if($username == "admin") {
		// For demo purposes, set the new password to a fixed value
		$new_password_hash = password_hash("new_password", PASSWORD_DEFAULT);
		// Code to update the password in the database
		echo "Password reset successfully!";
	} else {
		echo "Username not found!";
	}
}
?>
