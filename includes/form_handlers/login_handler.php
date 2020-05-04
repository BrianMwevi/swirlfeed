<?php
if (isset($_POST['log_button'])) {
	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //Sanitize email
	$_SESSION['log_email'] = $email; //Store email in session variable
	$password = md5($_POST['log_password']);

	// Check database query/authenticate
	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if ($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];
		$user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
		if (mysqli_num_rows($user_closed_query) == 1) {
			$reopen_acc = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
		}

		$_SESSION['username'] = $username;
		header("Location:index.php");
		exit();
	}
	else {
		array_push($error_array, "Incorrect email or password<br>");
	}
}
?>