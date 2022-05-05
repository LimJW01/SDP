<?php

include_once "../user/includes/dbh.php";
session_start();
$report_category = $_POST['report_category'];
$report_list = $_POST['report_list'];

$data_array = array();

if ($report_category == "Students") {
    if ($report_list == "all-student") {
        $header = "Student Club Distribution";

        array_push($data_array, ["Club Name", "Total Members"]);

        $club_sql = "SELECT * FROM clubs";
        $club_result = $conn->query($club_sql);
        $club_result_check = mysqli_num_rows($club_result);

        if ($club_result_check > 0) {
            while ($club_row = mysqli_fetch_assoc($club_result)) {
                $club_id = $club_row['Club_ID'];
                $club_name = $club_row['Club_name'];
                $joined_club_sql = "SELECT COUNT(Student_ID) AS total_members FROM joined_clubs WHERE Club_ID = '$club_id'; ";
                $joined_club_result = $conn->query($joined_club_sql);
                $joined_club_row = mysqli_fetch_assoc($joined_club_result);
                $total_member = (int) $joined_club_row['total_members'];


                if ($total_member != 0) {
                    $student_data = [$club_name, $total_member];
                    array_push($data_array, $student_data);
                }
            }
        }
    }
}


if ($report_category == "Clubs") {
}


if ($report_category == "Events") {
}
?>
<div class="table container">

</div>

<!-- Pie Chart -->
<div id="piechart" style="width: 900px; height: 500px;"></div>



<!-- Load Pie Chart Data -->
<?php if ($report_list == "all-student" || $report_list == "all-event") : ?>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});

google.charts.setOnLoadCallback(function() {
    drawChart("<?php echo $header; ?>", <?php echo json_encode($data_array); ?>);
});


function drawChart(header, data_array) {

    var data = google.visualization.arrayToDataTable(data_array);

    var options = {
        title: header,
        is3D: true
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
</script>
<?php endif; ?>