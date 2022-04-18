<?php
include_once "includes/header.php";
include_once "includes/scripts.php";
include_once "../change_time_format.php";

$club_name = $_GET['club'];
$club_sql = "SELECT * FROM clubs WHERE Name = '$club_name';";
$club_details = $conn->query($club_sql);
$club_row = mysqli_fetch_assoc($club_details);
$_SESSION['club_id'] = $club_row['Club_ID'];
?>

<main id="main">
    <h1 class="title"><?php echo $club_row['Name']?></h1>
    <br>
    <hr>
    <article id="specific-club">
        <div class="content-container" id="specific-club-details">
            <div class="title-container">
                <h2>Club Settings</h2>
                <button title="Delete" id="delete-button">
                    <i class="fas fa-trash-alt"></i>Delete
                </button>
                <button title="Edit" id="edit-button">
                    <i class="fas fa-edit"></i>Edit
                </button>
            </div>
            <form action="manage_specific_club.php" method="post" onsubmit="return validate_edit_club();">
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

<!-- Validate TP Number Exist Error Script -->
<script defer src="scripts/tp_exist_error.js"></script>

<?php
include_once "includes/footer.php";
?>