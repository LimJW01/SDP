<?php
    include_once "dbh.php";

    // start session if session hasn't set 
    if(!isset($_SESSION)){
        session_start();
    }
    
    // get the user's id from the session id
    $student_id = $_SESSION['student_id'];

    // if submit button is clicked
    if(isset($_POST['addClub'])){
        // get the value from the form and store in a variable respectively
        $club_image = $_POST['image'];
        $club_name = $_POST['inputclubname'];
        $club_description = $_POST['inputdescription'];
        $purpose = $_POST['inputpurpose'];
        $club_email = $_POST['inputemail'];
        $club_contact_number = $_POST['inputcontact'];
        $day = $_POST['inputday'];
        $start_time = $_POST['inputstarttime'];
        $end_time = $_POST['inputendtime'];
        $venue = $_POST['inputvenue'];

        // query to insert data into database
        $sql_query = "INSERT INTO `club_creation`(`fish_name`, `fish_description`, `fish_price`, `fish_picture`,`user_id`, `seller_contact`) 
        VALUES ('$club_image','$club_name','$club_description','$purpose', '$club_email','$club_contact_number','$day','$start_time','$end_time','$venue')";

        // if sql query is executed successfully
        if(mysqli_query($conn,  $sql_query)){
            echo "<script>alert('Add Successfully')</script>";
            echo "<script> window.location.href='club.php';</script>";
        } else {
            echo "Add Failed.";
        }
    } 
    
    // get the user's id from the session id
    $student_id = $_SESSION['student_id'];
    // query to read find the user with the specific user id
    $query = "SELECT * FROM students WHERE student_id = '$student_id'";
    // store the result of sql statement into a variable
    $result = mysqli_query($conn, $query);
    // fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

?>