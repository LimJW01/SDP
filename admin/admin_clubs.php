<?php
include_once "includes/header.php";
?>
<main id="main">
    <h1 class="title">Clubs</h1>
    <br>
    <hr>
    <article id="clubs">
        <div class="content-container">
            <button data-modal-target="#add" title="Add Club" id="add-button">Add Club</button>
            <div class="table-container">
                <table>
                    <tr>
                        <th class="padding-left">Image</th>
                        <th class="padding-left">Club Name</th>
                        <th class="padding-left">Email</th>
                        <th class="padding-left">Contact Number</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    $club_sql = "SELECT * FROM clubs ORDER BY Club_ID ASC";
                    $club_result = $conn->query($club_sql);
                    $club_result_check = mysqli_num_rows($club_result);
                    $club_array = array();
                    ?>
                    <?php if ($club_result_check > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($club_result)) : ?>
                    <?php
                            $club_id = "C" . $row['Club_ID'];
                            array_push($club_array, $club_id);
                            ?>
                    <tr>
                        <td style="text-align: center;"><img
                                src="data:image/jpeg;base64,<?php echo base64_encode($row['Image']); ?>"
                                alt="club_image">
                        </td>
                        <td class="padding-left"><?php echo $row['Name']; ?></td>
                        <td class="padding-left"><?php echo $row['Email']; ?></td>
                        <td class="padding-left"><?php echo $row['Contact_number']; ?></td>
                        <td style="text-align: center;">
                            <i data-modal-target="#view" title="View" class="fas fa-eye"
                                id="view-button-<?php echo $club_id; ?>"></i>
                            <i data-modal-target="#edit" title="Edit" class="fas fa-edit"
                                id="edit-button-<?php echo $club_id; ?>"></i>
                            <a href="admin_clubs.php"><i title="Delete" class="fas fa-trash-alt"
                                    id="delete-button-<?php echo $club_id; ?>"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="5">
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
        <div class="modal-content" id="view-club">
            <button close-button class="close">&times;</button>
            <h1>View Club Details</h1>
            <form id="view-form">
            </form>
        </div>
    </div>

    <!-- Edit Club -->
    <div class="modal" id="edit">
        <!-- Modal content -->
        <div class="modal-content" id="edit-club">
            <button close-button class="close">&times;</button>
            <h1>Edit Club Details</h1>
            <form action="manage_club.php" id="edit-form" method="post" enctype="multipart/form-data"
                onsubmit="return validate_edit_club();">
            </form>
        </div>
    </div>

    <!-- Add Club -->
    <div class="modal" id="add">
        <!-- Modal content -->
        <div class="modal-content" id="add-club">
            <button close-button class="close">&times;</button>
            <h1>Add New Club</h1>
            <form action="manage_club.php" id="add-form" method="post" enctype="multipart/form-data"
                onsubmit="return validate_add_club();">
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