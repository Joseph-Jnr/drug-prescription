<?php
session_start();
// Include config file
include "includes/config.php";

// Define variables and initialize with empty values
$username = $email = $password =  "";
$username_err = $email_err = $password_err = "";


// Processing form data when form is submitted
if (($_SERVER["REQUEST_METHOD"] == "POST")) {


	//############# Sign up Form ################

	if (isset($_POST["submit_signup"])) {


		// Validate username
		$input_username = trim($_POST["username"]);
		if (empty($input_username)) {
			$username_err = "<p style='color:brown'>This field is compulsory.</p>";
		} else {
			$sql = "SELECT * FROM users WHERE username='$input_username'";
			$result = mysqli_query($link, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				$username_err = "<p style='color:brown'>This username is taken.</p>";
			} else {
				$username = $input_username;
			}
		}

		// Validate email
		$input_email = trim($_POST["email"]);
		if (empty($input_email)) {
			$email_err = "<p style='color:brown'>This field is compulsory.</p>";
		} else {
			$sql = "SELECT * FROM users WHERE email='$input_email'";
			$result = mysqli_query($link, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				$email_err = "<p style='color:brown'>An account already exists with this email.</p>";
			} else {
				$email = $input_email;
			}
		}

		// Validate password
		$input_password = trim($_POST["password"]);
		if (empty($input_password)) {
			$password_err = "<p style='color:brown'>Please choose a password.</p>";
		} else {
			//Hashing the password
			$hashedpwd = password_hash($input_password, PASSWORD_DEFAULT);
			$password = $hashedpwd;
		}



		// Validate profile
		$input_profile_complete = trim($_POST["profile_complete"]);
		$profile_complete = $input_profile_complete;


		// Check input errors before inserting in database
		if (empty($username_err) && empty($email_err) && empty($password_err)) {

			// Prepare an insert statement

			$sql = "INSERT INTO users (username, email, password, profile_complete) VALUES (?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($link, $sql)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_password, $param_profile_complete);

				// Set parameters
				$param_username = $username;
				$param_email = $email;
				$param_password = $password;
				$param_profile_complete = $profile_complete;

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					// Records created successfully. Redirect to landing page
					header("location: signin.php?account_created");
					exit();
				} else {
					echo "
	  <div class='col-md-12 text-center'>
	  <p style='background:red; padding:20px; border:4px solid red; border-radius:4px; color:#fff; font-weight:bold;margin-bottom:4px;margin-top:-60px;'>
	  <i class='fa fa-warning'></i> Something went wrong! Please try again later.
	  </p>
	  </div>";
				}
			}

			// Close statement
			mysqli_stmt_close($stmt);
		} else {
			$error = "<i class='text-danger fa fa-exclamation-circle'></i>";
			//header("location: ?error");
			//exit();
		}

		// Close connection
		mysqli_close($link);
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

	<title>E-Prescription - Sign up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />


	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="assets/fonts/feather.css">
	<link rel="stylesheet" href="assets/fonts/fontawesome.css">
	<link rel="stylesheet" href="assets/fonts/material.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/styles.css">


</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<h4 class="mb-3 f-w-400">Sign Up</h4>
							<div class="mb-3">
								<div class="input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
									<span class="input-group-text"><i data-feather="user"></i></span>
									<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
								</div>
								<span class="help-block"><?php echo $username_err; ?></span>
							</div>

							<div class="mb-3">
								<div class="input-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
									<span class="input-group-text"><i data-feather="mail"></i></span>
									<input type="email" class="form-control" name="email" placeholder="Email address" value="<?php echo $email; ?>">
								</div>
								<span class="help-block"><?php echo $email_err; ?></span>
							</div>

							<div class="mb-4">
								<div class="input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
									<span class="input-group-text"><i data-feather="lock"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Choose a password" value="<?php echo $password; ?>">
								</div>
								<span class="help-block"><?php echo $password_err; ?></span>
							</div>

							<input type="hidden" name="profile_complete" value="<?php echo "0"; ?>">
							<button type="submit" name="submit_signup" class="btn btn-primary btn-block mb-4">Sign up</button>
							<p class="mb-2">Already have an account? <a href="signin.php" class="f-w-400">Sign In</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>


</body>

</html>