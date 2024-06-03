<?php session_start();

	require_once '../inc/config.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		$msg = 'Invalid Request';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../menus.php?status=$status&msg=$msg&class=$class");
		exit();
	}

	$dish = mysqli_real_escape_string($con, $_POST['dish']);
	$desc = mysqli_real_escape_string($con, $_POST['desc']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$image = $_FILES['image'];

	// echo "<pre>";
	// print_r($_POST);

	// Check if image is uploaded
	if ($image) {
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

	// Insert data into database
	$sql = "INSERT INTO `menus`(`mname`, `mdesc`, `mprice`, `mimage`) VALUES ('$dish', '$desc', '$price', '$image_path')";
	
	if (mysqli_query($con, $sql)) {
		$msg = 'Menu Added Successfully!';
		$class = 'alert-primary';
		$status = 'success';
		header("location: ../menus.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
	} else {
		$msg = 'Unable to add new menu';
		$class = 'alert-warning';
		$status = 'error';
		header("location: ../menus.php?status=$status&msg=$msg&class=$class");
		mysqli_close($con);
		exit();
	}
