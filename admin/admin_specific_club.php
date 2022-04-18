<?php
include_once "includes/header.php";
include_once "includes/scripts.php";
include_once "../change_time_format.php";

$club_name = $_GET['club'];
$club_sql = "SELECT * FROM clubs WHERE Name = '$club_name';";
$club_details = $conn->query($club_sql);
$club_row = mysqli_fetch_assoc($club_details);
$club_id = $club_row['Club_ID'];
$_SESSION['club_id'] = $club_id;
?>

<main id="main">
    <h1 class="title"><?php echo $club_row['Name'] ?></h1>
    <br>
    <hr>
    <article id="specific-club">
        <div class="content-container" id="specific-club-details">
            <div class="title-container">
                <h2>Club Settings</h2>
                <form action="manage_specific_club.php" method="post">
                    <button title="Delete" name="delete" type="submit" id="delete-button">
                        <i class="fas fa-trash-alt"></i>Delete
                    </button>
                </form>
                <button title="Edit" id="edit-button">
                    <i class="fas fa-edit"></i>Edit
                </button>
            </div>
            <form action="manage_specific_club.php" method="post" enctype="multipart/form-data"
                onsubmit="return validate_edit_club();">
                <img id="club-image" src="data:image/jpeg;base64,<?php echo base64_encode($club_row['Image']); ?>"
                    alt='club_image'>
                <ul class="flex-container">
                    <li class="flex-item">
                        Club Name <br>
                        <input type="text" name="club-name" id="name" class="input-disabled"
                            value="<?php echo $club_row['Name'] ?>" disabled>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item">
                        Email Address<br>
                        <input type="text" name="email-address" id="email-address" class="input-disabled"
                            value="<?php echo $club_row['Email'] ?>" disabled>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item">
                        Contact Number <br>
                        <input type="tel" placeholder="e.g. 999-9999999" name="contact-number" id="contact-number"
                            class="input-disabled" value="<?php echo $club_row['Contact_number'] ?>" disabled>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item">
                        Club Description<br>
                        <textarea name="description" id="description" cols="30" rows="5" class="input-disabled"
                            disabled><?php echo $club_row['Description']; ?></textarea>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item" id="edit-club-image">
                        Club Image <br>
                        <input type="file" name="image" class="input-disabled" id="image"
                            style="border: none; padding-left: 0;">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item activity-details">
                        <h3>Activity Details</h3>
                    </li>

                    <li class="flex-item">
                        Day <br>
                        <?php $day_list = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; ?>
                        <select name="day" id="day" class="input-disabled" disabled>
                            <?php foreach ($day_list as $day) : ?>
                            <option value="<?php echo $day ?>"
                                <?php echo ($club_row['Day'] == $day) ? "selected" : ""; ?>><?php echo $day ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item">
                        Start Time <br>
                        <input type="text" name="start-time" id="start-time" class="input-disabled"
                            placeholder="e.g. 17:00" value="<?php echo change_time_format($club_row['Start_time']) ?> "
                            disabled>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item">
                        End Time <br>
                        <input type="text" name="end-time" id="end-time" class="input-disabled" placeholder="e.g. 17:00"
                            value="<?php echo change_time_format($club_row['End_time']) ?>" disabled>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>

                    <li class="flex-item">
                        Venue <br>
                        <input type="text" name="venue" id="venue" class="input-disabled"
                            value="<?php echo $club_row['Venue'] ?>" disabled>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </li>
                </ul>
                <div class="submit-container">
                    <input class="submit-btn bg-color-light-green" name="update" id="update-button" type="submit"
                        value="Update">
                </div>
            </form>
        </div>
    </article>

    <article id="specific-club-member-list">
        <div class="content-container">
            <button data-modal-target="#add" title="Add Member" id="add-button">Add Member</button>
            <div class="table-container">
                <table>
                    <tr>
                        <th class="padding-left">Student Name</th>
                        <th class="padding-left">TP Number</th>
                        <th class="padding-left">Gender</th>
                        <th class="padding-left">Contact Number</th>
                        <th class="padding-left">Role</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    $student_sql = "SELECT * FROM students ORDER BY Student_name ASC";
                    $student_result = $conn->query($student_sql);
                    $student_result_check = mysqli_num_rows($student_result);
                    $student_array = array();
                    ?>
                    <?php if ($student_result_check > 0) : ?>
                    <?php while ($student_row = mysqli_fetch_assoc($student_result)) : ?>
                    <?php
                            $student_ID = "S" . $student_row['Student_ID'];
                            array_push($student_array, $student_ID);

                            $joined_club_sql = "SELECT * FROM joined_clubs WHERE Club_ID = '$club_id' AND Student_ID = " . $student_row['Student_ID'] .  ";";
                            $joined_club_result = $conn->query($joined_club_sql);
                            $joined_club_result_check = mysqli_num_rows($joined_club_result);
                            ?>

                    <?php if ($joined_club_result_check > 0) : ?>
                    <?php $joined_club_row = mysqli_fetch_assoc($joined_club_result) ?>
                    <tr>
                        <td class="padding-left"><?php echo $student_row['Student_name']; ?></td>
                        <td class="padding-left"><?php echo $student_row['TP_number']; ?></td>
                        <td class="padding-left"><?php echo $student_row['Gender']; ?></td>
                        <td class="padding-left"><?php echo $student_row['Contact_number']; ?></td>
                        <td class="padding-left"><?php echo $joined_club_row['Role'] ?></td>

                        <td style="text-align: center;">
                            <?php if ($joined_club_row['Role'] == "Member") : ?>
                            <i data-modal-target="#view" title="View" class="fas fa-eye"
                                id="view-button-<?php echo $student_ID; ?>"></i>
                            <?php else : ?>
                            <i data-modal-target="#edit" title="Edit" class="fas fa-edit"
                                id="edit-button-<?php echo $student_ID; ?>"></i>
                            <?php endif; ?>
                            <a href="admin_students.php"><i title="Delete" class="fas fa-trash-alt"
                                    id="delete-button-<?php echo $student_ID; ?>"></i>
                            </a>

                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="6">
                            <h2 class="no-record">No Records Found</h2>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </article>
</main>

<script>
// Get various elements by id
var editButton = document.getElementById("edit-button");
var updateButton = document.getElementById("update-button");
var clubImage = document.getElementById("club-image");
var editClubImage = document.getElementById("edit-club-image");
var clubContainer = document.getElementById("specific-club-details");

// When the user clicks on the edit button,
editButton.onclick = function() {
    updateButton.style.display = "block";
    editButton.style.display = "none";
    editClubImage.style.display = "block";
    clubImage.style.display = "none";
    clubContainer.style.height = "820px";
    $("input[class='input-disabled']").prop('disabled', false);
    $("textarea[class='input-disabled']").prop('disabled', false);
    $("select[class='input-disabled']").prop('disabled', false);
}

// Alert message if record updated
<?php if (isset($_SESSION['update']) && isset($_SESSION['message'])) : ?>
window.onload = function() {
    alert("<?php echo $_SESSION['message'] ?>");
}
<?php
        unset($_SESSION['update']);
        unset($_SESSION['message']);
    endif;
    ?>
</script>

<!-- Validate Email Exist Error Script -->
<script defer src="scripts/admin_email_exist_error.js"></script>


<?php
include_once "includes/footer.php";
?>