<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$status = 'error';
		header("location: ../menus.php?status=$status&msg=$msg");
		exit();
	}

	$mid = mysqli_real_escape_string($con, $_POST['mid']);

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "SELECT mimage FROM menus WHERE `mid` = '$mid'");
	$data = mysqli_fetch_assoc($sql);
	$image = $data['mimage'];

	$sql = mysqli_query($con, "DELETE FROM `menus` WHERE `mid` = '$mid'");

	if ($sql) {
		unlink('../../'.$image); // delete menu image
		$msg = 'Menu Deleted Successfully!';
		$status = 'success';
		header("location: ../menus.php?status=$status&msg=$msg");
		mysqli_close($con);
		
	} else {
		$msg = 'Unable to delete menu';
		$status = 'error';
		header("location: ../menus.php?status=$status&msg=$msg");
		mysqli_close($con);
		exit();
	}