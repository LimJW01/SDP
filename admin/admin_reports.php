<?php
include_once "includes/header.php";
?>
<main id="main">
    <h1 class="title">Reports</h1>
    <br>
    <hr>
    <article id="reports">
        <div class="content-container">
            <form action="generate_report.php" method="post" onsubmit="return validate_report();">
                <div class="report-container">
                    <ul class="flex-container">
                        <li class="flex-item">
                            <?php $report_category_list = ['Students', 'Clubs', 'Events']; ?>
                            <select name="report-category" id="report-category">
                                <option value="" selected disabled hidden>Please select</option>
                                <?php foreach ($report_category_list as $category) : ?>
                                <option value="<?php echo $category ?>"><?php echo $category ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </li>
                        <li class="flex-item">
                            <select name="report-list" id="report-list">
                                <option value="" selected disabled hidden>Select category to continue</option>
                            </select>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </li>
                        <li class="flex-item">
                            <input class="submit-btn" name="search" id="generate-button" type="submit" value="Generate">
                        </li>
                        <li class="flex-item">
                            <input class="submit-btn" name="search" id="export-button" type="submit" value="Export">
                        </li>
                    </ul>
                </div>

            </form>
            <div class="table-container">
                <table>
                    <tr>
                        <th class="padding-left">Student Name</th>
                        <th class="padding-left">TP Number</th>
                        <th class="padding-left">Gender</th>
                        <th class="padding-left">Clubs Joined</th>
                        <th class="padding-left">Contact Number</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    <?php
                    if (isset($_POST['search']) && !empty(trim($_POST['search-field']))) {
                        $search = trim($_POST['search-field']);
                        $student_sql = "SELECT * FROM students WHERE Student_name LIKE '%$search%' ORDER BY Student_name ASC";
                    } else {
                        $student_sql = "SELECT * FROM students ORDER BY Student_name ASC";
                    }

                    $student_result = $conn->query($student_sql);
                    $student_result_check = mysqli_num_rows($student_result);
                    $student_array = array();
                    ?>
                    <?php if ($student_result_check > 0) : ?>
                    <?php while ($student_row = mysqli_fetch_assoc($student_result)) : ?>
                    <?php
                            $student_ID = "S" . $student_row['Student_ID'];
                            array_push($student_array, $student_ID);

                            $joined_club_sql = "SELECT * FROM joined_clubs WHERE Student_ID = " . $student_row['Student_ID'] .  ";";
                            $joined_club_result = $conn->query($joined_club_sql);
                            $joined_club_result_check = mysqli_num_rows($joined_club_result);
                            ?>

                    <?php $joined_clubs = "No Clubs Joined" ?>
                    <?php if ($joined_club_result_check > 0) : ?>
                    <?php $joined_clubs_array = array() ?>
                    <?php while ($joined_club_row = mysqli_fetch_assoc($joined_club_result)) : ?>
                    <?php
                                    $joined_club_id =  $joined_club_row['Club_ID'];
                                    $club_sql = "SELECT * FROM Clubs WHERE Club_ID = $joined_club_id;";
                                    $club_result = $conn->query($club_sql);
                                    $club_row = mysqli_fetch_assoc($club_result);
                                    array_push($joined_clubs_array, $club_row['Club_name']);
                                    ?>
                    <?php endwhile; ?>
                    <?php $joined_clubs = join(", ", $joined_clubs_array) ?>
                    <?php endif; ?>
                    <tr>
                        <td class="padding-left"><?php echo $student_row['Student_name']; ?></td>
                        <td class="padding-left"><?php echo $student_row['TP_number']; ?></td>
                        <td class="padding-left"><?php echo $student_row['Gender']; ?></td>
                        <td class="padding-left"><?php echo $joined_clubs ?></td>
                        <td class="padding-left"><?php echo $student_row['Contact_number']; ?></td>
                        <td style="text-align: center;">
                            <i data-modal-target="#view" title="View" class="fas fa-eye"
                                id="view-button-<?php echo $student_ID; ?>"></i>
                            <i data-modal-target="#edit" title="Edit" class="fas fa-edit"
                                id="edit-button-<?php echo $student_ID; ?>"></i>
                            <a href="admin_students.php"><i title="Delete" class="fas fa-trash-alt"
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
</main>


<script src="scripts/add_report_selection.js"></script>

<?php
include_once "includes/alert_message.php";
include_once "includes/footer.php";
?>