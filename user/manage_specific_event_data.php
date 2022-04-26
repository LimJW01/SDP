<?php
include_once "../user/includes/dbh.php";
include_once "../change_time_format.php";
$id = $_POST['id'];

$event_sql_query = "SELECT * FROM events WHERE Event_ID = $id;";
$event_result = mysqli_query($conn, $event_sql_query);
$event_row = mysqli_fetch_assoc($event_result);

$club_id = $event_row['Club_ID'];
$club_sql_query = "SELECT * FROM clubs WHERE Club_ID = $club_id";
$club_result = mysqli_query($conn, $club_sql_query);
$club_row = mysqli_fetch_assoc($club_result);
?>
<div id="event-content">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($event_row['Event_image']); ?>" alt='event_image'>
    <div id="event-details">
        <h1><?php echo $event_row['Event_name'] ?></h1>
        <p id="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quos nostrum quis eligendi
            tenetur laudantium
            sunt repellat! Id nisi facilis repellendus vel cupiditate, odit ut. Doloremque totam nam mollitia impedit
            vero
            laudantium quod, laborum sit voluptatibus nesciunt vitae itaque nulla rem veniam id praesentium dolore ipsum
            deleniti aut minima? Eaque repudiandae doloribus aliquam aut maxime sequi voluptatibus amet earum
            necessitatibus
            magnam dicta ea, modi quos placeat quaerat animi, unde ipsum. Perferendis beatae adipisci consequatur
            obcaecati
            vero odit, sequi voluptatibus doloribus impedit enim velit doloremque totam minus laboriosam qui autem sint
            a,
            ratione iure unde itaque recusandae ut! Voluptatum, animi aperiam, architecto vitae fugit laudantium
            suscipit
            sequi error quaerat delectus eaque atque maxime quidem temporibus quasi obcaeca
        </p>
        <p>
            <img src="../images/date.png" class="icon">
            Date: <span><?php echo $event_row['Date']; ?></span>
        </p>
        <p>
            <img src="../images/time.png" class="icon">
            Start Time:
            <span><?php echo change_time_format($event_row['Start_time']); ?>
                (GMT +8)</span>
        </p>
        <p>
            <img src="../images/time.png" class="icon">
            End Time:
            <span><?php echo change_time_format($event_row['End_time']); ?> (GMT
                +8)</span>
        </p>
        <p>
            <img src="../images/club.png" class="icon">
            Organized by: <span><?php echo $club_row['Club_name']; ?></span>
        </p>
    </div>
</div>