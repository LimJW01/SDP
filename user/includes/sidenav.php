<div id="mySidenav" class="sidenav" onmouseleave="closeNav()">
    <a href="specific_joined_club.php?club=<?php echo $row['Club_name'] ?>">Dashboard</a>
    <a href="club_members.php?club=<?php echo $row['Club_name'] ?>">Members</a>
    <a href="club_events.php?club=<?php echo $row['Club_name'] ?>">Events</a>
    <a href="club_activities.php?club=<?php echo $row['Club_name'] ?>">Activities</a>
    <a href="club_registrations.php?club=<?php echo $row['Club_name'] ?>">Registration Approvals</a>
    <a href="club_feedback.php?club=<?php echo $row['Club_name'] ?>">Feedback</a>
    <a href="club_report.php?club=<?php echo $row['Club_name'] ?>">Report</a>
</div>

<div onmouseover="openNav()"><i class="fas fa-chevron-right"></i></div>

<script>
/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>