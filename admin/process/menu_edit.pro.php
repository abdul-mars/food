<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../menus.php?status=$status&msg=$msg&class=$class");
		exit();
	}

	$mid = mysqli_real_escape_string($con, $_POST['emid']);
	$dish = mysqli_real_escape_string($con, $_POST['edish']);
	$desc = mysqli_real_escape_string($con, $_POST['edesc']);
	$price = mysqli_real_escape_string($con, $_POST['eprice']);
	$image = $_FILES['eimage'];

	// echo "<pre>";
	// print_r($_FILES);

	// if ($image['name'] == '') {
	// 	echo "image preicn";
	// } else {
	// 	echo "no image";
	// }

	// Check if image is uploaded
	if ($image['name'] != '') {
	    // Check if image is valid (jpg, jpeg, png)
	    $allowed_extensions = array('jpg', 'jpeg', 'png');
	    $image_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
	    if (in_array($image_extension, $allowed_extensions)) {
	        // Check if image size is less than or equal to 3MB
	        if ($image['size'] <= 3145728) {
	            // Give image a unique name
	            $unique_name = uniqid() . '.' . $image_extension;
	            // Move image to assets folder
	            $target_path = '../../assets/foods/' . $unique_name;
	            if (move_uploaded_file($image['tmp_name'], $target_path)) {
	                // Save image path to database
	                $image_path = 'assets/foods/' . $unique_name;
	            } else {
	                $image_path = '';
	            }
	        } else {
	            $image_path = '';
	        }
	    } else {
	        $image_path = '';
	    }
	} else {
	    $image_path = '';
	}

	// update data in database

	if ($image['name'] == '') {
		$sql = "UPDATE `menus` SET `mname`='$dish',`mdesc`='$desc',`mprice`='$price' WHERE `mid`='$mid'";
	} else {
		$sql = "UPDATE `menus` SET `mname`='$dish',`mdesc`='$desc',`mprice`='$price', `mimage`='$image_path' WHERE `mid`='$mid'";
	}
	
	if (mysqli_query($con, $sql)) {
		$msg = 'Menu Updated Successfully!';
		$class = 'alert-primary';
		$status = 'success';
		header("location: ../menus.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
	} else {
		$msg = 'Unable to update menu';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../menus.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}
