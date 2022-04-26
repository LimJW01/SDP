<?php
include_once "includes/header.php";
include_once "includes/dbh.php";
?>
<!-- Bootstrap 5.1.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<article id="clubs">
    <div class="title">
        <h1>Clubs and Societies<br></h1>
    </div>
    <div class="align-right">
        <?php if (isset($_SESSION['student_id'])) { ?>
        <a href="#" class="btn1 btn-primary" data-toggle="modal" data-target="#exampleModal">Create Club</a>
        <?php } else { ?>
        <?php } ?>
    </div>
    <div class="card1 column1">
        <?php $sql = "SELECT * FROM clubs ORDER BY Club_name ASC";
        $result = $conn->query($sql);
        $result_check = mysqli_num_rows($result);
        ?>
        <?php if ($result_check > 0) : ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <a href="club.php?club=<?php echo $row['Club_name']; ?>">
            <div class='grid-item'>
                <div class="img-container">
                    <img title="<?php echo $row['Club_name']; ?>" height="175" width="250"
                        src="data:image/jpeg;base64,<?php echo base64_encode($row['Club_image']); ?>" alt='club_image'>
                </div>
                <h2><?php echo $row['Club_name']; ?></h2>
            </div>
            <h2><?php echo $row['Club_name']; ?></h2>
    </div>
    </a>
    <?php endwhile; ?>
    <?php endif; ?>

    </div>
</article>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Club Creation Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>
                            <h5>Club Details</h5>
                        </label>
                        <br>
                        <label for="clubname">Club Picture</label>
                        <br>
                        <input type="file" name="image" id="image" class="input-disabled"
                            style="border: none; padding-left: 0;">
                    </div>
                    <div class="form-group">
                        <label for="clubname">Club Name</label>
                        <input type="text" class="form-control" id="inputclubname" name="inputclubname">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Description</label>
                        <input type="text" class="form-control" id="inputdescription" name="inputdescription">
                    </div>
                    <div class="form-group">
                        <label for="purpose">Briefly explain the purpose of your club</label>
                        <textarea class="form-control" id="inputpurpose" name="inputpurpose" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="studentid">Club Email</label>
                        <input type="email" class="form-control" id="inputemail" name="inputemail">
                    </div>
                    <div class="form-group">
                        <label for="intakecode">Club Contact Number</label>
                        <input type="text" class="form-control" id="inputcontact" name="inputcontact">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Day</label>
                        <input type="text" class="form-control" id="inputday" name="inputday">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Start Time</label>
                        <input type="int" class="form-control" id="inputstarttime" name="inputstarttime">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">End Time</label>
                        <input type="int" class="form-control" id="inputendtime" name="inputendtime">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Venue</label>
                        <input type="text" class="form-control" id="inputvenue" name="inputvenue">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addClub" value="Add Record" class="btn btn-outline-primary">Add
                    Record</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once "includes/footer.php";
mysqli_close($conn);
?>