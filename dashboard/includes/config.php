<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "e_prescription";

/* Attempt to connect to MySQL database */
$link = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($link === false) {
    die("Could not connect. Contact Developer");
}
