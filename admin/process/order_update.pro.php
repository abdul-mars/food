<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../orders.php?status=$status&msg=$msg&class=$class");
		exit();
	}

	$oid = mysqli_real_escape_string($con, $_POST['oid']);
	$uStatus = mysqli_real_escape_string($con, ucwords($_POST['status']));

	$uStatus = str_replace('-', ' ', $uStatus);
	// echo $uStatus;

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "UPDATE `orders` SET `status`='$uStatus' WHERE `oid` = '$oid'");

	if ($sql) {
		$msg = 'Order Updated Successfully!';
		$class = 'alert-primary';
		$status = 'success';
		header("location: ../orders.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		
	} else {
		$msg = 'Unable to update order';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../orders.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}