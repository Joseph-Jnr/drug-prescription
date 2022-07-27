<?php
session_start();
unset($_SESSION['ep_username']);

header("Location: ../signin.php");
