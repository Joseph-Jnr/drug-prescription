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
    <title>E-Prescription - Dashboard</title>
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
                    <li class="pc-item">
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

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">

            <div class="page-header-title greeting">
                <h5 class="m-b-20 m-t-25">Good day <?php echo $username; ?>!</h5>
            </div>
            <div class="row">
                <!-- support-section start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card flat-card">
                        <div class="row-table">
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i data-feather="activity" class="text-primary mb-1"></i>
                                    </div>
                                    <div class="col-sm-8 text-md-center">
                                        <h5>80%</h5>
                                        <span>Health</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i data-feather="eye" class="text-primary mb-1"></i>
                                    </div>
                                    <div class="col-sm-8 text-md-center">
                                        <h5>
                                            <?php
                                            $sql = "SELECT count(id) AS total FROM consultation WHERE user='$username' ";
                                            $result = mysqli_query($link, $sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;
                                            ?>
                                        </h5>
                                        <span>Consultations</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-table">
                            <div class="col-sm-6 card-body br">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i data-feather="file-minus" class="text-primary mb-1"></i>
                                    </div>
                                    <div class="col-sm-8 text-md-center">
                                        <h5>
                                            <?php
                                            $sql = "SELECT * FROM users WHERE username='$username' ";
                                            $result = mysqli_query($link, $sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['prescriptions'];
                                            echo $num_rows;
                                            ?>
                                        </h5>
                                        <span>Prescriptions</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i data-feather="bar-chart-2" class="text-primary mb-1"></i>
                                    </div>
                                    <div class="col-sm-8 text-md-center">
                                        <h5>2</h5>
                                        <span>Appointments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Quick Diagnosis</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row pb-2">
                                        <div class="col-auto m-b-10">
                                            <span>How do you feel?</span>
                                        </div>
                                        <form action="prescription.php" action="get">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" class="form-control" placeholder="Eg. headache">
                                                    <button class="btn btn-primary" type="submit"><i class="feather icon-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- support-section end -->

                <div class="col-xl-6 col-md-12">
                    <div class="card feed-card">
                        <div class="card-header">
                            <h5>Notications</h5>
                        </div>
                        <div class="feed-scroll" style="height:385px;position:relative;">
                            <div class="card-body">
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0">
                                        <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                                    </div>
                                    <div class="col">
                                        <a href="https://drugs.com/drug_information.html" target="_blank">
                                            <h6 class="m-b-5">Have you drank water today? <span class="text-muted float-right f-14">Just Now</span></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0">
                                        <i data-feather="bell" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <h6 class="m-b-5">Appointment with Dr. Sam <span class="text-muted float-right f-14">30 min ago</span></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0">
                                        <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <h6 class="m-b-5">Typhoid fever detected. <span class="text-muted float-right f-14">Just Now</span></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0">
                                        <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <h6 class="m-b-5">Emzorprenol (1 capsule morn & eve). <span class="text-muted float-right f-14">1 hours ago</span></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0">
                                        <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <h6 class="m-b-5">Take Panadol by 6pm. <span class="text-muted float-right f-14">Just Now</span></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-25 align-items-center">
                                    <div class="col-auto p-r-0">
                                        <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <h6 class="m-b-5">New order received <span class="text-muted float-right f-14">4 hours ago</span></h6>
                                        </a>
                                    </div>
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
</body>

</html>