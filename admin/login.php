<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/signup.css?s=<?= time(); ?>">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
    	<?//= password_hash('12345678', PASSWORD_DEFAULT); ?>
        <h2 class="login-title">Admin Login</h2>
        <form action="process/login.pro.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>