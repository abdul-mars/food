<?php session_start();

	require_once '../admin/inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		header("location: ../signup.php?msg=$msg&class=$class");
		exit();
	}

	$firstname = mysqli_real_escape_string($con, ucwords($_POST['firstname']));
	$lastname = mysqli_real_escape_string($con, ucwords($_POST['lastname']));
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);

	$sql = mysqli_query($con, "SELECT semail FROM users WHERE semail = '$email'");
	if (mysqli_num_rows($sql) > 0) {
		$msg = 'Email is already in use. please change different email';
		$class = 'alert-warning';
		header("location: ../signup.php?msg=$msg&class=$class");
		exit();
	}

	if ($password !== $confirmPassword) {
		$msg = 'Passwords Do Not Match';
		$class = 'alert-warning';
		header("location: ../signup.php?msg=$msg&class=$class");
		exit();
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "INSERT INTO `users`(`sfname`, `slname`, `semail`, `sphone`, `saddress`, `spassword`) VALUES ('$firstname','$lastname','$email','$phone', '$address','$password')");

	if ($sql) {
		$sid = mysqli_insert_id($con);
		session_start();
		$_SESSION['fname'] = $firstname;
		$_SESSION['lname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['id'] = $sid;
		// $_SESSION['fname'] = $firstname;
		$msg = 'Signup Successfully!';
		$class = 'alert-primary';
		header("location: ../index.php?msg=$msg&class=$class");
		mysqli_close($con);
		
	} else {
		$msg = 'Unable to signup';
		$class = 'alert-warning';
		header("location: ../signup.php?msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}