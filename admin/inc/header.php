<?php session_start(); 
    require_once 'config.php';
	require_once 'functions.php';

    if (!isset($_SESSION['id']) || !isset($_SESSION['email'])) {
        header("location: login.php?status=error&msg=Something went wrong");
        exit();
    }
    
	$currentPage = basename($_SERVER['PHP_SELF']);
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- sweetalert2 css -->
    <link rel="stylesheet" href="../css/sweetalert.css">
    <!-- admin custom css -->
    <link rel="stylesheet" href="css/styles.css?s=<?= time(); ?>">
    <title><?= $title; ?></title>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h5 style="margin-bottom: -5px">SWAD FAST FOOD</h5>
            <span><?= $lname.' '.$fname; ?></span>
        </div>
        <ul class="nav">
            <li class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>"><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="<?= ($currentPage == 'admins.php') ? 'active' : '' ?>"><a href="admins.php"><i class="fas fa-user-tie"></i> Admins</a></li>
            <li class="<?= ($currentPage == 'users.php') ? 'active' : '' ?>"><a href="users.php"><i class="fas fa-user"></i> Users</a></li>
            <li class="<?= ($currentPage == 'orders.php') ? 'active' : '' ?>"><a href="orders.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li class="<?= ($currentPage == 'menus.php') ? 'active' : '' ?>"><a href="menus.php"><i class="fas fa-cutlery"></i> Menu</a></li>
            <!-- <li class=""><a href="#restaurants">Restaurants</a></li> -->
            <!-- <li class="<?= ($currentPage == 'settings.php') ? 'active' : '' ?>"><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li> -->
            <li><a href="logout.php"><i class="fas fa-power-off"></i> Logout</a></li>
        </ul>
    </div>