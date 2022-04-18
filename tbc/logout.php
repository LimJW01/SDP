<?php
session_start();
unset($_SESSION['student_id']);
unset($_SESSION['admin_id']);
$_SESSION['login'] = false;
$_SESSION['message'] = "Logged Out Successfully";
header("Location: ./login.php");
exit(0);