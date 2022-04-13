<?php
include_once "includes/header.php";
include_once "../change_time_format.php";
?>
<main id="main">
    <h1 class="title">Events</h1>
    <br>
    <hr>
    <article id="events">
        <div class="content-container">
            <button data-modal-target="#add" title="Add Event" id="add-button">Add Event</button>
            <div class="table-container">
                <table>
                    <tr>
                        <th class="padding-left">Image</th>
                        <th class="padding-left">Event Name</th>
                        <th class="padding-left">Date</th>
                        <th class="padding-left">Start Time</th>
                        <th class="padding-left">End Time</th>
                        <th class="padding-left">Approval Status</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    $event_sql = "SELECT * FROM events ORDER BY Event_ID ASC";
                    $event_result = $conn->query($event_sql);
                    $event_result_check = mysqli_num_rows($event_result);
                    $event_array = array();
                    ?>
                    <?php if ($event_result_check > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($event_result)) : ?>
                    <?php
                            $event_id = "E" . $row['Event_ID'];
                            array_push($event_array, $event_id);
                            ?>
                    <tr>
                        <td style="text-align: center;"><img
                                src="data:image/jpeg;base64,<?php echo base64_encode($row['Image']); ?>"
                                alt="event_image">
                        </td>
                        <td class="padding-left"><?php echo $row['Name']; ?></td>
                        <td class="padding-left"><?php echo $row['Date']; ?></td>
                        <td class="padding-left"><?php echo change_time_format($row['Start_time']); ?></td>
                        <td class="padding-left"><?php echo change_time_format($row['End_time']); ?></td>
                        <td class="padding-left"><?php echo $row['Approval_status']; ?></td>
                        <td style="text-align: center;">
                            <i data-modal-target="#view" title="View" class="fas fa-eye"
                                id="view-button-<?php echo $event_id; ?>"></i>
                            <i data-modal-target="#edit" title="Edit" class="fas fa-edit"
                                id="edit-button-<?php echo $event_id; ?>"></i>
                            <a href="admin_clubs.php"><i title="Delete" class="fas fa-trash-alt"
                                    id="delete-button-<?php echo $event_id; ?>"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="7">
                            <h2 class="no-record">No Records Found</h2>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </article>

    <!-- View Club -->
    <div class="modal" id="view">
        <!-- Modal content -->
        <div class="modal-content" id="view-event">
            <button close-button class="close">&times;</button>
            <h1>View Event Details</h1>
            <form id="view-form">
            </form>
        </div>
    </div>

    <!-- Edit Club -->
    <div class="modal" id="edit">
        <!-- Modal content -->
        <div class="modal-content" id="edit-event">
            <button close-button class="close">&times;</button>
            <h1>Edit Event Details</h1>
            <form action="manage_club.php" id="edit-form" method="post">
            </form>
        </div>
    </div>

    <!-- Add Club -->
    <div class="modal" id="add">
        <!-- Modal content -->
        <div class="modal-content" id="add-event">
            <button close-button class="close">&times;</button>
            <h1>Add New Event</h1>
            <form action="manage_club.php" id="add-form" method="post">
            </form>
        </div>
    </div>
    <div id="overlay"></div>
</main>

<script>
$(document).ready(function() {
    <?php foreach ($club_array as $club_id) : ?>

    // Load View Club Data When Clicked
    $("#view-button-<?php echo $club_id; ?>").click(function() {
        var id = "<?php echo str_replace("C", "", $club_id) ?>";
        var action = "view";
        $("#view-form").load("manage_club_data.php", {
            id: id,
            action: action
        });
    });

    // Load Edit Club Data When Clicked
    $("#edit-button-<?php echo $club_id; ?>").click(function() {
        var id = "<?php echo str_replace("C", "", $club_id) ?>";
        var action = "edit";
        $("#edit-form").load("manage_club_data.php", {
            id: id,
            action: action
        });
    });

    // Load Delete Club Data When Clicked
    $("#delete-button-<?php echo $club_id; ?>").click(function() {
        if (confirm("Are you sure you want to delete this record?")) {
            var id = "<?php echo str_replace("C", "", $club_id) ?>";
            var action = "delete";
            $(window).load("manage_club_data.php", {
                id: id,
                action: action
            });
        }
    });

    <?php endforeach; ?>

    // Load Add Club Data When Clicked
    $("#add-button").click(function() {
        var action = "add";
        $("#add-form").load("manage_club_data.php", {
            action: action
        });
    });
});
</script>

<?php
include_once "includes/alert_message.php";
include_once "includes/footer.php";
?>