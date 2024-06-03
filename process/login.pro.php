<?php session_start();

	require_once '../admin/inc/config.php';
	require_once '../auth_api/auth_functions.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		header("location: ../login.php?msg=$msg&class=$class");
		exit();
	}

	
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$result = loginFunc($con, 'users', 'semail', 'spassword', $email, $password);
	// if ($result['data'] != null) {
	if ($result['session'] == true) {
		$fname = $_SESSION['fname'] = $result['data']['sfname'];
		$lname = $_SESSION['lname'] = $result['data']['slname'];
		// $lname = $_SESSION['lname'] = $result['data']['alname'];
		$email = $_SESSION['email'] = $result['data']['semail'];
		$id = $_SESSION['id'] = $result['data']['sid'];

		// header("location: ../index.php?msg=Login successfully&class=alert-success");
		header("location: ../index.php");
		exit();
	} else {
		$response = $result['response'];
		header("location: ../login.php?msg=$response&class=alert-warning");
		exit();
	}