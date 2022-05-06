<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    // Student Authentication
    $_SESSION['login'] = false;
    $_SESSION['message'] = "Unauthorize access! Please login to continue";
    header("Location: login.php");
} else {
    unset($_SESSION['student_id']);
    unset($_SESSION['admin_id']);
    $_SESSION['login'] = false;
    $_SESSION['message'] = "Logged Out Successfully";
    header("Location: ./login.php");
    exit(0);
}