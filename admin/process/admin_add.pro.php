<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../admins.php?status=$status&msg=$msg&class=$class");
		exit();
	}

	$firstname = mysqli_real_escape_string($con, ucwords($_POST['firstname']));
	$lastname = mysqli_real_escape_string($con, ucwords($_POST['lastname']));
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$password = password_hash($password, PASSWORD_DEFAULT);

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "INSERT INTO `admins`(`afname`, `alname`, `aemail`, `aphone`, `apassword`) VALUES ('$firstname','$lastname','$email','$phone','$password')");

	if ($sql) {
		$msg = 'Admin Added Successfully!';
		$class = 'alert-primary';
		$status = 'success';
		header("location: ../admins.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		
	} else {
		$msg = 'Unable to add new admin';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../admins.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}