<?php
include_once "includes/header.php";
include_once "../change_time_format.php";
?>
<main id="main">
    <h1 class="title">Club Creation Requests</h1>
    <br>
    <hr>
    <article id="club-creation-requests">
        <div class="content-container">
            <div class="table-container">
                <table>
                    <tr>
                        <th class="padding-left">Club Image</th>
                        <th class="padding-left">Club Name</th>
                        <th class="padding-left">Club Description</th>
                        <th class="padding-left">Student Name</th>
                        <th class="padding-left">Student Contact Number</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    $club_creation_sql = "SELECT * FROM club_creation ORDER BY Club_creation_ID ASC";
                    $club_creation_result = $conn->query($club_creation_sql);
                    $club_creation_result_check = mysqli_num_rows($club_creation_result);
                    $club_creation_array = array();
                    ?>
                    <?php if ($club_creation_result_check > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($club_creation_result)) : ?>
                    <?php
                            $club_creation_id = "C" . $row['Club_creation_ID'];
                            array_push($club_creation_array, $club_creation_id);
                            ?>
                    <tr>
                        <td style="text-align: center;"><img
                                src="data:image/jpeg;base64,<?php echo base64_encode($row['Club_image']); ?>"
                                alt="club_image">
                        </td>
                        <td class="padding-left"><?php echo $row['Club_name']; ?></td>
                        <td class="padding-left"><?php echo $row['Club_description']; ?></td>
                        <td class="padding-left"><?php echo $row['Student_name']; ?></td>
                        <td class="padding-left"><?php echo $row['Student_contact_number']; ?></td>
                        <td style="text-align: center;">
                            <i data-modal-target="#view" title="View" class="fas fa-eye"
                                id="view-button-<?php echo $club_creation_id; ?>"></i>
                        </td>
                    </tr>
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

    <!-- View Club Creation Request -->
    <div class="modal" id="view">
        <!-- Modal content -->
        <div class="modal-content" id="view-club-creation-request">
            <button close-button class="close">&times;</button>
            <h1>View Club Creation Request</h1>
            <form id="view-form">
            </form>
        </div>
    </div>
    <div id="overlay"></div>
</main>

<script>
$(document).ready(function() {
    <?php foreach ($event_array as $event_id) : ?>

    // Load View Event Data When Clicked
    $("#view-button-<?php echo $event_id; ?>").click(function() {
        var id = "<?php echo str_replace("E", "", $event_id) ?>";
        var action = "view";
        $("#view-form").load("manage_event_data.php", {
            id: id,
            action: action
        });
    });

    // Load Edit Event Data When Clicked
    $("#edit-button-<?php echo $event_id; ?>").click(function() {
        var id = "<?php echo str_replace("E", "", $event_id) ?>";
        var action = "edit";
        $("#edit-form").load("manage_event_data.php", {
            id: id,
            action: action
        });
    });

    // Load Delete Event Data When Clicked
    $("#delete-button-<?php echo $event_id; ?>").click(function() {
        if (confirm("Are you sure you want to delete this record?")) {
            var id = "<?php echo str_replace("E", "", $event_id) ?>";
            var action = "delete";
            $(window).load("manage_event_data.php", {
                id: id,
                action: action
            });
        }
    });

    <?php endforeach; ?>

    // Load Add Event Data When Clicked
    $("#add-button").click(function() {
        var action = "add";
        $("#add-form").load("manage_event_data.php", {
            action: action
        });
    });
});
</script>

<?php
include_once "includes/alert_message.php";
include_once "includes/footer.php";
?>