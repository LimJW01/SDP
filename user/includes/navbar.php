<?php
        if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <style>
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 50px;
        padding-left: 50px;
    }
    </style>
    <title>ClubExpress</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-!" href="aboutus.php"><img src="../images/logo.png" height="60px" width="70px"
                        alt="logo">
                    <h1 class="logo-name">ClubExpress</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Clubs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="event.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AboutUs.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ContactUs.php">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (isset($_SESSION['student_id'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="clubsjoined.php">Clubs Joined</a>
                                <a class="dropdown-item" href="user_profile.php">Account Settings</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>

                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>