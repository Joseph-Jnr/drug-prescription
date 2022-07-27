<?php
session_start();
if (!isset($_SESSION["ep_username"])) {
    header("Location: ../index.php");
    exit();
}
$username = $_SESSION["ep_username"];
$profile_complete = $_SESSION["ep_profile_complete"];

include "includes/config.php";


// Define variables and initialize with empty values
$description = $date = "";
$description_err = $date_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Validate description
    $input_description = trim($_POST["description"]);
    $description = $input_description;

    // Validate date
    $input_date = trim($_POST["date"]);
    $date = $input_date;

    // Check input errors before inserting in database
    if (empty($description_err) && empty($date_err)) {


        $user = "$username";

        $sql = "INSERT INTO consultation (user, description, date) VALUES ('$user', '$description', '$date')";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page

                header("location: consultation.php?consultation_complete");
                exit();
            } else {
                echo "
				<div class='col-md-12 text-center'>
				<p style='background:red; padding:20px; border:4px solid red; border-radius:4px; color:#fff; font-weight:bold;margin-bottom:0px;'>
				<i class='fa fa-warning'></i> Something went wrong! Please try again later.
				</p>
				</div>";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Prescription - Consultation</title>
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
    <link rel="stylesheet" href="assets/css/sweetalert.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="pc-mob-header pc-header">
        <div class="pcm-logo">
            <a href="index.php" class="b-brand text-white h4">
                <b>E-Prescription</b>
            </a>
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="pc-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
            <a href="#!" class="pc-head-link" id="header-collapse">
                <i data-feather="more-vertical"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pc-sidebar ">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="../dashboard/" class="b-brand text-white h4">
                    <b>E-Prescription</b>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navigation</label>
                        <span>Shortcuts</span>
                    </li>
                    <li class="pc-item">
                        <a href="../dashboard/" class="pc-link"><span class="pc-micon"><i data-feather="home" class="text-primary mb-1"></i></span><span class="pc-mtext">Dashboard</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="../dashboard/" class="pc-link"><span class="pc-micon"><i data-feather="file-text" class="text-primary mb-1"></i></span><span class="pc-mtext">Get Prescription</span></a>
                    </li>
                    <li class="pc-item active">
                        <a href="consultation.php" class="pc-link"><span class="pc-micon"><i data-feather="message-square" class="text-primary mb-1"></i></span><span class="pc-mtext">Consultation</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="includes/logout.php" class="pc-link"><span class="pc-micon"><i data-feather="log-out" class="text-primary mb-1"></i></span><span class="pc-mtext">Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="pc-header ">
        <div class="header-wrapper">
            <div class="page-header-title">
                <h5 class="m-b-10 m-t-25">Hi, welcome back!</h5>
            </div>
            <div class="ml-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/user/2.png" alt="user-image" class="user-avtar">
                            <span>
                                <span class="user-name"><?php echo $username; ?></span>
                                <span class="user-desc">User</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Book consultation</h5>
                        </div>
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-auto m-b-10">
                                    <span>Talk to one of our expert physicians</span>
                                </div>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="description" class="form-control" placeholder="Describe how you feel" value="<?php echo $description; ?>" required>
                                            <input type="date" name="date" class="form-control" placeholder="Choose a date" value="<?php echo $date; ?>" required>
                                            <button class="btn btn-primary" type="submit"><i data-feather="navigation"></i> Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">

                <?php
                require_once "includes/time-ago.php";
                $sql = "SELECT * FROM consultation";

                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='table-responsive'>";
                        echo "<table id='myTable' class='display table table-striped table-hover mt-3 my-0'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>S/N</th>";
                        echo "<th>Description</th>";
                        echo "<th>Date</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {

                            $date = $row["date"];
                            $date_full = strftime('%b %d, %Y', strtotime($date));

                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $date_full . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo "<h3 class='alert alert-success text-center p-5'>No records</h3>";
                    }
                } else {
                    echo "<p class='alert alert-warning'>Database not available. Contact developer</p>";
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="assets/js/plugins/apexcharts.min.js"></script>

    <!-- custom-chart js -->
    <script src="assets/js/pages/dashboard-sale.js"></script>
    <script src="assets/js/plugins/jquery-1.12.4.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <?php
    if (isset($_GET['consultation_complete'])) {
        echo "
		<script>
		swal('Consultation Fixed', {
            icon: 'success',
            buttons : {
                confirm : {
                    confirmButtonColor: '#08cbbb'
                }
            }
        }).then(function(){
		  window.location.href = 'consultation.php';
	  });
		</script>
		";
    }
    ?>
</body>

</html>