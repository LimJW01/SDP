<!-- View, Add, Edit, Delete Record -->
<?php $action = $_POST['action']; ?>

<!-- Database Connnection for View, Edit, Delete Record -->
<?php
if ($action == "view" || $action == "edit" || $action == "delete") {
    include_once "../includes/dbh.php";
    include_once "../change_time_format.php";
    session_start();

    $id = $_POST['id'];
}
?>

<!-- SQL Query for View, Edit Record -->
<?php
if ($action == "view" || $action == "edit") {
    $club_sql_query = "SELECT * FROM clubs WHERE Club_ID = $id;";
    $club_result = mysqli_query($conn, $club_sql_query);
    $row = mysqli_fetch_assoc($club_result);
}
?>

<!-- SQL Query for Delete Record -->
<?php
if ($action == "delete") {
    $delete_sql_query = "DELETE FROM clubs WHERE Club_ID = $id;";
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

<!-- Profile Picture for View Doctor -->
<?php if ($action == "view") : ?>
<img src="data:image/jpeg;base64,<?php echo base64_encode($row['Image']); ?>" alt='club_image'>
<?php endif; ?>

<ul class="flex-container">
    <li class="flex-item">
        Club Name <br>
        <input type="text" name="club-name" id="club-name" class="input-disabled" value="<?php echo $row['Name'] ?>"
            disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>

    <li class="flex-item">
        Email Address<br>
        <input type="text" name="email-address" id="email-address" class="input-disabled"
            value="<?php echo $row['Email'] ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <li class="flex-item">
        Contact Number <br>
        <input type="tel" placeholder="e.g. 999-9999999" name="contact-number" id="contact-number"
            class="input-disabled" value="<?php echo $row['Contact_number'] ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <li class="flex-item">
        Club Description<br>
        <textarea name="description" id="description" cols="30" rows="5" class="input-disabled"
            disabled><?php echo $row['Description']; ?></textarea>
    </li>
    <!-- Profile Picture for Edit and Add Doctor -->
    <?php if ($action == "edit" || $action == "add") : ?>
    <li class="flex-item">
        Club Image <br>
        <input type="file" name="image" class="input-disabled" id="image" style="border: none; padding-left: 0;">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <?php endif; ?>

    <li class="flex-item subtitle">
        <h3>Activity Details</h3>
    </li>

    <li class="flex-item">
        Day <br>
        <input type="text" name="day" id="day" class="input-disabled" value="<?php echo $row['Day'] ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <li class="flex-item">
        Start Time <br>
        <input type="text" name="start-time" id="start-time" class="input-disabled"
            value="<?php echo change_time_format($row['Start_time']) ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <li class="flex-item">
        End Time <br>
        <input type="text" name="end-time" id="end-time" class="input-disabled"
            value="<?php echo change_time_format($row['End_time']) ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>
    <li class="flex-item">
        Venue <br>
        <input type="text" name="venue" id="venue" class="input-disabled" value="<?php echo $row['Venue'] ?>" disabled>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </li>

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
<?php $_SESSION['club_id'] = $row['Club_ID']; ?>
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
</script>
<div class="submit-container">
    <input class="submit-btn bg-color-eastern-blue" type="submit" name="add" value="Submit">
</div>
<?php endif; ?>

<!-- Validate Email Exist Error Script -->
<script defer src="scripts/admin_email_exist_error.js"></script>

<!-- Close Database Connection -->
<?php
if ($action == "view" || $action == "edit" || $action == "delete") {
    mysqli_close($conn);
}
?>