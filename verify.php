<?php

session_start();

include 'database.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: login.php?error=Email required");
	}else if (empty($password)){
		header("Location: login.php?error=Password required&email=$email");
	}else {
		$stmt = $dbh->prepare("SELECT * FROM users WHERE email=?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = $user['password'];
			$user_name = $user['name'];

			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['user_name'] = $user_name;
					header("Location: home.php");

				}else {
					header("Location: login.php?error=The password you’ve entered is incorrect.&email=$email");
				}
			}else {
				header("Location: login.php?error=The password you’ve entered is incorrect.&email=$email");
			}
		}else {
			header("Location: login.php?error=The password you’ve entered is incorrect.&email=$email");
		}
	}
}