<?php session_start();

	require_once '../inc/config.php';
	require_once '../../auth_api/auth_functions.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		header("location: ../login.php?msg=$msg&class=$class");
		exit();
	}

	// print_r($_POST);

	
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$result = loginFunc($con, 'admins', 'aemail', 'apassword', $email, $password);
	// if ($result['data'] != null) {
	if ($result['session'] == true) {
		$fname = $_SESSION['fname'] = $result['data']['afname'];
		$lname = $_SESSION['lname'] = $result['data']['alname'];
		// $lname = $_SESSION['lname'] = $result['data']['alname'];
		$email = $_SESSION['email'] = $result['data']['aemail'];
		$id = $_SESSION['id'] = $result['data']['aid'];

		// header("location: ../index.php?msg=Login successfully&class=alert-success");
		header("location: ../index.php");
		exit();
	} else {
		$response = $result['response'];
		header("location: ../login.php?msg=$response&class=alert-warning");
		exit();
	}