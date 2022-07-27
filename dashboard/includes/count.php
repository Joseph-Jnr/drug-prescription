<?php
$user = $_SESSION["ep_username"];
$sql = "SELECT * FROM users WHERE username='$user'";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$userId = $row['id'];
$prescriptions = $row['prescriptions'];
$times_used = $prescriptions + 1;
$sql2 = "UPDATE users SET prescriptions='$times_used' WHERE id = '$userId'";
$result = mysqli_query($link, $sql2);
