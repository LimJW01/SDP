<?php
include_once "includes/header.php";
include_once "includes/dbh.php";

// Get Specific Club Details
$club_name = $_GET['club'];
$club_details_sql = "SELECT * FROM clubs WHERE Club_name = '$club_name';";
$club_details_result = $conn->query($club_details_sql);
$club_row = mysqli_fetch_assoc($club_details_result);
$club_id = $club_row['Club_ID'];
$_SESSION['club_id'] = $club_row['Club_ID'];


$student_id = $_SESSION['student_id'];
$joined_club_sql = "SELECT * FROM joined_clubs WHERE Student_ID = '$student_id' AND Club_ID = '$club_id';";
$joined_club_result = $conn->query($joined_club_sql);
$joined_club_row = mysqli_fetch_assoc($joined_club_result);

// Check if the role of member
if ($joined_club_row['Role'] == "Committee") {
    include_once "includes/sidenav.php";
}

// Get all the club activity
$club_activity_sql = "SELECT * FROM club_activities WHERE Club_ID = '$club_id';";
$club_activity_result = $conn->query($club_activity_sql);
?>

<article id="specific-joined-club">
    <div class="logo-container">
        <img title="Club logo" src="data:image/jpeg;base64,<?php echo base64_encode($club_row['Club_image']); ?>">
    </div>
    <h1 class="title"><?php echo $club_row['Club_name']; ?></h1>
    <div class="title">Club Events</div>
    <div id="event-content-wrapper">
        <div class="grid-container">
            <?php
            $sql = "SELECT * FROM events WHERE Approval_status = 'Approved' AND Club_ID = '$club_id' ORDER BY Date_posted DESC";
            $result = $conn->query($sql);
            $result_check = mysqli_num_rows($result);
            $event_array = array();
            ?>
            <?php if ($result_check > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <?php
                    $event_id = "event-" . $row['Event_ID'];
                    array_push($event_array, $event_id);
                    ?>
            <div data-modal-target="#specific-event" class='grid-item' id="<?php echo $event_id ?>">
                <img title="<?php echo $row['Event_name']; ?>"
                    src="data:image/jpeg;base64,<?php echo base64_encode($row['Event_image']); ?>" alt='event_image'
                    width="403px" height="244px">
                <div class="caption">
                    <h2><?php echo $row['Event_name']; ?></h2>
                    <p>Posted on <?php echo $row['Date_posted']; ?></p>
                </div>
            </div>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- Edit Event -->
    <div class="event-modal" id="specific-event">
        <!-- Modal content -->
        <div class="event-modal-content" id="edit-event">
            <div class="modal-title-container">
                <h1 id="title">Event Details</h1>
                <button close-button class="close-button">&times;</button>
            </div>
            <form id="view-form" class="event-content-container">
            </form>
        </div>
    </div>
    <div id="overlay"></div>

    <div class="title">Club Activities</div>
    <?php while ($club_activity_row = mysqli_fetch_assoc($club_activity_result)) : ?>
    <div id="club-activities">

    </div>
    <?php endwhile; ?>
</article>
<script>
$(document).ready(function() {
    <?php foreach ($event_array as $event_id) : ?>

    // Load View Event Data When Clicked
    $("#<?php echo $event_id; ?>").click(function() {
        <?php $id = str_replace("event-", "", $event_id) ?>
        var id = "<?php echo $id ?>";

        // Display event name on modal
        <?php
                $sql = "SELECT * FROM events WHERE Event_ID = $id;";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                ?>
        document.getElementById("title").innerText = "<?php echo $row['Event_name']; ?>";

        // Pass id to another file
        $("#view-form").load("manage_specific_event_data.php", {
            id: id
        });
    });
    <?php endforeach; ?>
});
</script>

<!-- Activate Event Modal Script -->
<script defer src="scripts/event_modal.js"></script>

<?php
include_once "../admin/includes/alert_message.php";
include_once "includes/footer.php";
mysqli_close($conn);
?>