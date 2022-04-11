<?php
include_once "includes/header.php";
?>
<main id="main">
    <h1 class="title">Dashboard</h1>
    <br>
    <hr>
    <article id="dashboard">
        <div class="flex-container">
            <div class="flex-item">
                <h2>Today Total Appointments</h2>

            </div>
            <div class="flex-item">
                <h2>Last 7 Days Total Appointments</h2>

            </div>
            <div class="flex-item">
                <h2>Total Appointments Booked</h2>

            </div>
            <div class="flex-item">
                <h2>Total Registered Patients</h2>

            </div>
            <div class="flex-item">
                <h2>Total Registered Doctors</h2>

            </div>

        </div>
    </article>
</main>
<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    echo "<script>window.onload = function() {alert('" . $_SESSION['message'] . "')};</script>";
    unset($_SESSION['login']);
    unset($_SESSION['message']);
}
include_once "includes/footer.php";


?>