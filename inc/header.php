<?php session_start();
    require_once 'admin/inc/config.php';
    $currentPage = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- sweetalert2 css -->
    <link rel="stylesheet" href="js/sweetalert.css">
    <!-- admin custom css -->
    <link rel="stylesheet" href="css/style.css?s=<?= time(); ?>">
    <title><?= $title; ?></title>
</head>
<body>
    <header class="header shadow">
        <div class="container">
            <div class="logo">
                
                <a href="index.php">
                    <img src="assets/logo.jpg" alt="" width="40" style="border-radius: 50%; margin-right: 10px;">
                    SWAD FAST FOOD
                </a>
            </div>
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item ">
                        <a href="index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="menu.php" class="<?= ($currentPage == 'menu.php') ? 'active' : '' ?>">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="my_orders.php" class="<?= ($currentPage == 'my_orders.php') ? 'active' : '' ?>">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
                <div class="menu-toggle">
                    <span class="toggle-icon"><i class="fas fa-bars"></i></span>
                </div>
            </nav>
        </div>
    </header>