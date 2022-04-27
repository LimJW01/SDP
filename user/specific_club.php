<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">

    <style>

    .layered.box {
    box-shadow:
      0 1px 1px hsl(0deg 0% 0% / 0.075),
      0 2px 2px hsl(0deg 0% 0% / 0.075),
      0 4px 4px hsl(0deg 0% 0% / 0.075),
      0 8px 8px hsl(0deg 0% 0% / 0.075),
      0 16px 16px hsl(0deg 0% 0% / 0.075)
    ;
    }

    </style>

    <title>Specific Club</title>
</head>
<body>
    <?php include_once "includes/navbar.php";?>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="com_club_details.php">Club Details</a>
        <a href="com_club_feedbacks.php">Club Feedbacks</a>
        <a href="com_club_request.php">Club Request</a>
    </div>

    <!-- Use any element to open the sidenav -->
        <div class="flex-container">
            <div class="clogo">
                <img src="images/taekwondo.png">
            </div>
            <div class="ctitle">
                <h2>Club name</h2>
            </div>
            <div class="cbutton">
                <a href="#" class="btn1 btn-primary" data-toggle="modal" data-target="#feedback">Give Feedback</a>
            </div>
        </div>
        <div class="section1">
            <h2>Club Event</h2>
            <div class="addevent">
                <a href="#" class="btn1 btn-primary" data-toggle="modal" data-target="#addevent">Add Event</a>
            </div>
        </div>
        <div class="section2">
            <a class="image1" href="images/taekwondo.png">
                <img width="750" height="300" style="width: 750px; height: 300px;" src="image/taekwondo.png" alt="taekwondo">
            </a>
            <div class="mbutton">
                <a  onclick="openNav()" class="btn1 btn-primary">More Info</a>
            </div>
        </div>
        <div class="section3">
            <div class="cactivity">
                <h2 style="margin-bottom: 100px">Club Activities</h2>
            </div>
            <div class="addactivity">
                <a href="#" class="btn1 btn-primary" data-toggle="modal" data-target="#addactivity">Add Activity</a>
            </div>
        </div>
        <div class="section4">
            <div class="layered box">
                <div class="descevent">
                    <h3>Description</h3>
                    <br>
                    <p>Paste activity description here</p>
                </div>
            </div>
        </div>
    <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="feedbacklLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbacklLabel">Feedback Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="clubname">Club Name</label>
                            <input type="text" class="form-control" id="inputclubname" name="inputclubname">
                        </div>
                        <div class="form-group">
                            <label for="Message">Briefly explain the purpose of your club</label>
                            <textarea class="form-control" id="inputmessage" name="inputmessage" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addClub" value="Add Record" class="btn btn-outline-primary">Submit Feedback</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addevent" tabindex="-1" aria-labelledby="addeventLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addeventLabel">Add Event Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="clubname">Event Picture</label>
                            <br>
                            <input type="file" name="image" id="image" class="input-disabled"
                                style="border: none; padding-left: 0;">
                        </div>
                        <div class="form-group">
                            <label for="clubname">Event Name</label>
                            <input type="text" class="form-control" id="inputclubname" name="inputclubname">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Description</label>
                            <input type="text" class="form-control" id="inputdescription" name="inputdescription">
                        </div>
                        <div class="form-group">
                            <label for="contactnumber">Date</label>
                            <input type="text" class="form-control" id="inputdate" name="inputdate">
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
                            <label for="contactnumber">Date Posted</label>
                            <input type="text" class="form-control" id="inputdateposted" name="inputdateposted">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addClub" value="Add Record" class="btn btn-outline-primary">Add Event</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addactivity" tabindex="-1" aria-labelledby="addactivityLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addactivityLabel">Club Creation Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="fullname">Description</label>
                            <input type="text" class="form-control" id="inputdescription" name="inputdescription">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addClub" value="Add Record" class="btn btn-outline-primary">Add Activity</button>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "includes/footer.php";?>
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
</body>
</html>