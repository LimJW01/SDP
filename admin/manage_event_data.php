<!-- View, Add, Edit, Delete Record -->
<?php $action = $_POST['action']; ?>

<!-- Database Connnection for View, Edit, Delete Record -->
<?php
if ($action == "view" || $action == "edit" || $action == "delete" || $action == "add") {
    include_once "../includes/dbh.php";
    include_once "../change_time_format.php";

    if ($action == "view" || $action == "edit" || $action == "delete") {
        session_start();
        $id = $_POST['id'];
    }
}
?>

<!-- SQL Query for View , Edit and Add Record -->
<?php
if ($action == "view" || $action == "edit" || $action == "add") {
    if ($action == "view" || $action == "edit") {
        $event_sql_query = "SELECT * FROM events WHERE Event_ID = $id;";
        $event_result = mysqli_query($conn, $event_sql_query);
        $event_row = mysqli_fetch_assoc($event_result);
    }

    $club_sql_query = "SELECT * FROM clubs";
    $club_result = mysqli_query($conn, $club_sql_query);
    $club_check = mysqli_num_rows($club_result);
}
?>



<!-- SQL Query for Delete Record -->
<?php
if ($action == "delete") {
    $delete_sql_query = "DELETE FROM events WHERE Event_ID = $id;";
    $delete_result = mysqli_query($conn, $delete_sql_query);
    if (mysqli_affected_rows($conn) >= 1) {
        $_SESSION['message'] = "Record Deleted Successfully";
        $_SESSION['delete'] = true;
    } else {
        $_SESSION['message'] = "Failed to Delete Record";
        $_SESSION['delete'] = false;
    }
}
?>

<!-- HTML Content for View, Add, Edit Record -->
<?php if ($action == "view" || $action == "edit" || $action == "add") : ?>

<!-- Event Image for View Event -->
<?php if ($action == "view") : ?>
<img src="data:image/jpeg;base64,<?php echo base64_encode($event_row['Image']); ?>" alt='event_image'>
<?php endif; ?>

<ul class="flex-container">
    <li class="flex-item">
        Event Name <br>
        <input type="text" name="event-name" id="name" class="input-disabled" value="<?php echo $event_row['Name'] ?>"
            disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>


    <li class="flex-item">
        Organizing Club <br>
        <select name="organizing-club" id="organizing-club" class="input-disabled" disabled>
            <?php if ($action == "add") : ?>
            <option value="" selected disabled hidden>Click to select club</option>
            <?php endif; ?>

            <?php if ($club_check > 0) : ?>
            <?php while ($club_row = mysqli_fetch_assoc($club_result)) : ?>
            <option value="<?php echo $club_row['Club_ID']; ?>" <?php if ($action == "edit" || $action == "view") {
                                                                                echo ($club_row['Club_ID'] == $event_row['Club_ID']) ? "selected" : "";
                                                                            } ?>>
                <?php echo $club_row['Name']; ?></option>
            <?php endwhile; ?>
            <?php endif; ?>
        </select>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>


    <li class="flex-item">
        Event Description<br>
        <textarea name="description" id="description" cols="30" rows="5" class="input-disabled"
            disabled><?php echo $event_row['Description']; ?></textarea>
    </li>

    <li class="flex-item">
        Date <br>
        <input type="date" name="date" id="date" class="input-disabled" value="<?php echo $event_row['Date'] ?>"
            disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>

    <li class="flex-item">
        Start Time <br>
        <input type="text" name="start-time" id="start-time" class="input-disabled"
            value="<?php echo change_time_format($event_row['Start_time']) ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>

    <li class="flex-item">
        End Time <br>
        <input type="text" name="end-time" id="end-time" class="input-disabled"
            value="<?php echo change_time_format($event_row['End_time']) ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>

    <li class="flex-item">
        Approval Status <br>
        <input type="text" name="approval-status" id="approval-status" class="input-disabled"
            value="<?php echo $event_row['Approval_status'] ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>

    <!-- Profile Picture for Edit and Add Event -->
    <?php if ($action == "edit" || $action == "add") : ?>
    <li class="flex-item">
        Event Image <br>
        <input type="file" name="image" class="input-disabled" id="image" style="border: none; padding-left: 0;">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <?php endif; ?>

</ul>
<?php endif; ?>

<!-- HTML Content for View Record -->
<?php if ($action == "view") : ?>
<script>
$("#view-form .input-disabled").removeAttr('id');
$("#edit-form .input-disabled").removeAttr('id');
$("#add-form .input-disabled").removeAttr('id');
</script>
<?php endif; ?>

<!-- HTML Content for Edit Record -->
<?php if ($action == "edit") : ?>
<?php $_SESSION['event_id'] = $event_row['Event_ID']; ?>
<div class="submit-container">
    <input class="submit-btn bg-color-light-green" type="submit" name="update" value="Update">
</div>
<script>
$("#view-form .input-disabled").removeAttr('id');
$("#add-form .input-disabled").removeAttr('id');
$("#edit-form .input-disabled").prop('disabled', false);
</script>
<?php endif; ?>

<!-- HTML Content for Add Record -->
<?php if ($action == "add") : ?>
<script>
$("#view-form .input-disabled").removeAttr('id');
$("#edit-form .input-disabled").removeAttr('id');
$("#add-form .input-disabled").prop('disabled', false);
$("#add-form .input-disabled").removeAttr("value");
document.getElementById("description").value = "";
</script>


<div class="submit-container">
    <input class="submit-btn bg-color-eastern-blue" type="submit" name="add" value="Submit">
</div>
<?php endif; ?>


<?php if ($action == "edit" || $action == "add") : ?>

<!-- Date limit script -->
<script defer src="scripts/date_limit.js"></script>
<?php endif; ?>

<!-- Validate Email Exist Error Script -->
<script defer src="scripts/admin_email_exist_error.js"></script>

<!-- Close Database Connection -->
<?php
if ($action == "view" || $action == "edit" || $action == "delete" || $action == "add") {
    mysqli_close($conn);
}
?>