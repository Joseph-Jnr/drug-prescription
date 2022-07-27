<?php
session_start();
// Include config file
include "includes/config.php";

// Define variables and initialize with empty values
$uname = $pwd =  "";
$uname_err = $pwd_err = "";


// Processing form data when form is submitted
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

	if (isset($_POST["submit_login"])) {

		// Validate Name
		$input_uname = trim($_POST["username"]);
		if (empty($input_uname)) {
			$uname_err = "<p style='color:brown'>This field is compulsory.</p>";
		} else {
			$sql = "SELECT * FROM users WHERE username='$input_uname' || email='$input_uname'";
			$result = mysqli_query($link, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck < 1) {
				$uname_err = "<p style='color:brown'>Invalid credentials.</p>";
			} else {
				$uname = $input_uname;
			}
		}

		// Validate Password
		$input_pwd = trim($_POST["password"]);
		if (empty($input_pwd)) {
			$pwd_err = "<p style='color:brown'>Enter password.</p>";
		} else {
			$pwd = $input_pwd;
		}

		// Check input errors before inserting in database
		if (empty($uname_err) && empty($pwd_err)) {

			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

				$hashedPwdCheck = password_verify($pwd, $row['password']);
				if ($hashedPwdCheck == false) {
					$pwd_error = "<i class='text-danger fa fa-exclamation-circle'></i>";
					$pwd_err = "<p style='color:brown'>Incorrect password</p>";
				} elseif ($hashedPwdCheck == true) {
					$_SESSION['ep_username'] = $row['username'];
					$_SESSION['ep_profile_complete'] = $row['profile_complete'];
					$_SESSION['expire'] = time() + (45 * 60);

					$result = mysqli_query($link, $sql);

					header("Location: ../dashboard/?success");
					exit();
				}
			} else {
				// URL doesn't contain valid id. Redirect to error page
				header("Location: signin.php?failed");
				exit();
			}

			// Close statement
			mysqli_stmt_close($stmt);
		} else {
			$login_error = "<i class='text-danger fa fa-exclamation-circle'></i>";
		}

		// Close connection
		mysqli_close($link);
	}
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

	<title>E-Prescription - SignIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="assets/fonts/feather.css">
	<link rel="stylesheet" href="assets/fonts/fontawesome.css">
	<link rel="stylesheet" href="assets/fonts/material.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/styles.css">


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<?php
			if (isset($_GET['account_created'])) {
				echo "
						<div class='input-group-text-alert'>
							<span class='text-center'>Signup successful <i data-feather='check'></i></span>
						</div>
					";
			}
			?>

			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						<div class="card-body">
							<h4 class="mb-3 f-w-400">Sign In</h4>
							<div class="mb-3">
								<div class="input-group <?php echo (!empty($uname_err)) ? 'has-error' : ''; ?>">
									<span class="input-group-text"><i data-feather="user"></i></span>
									<input type="text" name="username" class="form-control" placeholder="Username / Email address" value="<?php echo $uname; ?>">
								</div>
								<span class="help-block"><?php echo $uname_err; ?></span>
							</div>

							<div class="mb-4">
								<div class="input-group <?php echo (!empty($pwd_err)) ? 'has-error' : ''; ?>">
									<span class="input-group-text"><i data-feather="lock"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $pwd; ?>">
								</div>
								<span class="help-block"><?php echo $pwd_err; ?></span>
							</div>

							<div class="form-group text-left mt-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
									<label class="form-check-label" for="flexCheckChecked">
										Remember me
									</label>
								</div>
							</div>
							<button type="submit" name="submit_login" class="btn btn-block btn-primary mb-4">Sign In</button>
							<p class="mb-0 text-muted">Don’t have an account? <a href="signup.php" class="f-w-400">Sign Up</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="assets/js/plugins/jquery-1.12.4.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>


</body>

</html>