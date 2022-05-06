<?php
if (!isset($_SESSION['student_id'])) {
    $_SESSION['login'] = false;
    $_SESSION['message'] = "Unauthorize access! Please login to continue";
    header("Location: login.php");
}