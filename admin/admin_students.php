<?php
include_once "includes/header.php";
?>
<main id="main">
    <h1 class="title">Students</h1>
    <br>
    <hr>
    <article id="students">
        <div class="content-container">
            <button data-modal-target="#add" title="Add Student" id="add-button">Add Student</button>
            <div class="table-container">
                <table>
                    <tr>
                        <th class="padding-left">Student Name</th>
                        <th class="padding-left">TP Number</th>
                        <th class="padding-left">Gender</th>
                        <th class="padding-left">Email Address</th>
                        <th class="padding-left">Password</th>
                        <th class="padding-left">Contact Number</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM students ORDER BY Student_name ASC";
                    $result = $conn->query($sql);
                    $result_check = mysqli_num_rows($result);
                    $student_array = array();
                    ?>
                    <?php if ($result_check > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <?php
                            $student_ID = "S" . $row['Student_ID'];
                            array_push($student_array, $student_ID);
                            ?>
                    <tr>
                        <td class="padding-left"><?php echo $row['Student_name']; ?></td>
                        <td class="padding-left"><?php echo $row['TP_number']; ?></td>
                        <td class="padding-left"><?php echo $row['Gender']; ?></td>
                        <td class="padding-left"><?php echo $row['Email']; ?></td>
                        <td class="padding-left"><?php echo $row['Password']; ?></td>
                        <td class="padding-left"><?php echo $row['Contact_number']; ?></td>
                        <td style="text-align: center;">
                            <i data-modal-target="#view" title="View" class="fas fa-eye"
                                id="view-button-<?php echo $student_ID; ?>"></i>
                            <i data-modal-target="#edit" title="Edit" class="fas fa-edit"
                                id="edit-button-<?php echo $student_ID; ?>"></i>
                            <a href="admin_patients.php"><i title="Delete" class="fas fa-trash-alt"
                                    id="delete-button-<?php echo $student_ID; ?>"></i>
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

    <!-- View Student -->
    <div class="modal" id="view">
        <!-- Modal content -->
        <div class="modal-content" id="view-student">
            <button close-button class="close">&times;</button>
            <h1>View Student Details</h1>
            <form id="view-form">
            </form>
        </div>
    </div>

    <!-- Edit Student -->
    <div class="modal" id="edit">
        <!-- Modal content -->
        <div class="modal-content" id="edit-student">
            <button close-button class="close">&times;</button>
            <h1>Edit Student Details</h1>
            <form action="manage_student.php" id="edit-form" method="post">
            </form>
        </div>
    </div>

    <!-- Add Student -->
    <div class="modal" id="add">
        <!-- Modal content -->
        <div class="modal-content" id="add-student">
            <button close-button class="close">&times;</button>
            <h1>Add New Student</h1>
            <form action="manage_student.php" id="add-form" method="post">
            </form>
        </div>
    </div>
    <div id="overlay"></div>
</main>

<script>
$(document).ready(function() {
    <?php foreach ($student_array as $student_id) : ?>

    // Load View Student Data When Clicked
    $("#view-button-<?php echo $student_id; ?>").click(function() {
        var id = "<?php echo str_replace("S", "", $student_id) ?>";
        var action = "view";
        $("#view-form").load("manage_student_data.php", {
            id: id,
            action: action
        });
    });

    // Load Edit Student Data When Clicked
    $("#edit-button-<?php echo $student_id; ?>").click(function() {
        var id = "<?php echo str_replace("S", "", $student_id) ?>";
        var action = "edit";
        $("#edit-form").load("manage_student_data.php", {
            id: id,
            action: action
        });
    });

    // Load Delete Student Data When Clicked
    $("#delete-button-<?php echo $student_id; ?>").click(function() {
        if (confirm("Are you sure you want to delete this record?")) {
            var id = "<?php echo str_replace("S", "", $student_id) ?>";
            var action = "delete";
            $(window).load("manage_student_data.php", {
                id: id,
                action: action
            });
        }
    });

    <?php endforeach; ?>

    // Load Add Student Data When Clicked
    $("#add-button").click(function() {
        var action = "add";
        $("#add-form").load("manage_student_data.php", {
            action: action
        });
    });
});
</script>

<?php
include_once "includes/alert_message.php";
include_once "includes/footer.php";
?>