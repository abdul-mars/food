<?php session_start();

	$sid = $_SESSION['id'];

	echo $sid;

	require_once '../admin/inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		header("location: ../index.php?status=error&msg=$msg&class=$class");
		exit();
	}

	$fid = mysqli_real_escape_string($con, $_POST['fid']);
	$quantity = mysqli_real_escape_string($con, $_POST['quantity']);

	// echo "<pre>";
	// print_r($_POST);

	$sql = mysqli_query($con, "SELECT * FROM menus WHERE mid = '$fid'");
    if (mysqli_num_rows($sql) < 1) {
        header("location: checkout.php?status=error&msg=Something Went Wrong&class=alert-warning");
        exit();
    }

    $data = mysqli_fetch_assoc($sql);

    $price = $data['mprice'];

    $amount = $price * $quantity;

    $orderNo = rand(1111111, 9999999);
    // echo $orderNo;

    $sql = mysqli_query($con, "INSERT INTO `orders`(`onum`, `sid`, `mid`, `quantity`, `amount`, `status`) VALUES ('$orderNo','$sid','$fid','$quantity','$amount','Dispatch')");
    if ($sql) {
    	$msg = 'Your order is placed successfuly';
		$class = 'alert-primary';
		header("location: ../index.php?status=success&msg=$msg&class=$class");
		exit();
    } else {
    	$msg = 'Unable to place your order';
		$class = 'alert-warning';
		header("location: ../index.php?status=error&msg=$msg&class=$class");
		exit();
    }


