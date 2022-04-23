<?php
    include('includes/dbh.php');

    // start session if session hasn't set 
    if(!isset($_SESSION)){
        session_start();
    }
    
    // get the user's id from the session id
    $student_id = $_SESSION['student_id'];

    // if submit button is clicked
    if(isset($_POST['addClub'])){
        // get the value from the form and store in a variable respectively
        $Club_image = $_POST['image'];
        $Club_name = $_POST['inputclubname'];
        $Club_description = $_POST['inputdescription'];
        $Purpose = $_POST['inputpurpose'];
        $Club_email = $_POST['inputemail'];
        $Club_contact_number = $_POST['inputcontact'];
        $Day = $_POST['inputday'];
        $Start_time = $_POST['inputstarttime'];
        $End_time = $_POST['inputendtime'];
        $Venue = $_POST['inputvenue'];

        // query to insert data into database
        $sql_query = "INSERT INTO `club_creation`(`Club_image`, `Club_name`, `Club_description`, `Purpose`,`Club_email`, `Club_contact_number`, `Day`, `Start_time`, `End_time`, `Venue`) 
        VALUES ('$Club_image','$Club_name','$Club_description','$Purpose', '$Club_email','$Club_contact_number','$Day','$Start_time','$End_time','$Venue')";

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
    $sql_query = "SELECT * FROM students WHERE student_id = '$student_id'";
    // store the result of sql statement into a variable
    $result = mysqli_query($conn, $sql_query);
    // fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);    

?>