<!-- View, Add, Edit, Delete Record -->
<?php $action = $_POST['action']; ?>
<script>
alert("hi")
</script>
<!-- Database Connnection for View, Edit, Delete Record -->
<?php
// if ($action == "promote" || $action == "demote" || $action == "delete" || $action == "add") {
//     include_once "../tbc/includes/dbh.php";

//     if ($action == "promote" || $action == "demote" || $action == "delete") {
//         session_start();
//         $student_id = $_POST['student_id'];
//         $club_id = $_POST['club_id'];
//     }
// }
?>

<!-- SQL Query for View, Edit Record -->
<?php
// if ($action == "promote") {
//     $joined_club_sql_query = "UPDATE joined_clubs SET Role = 'Committee' WHERE Student_ID = '$student_id' AND Club_ID = '$club_id';";

//     $result = mysqli_query($conn, $sql_query);
//     // If database is updated
//     if (mysqli_affected_rows($conn) >= 1) {
//         $_SESSION['update'] = true;
//         $_SESSION['message'] = "Record Updated Successfully";
//     } else {
//         $_SESSION['update'] = false;
//         $_SESSION['message'] = "Failed to Update Record";
//     }

//     // If SQL fails to run
//     if ($result == false) {
//         $_SESSION['update'] = false;
//         $_SESSION['message'] = "Failed to Update Record";
//     }
// }
?>

<!-- SQL Query for Delete Record -->
<?php
// if ($action == "delete") {
//     $delete_sql_query = "DELETE FROM clubs WHERE Club_ID = $id;";
//     $delete_result = mysqli_query($conn, $delete_sql_query);
//     if (mysqli_affected_rows($conn) >= 1) {
//         $_SESSION['message'] = "Record Deleted Successfully";
//         $_SESSION['delete'] = true;
//     } else {
//         $_SESSION['message'] = "Failed to Delete Record";
//         $_SESSION['delete'] = false;
//     }
// }
?>