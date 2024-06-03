<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- font awesome css -->
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" href="css/signup.css">
		<title>Signup</title>
	</head>
	<body>
		<div class="signup-container container" style="">
			<h2 class="signup-title">Create an Account</h2>
			<form action="process/signup.pro.php" method="post" class="signup-form">
				<div class="row">
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="lastname">Last Name</label>
						<input type="text" id="lastname" name="lastname" required>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="firstname">First Name</label>
						<input type="text" id="firstname" name="firstname" required>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="email">Email</label>
						<input type="email" id="email" name="email" required>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="phone">Phone</label>
						<input type="text" id="phone" name="phone" onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="10">
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="address">Address</label>
						<input type="text" id="address" name="address" required>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" required>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						<label for="confirmPassword">Confirm Password</label>
						<input type="password" id="confirmPassword" name="confirmPassword" required>
					</div>
					<div class="col-12">
						<button type="submit" class="signupBtn px-5">Sign Up</button>
					</div>
				</div> <hr>
				<h5>Already have account? <a href="login.php">Login</a></h5>
			</form>
		</div>
	</body>
</html>