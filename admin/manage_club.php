<?php
session_start();
include_once "../includes/dbh.php";
if (isset($_POST['update']) || (isset($_POST['add']))) {

    // Get data from HTML Form
    $club_name = trim($_POST['club-name']);
    $email_address = trim($_POST['email-address']);
    $contact_number = trim($_POST['contact-number']);
    $club_description = trim($_POST['description']);
    $day = trim($_POST['day']);
    $start_time = trim($_POST['start-time']);
    $end_time = trim($_POST['end-time']);
    $venue = trim($_POST['venue']);

    if (isset($_POST['update'])) {
        $id = $_SESSION['club_id'];

        // Check if email exist or not
        $email_sql = "SELECT * FROM (
            SELECT Email FROM admin
            UNION
            SELECT Email FROM students
            UNION
            SELECT Email FROM clubs WHERE Club_ID != '$id'
            ) AS All_email
            WHERE All_email.Email = '$email_address'";
        $result = $conn->query($email_sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
            $_SESSION['message'] = "Email already exists. Please enter another one.";
            $_SESSION['update'] = false;
            header("Location: admin_clubs.php");
        } else {
            // if no file was uploaded to the club image field
            if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
                $sql_query = "UPDATE clubs SET Email = '$email_address', Name = '$club_name', Contact_number = '$contact_number', Description = '$club_description', Day = '$day', Start_time = '$start_time', End_time = '$end_time', Venue = '$venue'  WHERE Club_ID = $id";
            } else {
                // if file was uploaded to the club image field
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $sql_query = "UPDATE clubs SET Email = '$email_address', Name = '$club_name', Contact_number = '$contact_number', Description = '$club_description', Day = '$day', Start_time = '$start_time', End_time = '$end_time', Venue = '$venue', Image = '$image' WHERE Club_ID = $id";
            }

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

            unset($_SESSION['club_id']);
        }
    }

    if (isset($_POST['add'])) {
        // Check if email exist or not
        $email_sql = "SELECT * FROM (
            SELECT Email FROM admin
            UNION
            SELECT Email FROM students
            UNION
            SELECT Email FROM clubs
            ) AS All_email
            WHERE All_email.Email = '$email_address'";
        $result = $conn->query($email_sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
            $_SESSION['message'] = "Email already exists. Please enter another one.";
            $_SESSION['add'] = false;
            header("Location: admin_clubs.php");
        } else {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql_query = "INSERT INTO clubs (Email, Name, Contact_number, Description, Day, Start_time, End_time, Venue, Image, Admin_ID) VALUES ('$email_address', '$club_name', '$contact_number', '$club_description', '$day', '$start_time', '$end_time', '$venue', '$image', 1);";
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

    header("Location: admin_clubs.php");
}