<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../admins.php?status=$status&msg=$msg&class=$class");
		exit();
	}

	$aid = mysqli_real_escape_string($con, $_POST['aid']);

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "DELETE FROM `admins` WHERE `aid` = '$aid'");

	if ($sql) {
		$msg = 'Admin Deleted Successfully!';
		$class = 'alert-primary';
		$status = 'success';
		header("location: ../admins.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		
	} else {
		$msg = 'Unable to delete admin';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../admins.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}