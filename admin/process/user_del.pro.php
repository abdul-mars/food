<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../users.php?status=$status&msg=$msg&class=$class");
		exit();
	}

	$sid = mysqli_real_escape_string($con, $_POST['sid']);

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "DELETE FROM `users` WHERE `sid` = '$sid'");

	if ($sql) {
		$msg = 'User Deleted Successfully!';
		$class = 'alert-primary';
		$status = 'success';
		header("location: ../users.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		
	} else {
		$msg = 'Unable to delete user';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../users.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}