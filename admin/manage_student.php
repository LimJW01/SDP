<?php
session_start();
include_once "../includes/dbh.php";
if (isset($_POST['update']) || (isset($_POST['add']))) {

    // Get data from HTML Form
    $student_name = trim($_POST['student-name']);
    $tp_number = trim($_POST['tp-number']);
    $gender = trim($_POST['gender']);
    $email_address = trim($_POST['email-address']);
    $password = trim($_POST['password']);
    $contact_number = trim($_POST['contact-number']);
    

    if (isset($_POST['update'])) {
        $id = $_SESSION['get_student_id'];

        // Check if email exist or not
        $email_sql = "SELECT * FROM (
                  SELECT Email FROM admin
                  UNION
                  SELECT Email FROM clubs
                  UNION
                  SELECT Email FROM students WHERE Student_ID != '$id'
                  ) AS All_email
                  WHERE All_email.Email = '$email_address'";
        $result = $conn->query($email_sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
            $_SESSION['message'] = "Email already exists. Please enter another one.";
            $_SESSION['update'] = false;
            header("Location: admin_students.php");
        } else {
            $sql_query = "UPDATE students SET Student_name = '$student_name', TP_number = '$tp_number', Gender = '$gender', Email = '$email_address', Password = '$password',  Contact_number = '$contact_number' WHERE Student_ID = $id";
            $result = mysqli_query($conn, $sql_query);

            // If database is updated
            if (mysqli_affected_rows($conn) >= 1) {
                $_SESSION['update'] = true;
                $_SESSION['message'] = "Record Updated Successfully";
            }

            // If SQL fails to run
            if ($result == false) {
                $_SESSION['update'] = false;
                $_SESSION['message'] = "Failed to Update Record";
            }
            unset($_SESSION['get_patient_id']);
        }
    }

    if (isset($_POST['add'])) {

        // Check if email exist or not
        $email_sql = "SELECT * FROM (
            SELECT Email FROM admin
            UNION
            SELECT Email FROM clubs
            UNION
            SELECT Email FROM students
            ) AS All_email
            WHERE All_email.Email = '$email_address'";
        $result = $conn->query($email_sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
            $_SESSION['message'] = "Email already exists. Please enter another one.";
            $_SESSION['add'] = false;
            header("Location: admin_students.php");
        } else {
            $sql_query = "INSERT INTO students (Student_name, TP_number, Gender, Email_address, Password, Contact_number, Admin_ID) VALUES ('$student_name, $tp_number, $gender, $email_address', '$password', '$contact_number', 1)";
            $result = mysqli_query($conn, $sql_query);

            // If database is updated
            if (mysqli_affected_rows($conn) >= 1) {
                $_SESSION['add'] = true;
                $_SESSION['message'] = "Record Added Successfully";
            }

            // If SQL fails to run
            if ($result == false) {
                $_SESSION['add'] = false;
                $_SESSION['message'] = "Failed to Add Record";
            }
        }
    }

    mysqli_close($conn);

    header("Location: admin_students.php");
}