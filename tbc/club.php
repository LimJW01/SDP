<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <style>
        .align-right {
        text-align: right;
        border: 0;
        margin-right: 50px;
        margin-top: 10px;
        }
    </style>

    <title>Club</title>

    
</head>
<body>
    <?php include('navbar.php');?>
    <div class="align-right">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Register Now</a>
    </div>
    <div class = "row no-gutters">
        <div class = "col no-gutters">
            <div class = "leftside">
                <img src="image/taekwondo.png" width="400" height="350">
            </div>
        </div>
        <div class = "col no-gutters">
            <div class = "rightside">
                <div class ="elright">
                    <h1>Club Name</h1>
                    <h2>Description:-</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto adipisci ipsam, delectus molestias magnam incidunt magni ratione voluptate. Distinctio architecto sequi at recusandae perferendis accusamus quaerat illum nisi nulla rem.</p>
                </div>
                <div class = "elright2">
                    <h3>Club President:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <h3>Contact:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class = "row no-gutters">
        <div class = "col no-gutters">
            <div class = "elright3">
                <h3>Activity Info:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia possimus dolorem eveniet non reprehenderit dolorum aperiam temporibus aliquid inventore, voluptatibus architecto perferendis doloremque iure, error ab, quaerat perspiciatis beatae enim.</p>
                    <h3>Date:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <h3>Time:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <h3>Duration:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <h3>Location:-</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Club Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Auto-Generated</small>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="name" class="form-control" id="inputfullname">
                </div>
                <div class="form-group">
                    <label for="studentid">Student ID</label>
                    <input type="id" class="form-control" id="inputstudentid">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="inputemail">
                </div>
                <div class="form-group">
                    <label for="intakecode">Intake Code</label>
                    <input type="code" class="form-control" id="inputintakecode">
                </div>
                <div class="form-group">
                    <label for="contactnumber">Contact Number</label>
                    <input type="number" class="form-control" id="inputcontactnumber">
                </div>

            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <footer class="footer_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-col">
                        <div class="footer_detail">
                            <a class="footer-logo">
                                ClubExpress
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos debitis non corporis cupiditate ad totam pariatur accusamus vel, dolores maxime? Optio recusa
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 footer-col">
                    <h4>
                            Quick Links
                        </h4>
                        <p>
                            <a href="">Clubs</a>
                            </p>
                        <p>
                            <a href="">Events</a>
                        </p>
                        <p>
                            <a href="">About Us</a>
                        </p>
                        <p>
                            <a href="">Contact Us   </a>
                        </p>
                    </div>
                    <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                            <h4>
                                Information
                            </h4>
                            <div class="contact_link_box">
                                <a>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>
                                        Email: admin@gmail.com
                                    </span>
                                </a>
                                <a>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>
                                        Phone: 012-3456789
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-info">
                    <p>
                        &copy; <span id="displayYear"></span> 2022 ClubExpress
                        <a>All Rights Reserved</a><br><br>
                    </p>
                </div>
            </div>
        </footer>
</body>
</html>