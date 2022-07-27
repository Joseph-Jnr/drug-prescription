<?php
session_start();
if (!isset($_SESSION["ep_username"])) {
    header("Location: ../index.php");
    exit();
}
$username = $_SESSION["ep_username"];
$profile_complete = $_SESSION["ep_profile_complete"];

include "includes/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Prescription - My Prescription</title>
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
                    <li class="pc-item active">
                        <a href="../dashboard/" class="pc-link"><span class="pc-micon"><i data-feather="file-text" class="text-primary mb-1"></i></span><span class="pc-mtext">Get Prescription</span></a>
                    </li>
                    <li class="pc-item">
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
    <?php
    if (isset($_GET['search'])) {
        $search_value = $_GET['search'];
    }
    ?>
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card feed-card" id="invContents">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Your Prescription</h5>
                            <button class="print btn btn-primary btn-sm">Print <i data-feather="download"></i></button>
                        </div>
                        <div class="feed-scrolls" style="height:385px;position:relative;">
                            <div class="card-body">
                                <div class="icon text-center">
                                    <img src="assets/images/pills-01.png" width="200" height="auto" alt="img">
                                </div>
                                <?php
                                require "includes/config.php";
                                $sql = "SELECT * FROM prescriptions WHERE disease='$search_value'";

                                if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $drug = $row["drug"];
                                        $disease = $row["disease"];
                                        include "includes/count.php";
                                    } else {
                                        echo "
                                    <div class='text-center'>
                                        <h5>No match found. Check out our <a href='conditions.php'>list of conditions</a></h5>
                                    </div>
                                ";
                                    }
                                }
                                ?>
                                <div class="disease text-center">
                                    <h2><?php echo $disease; ?></h2>
                                </div>
                                <hr>
                                <div class="drugs text-center mb-3">
                                    <p></p>
                                    <span><?php echo $drug; ?></span>
                                </div>
                                <div class="alert alert-warning">
                                    <small><i>Please consult your physician before taking these drugs. You can also book a consultation <a href="consultation.php">here</a></i></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- customer-section end -->
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
    <script src="assets/js/html2pdf.bundle.min.js"></script>
    <script src="assets/js/print.js"></script>
</body>

</html>