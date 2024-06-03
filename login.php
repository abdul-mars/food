<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/signup.css?s=<?= time(); ?>">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Login</h2>
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
            <h5 class="text-center mt-3">Dont Have Account? <a href="signup.php">Sign Up</a></h5>
        </form>
    </div>
</body>
</html>