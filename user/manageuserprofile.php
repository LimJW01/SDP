<?php
    include ("includes/dbh.php");


    // start session if it is not set
    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $student_id = $_SESSION['student_id'];
    // sql query to retrieve user's data from the database based on the user's id
    $sql_query = "SELECT * FROM students WHERE student_id = '$student_id'";
    // store the result of sql query in a variable
    $result = mysqli_query($conn, $sql_query);
    // fetch a row of data as an associative array
    $row = mysqli_fetch_assoc($result); 

    // if submit button is clicked
    if(isset($_POST['updateRecord'])){
        // get the value from the form and store in a variable
        $Student_name = $_POST['txtName'];
        $TP_number = $_POST['txtTpnumber'];
        $Gender = $_POST['txtGender'];
        $Email = $_POST['txtEmail'];
        $Password = $_POST['txtPassword'];
        $Contact_number = $_POST['txtContact'];
        //create update sql
        $query = "UPDATE `students` SET `Student_name`='$Student_name',`TP_number`='$TP_number',`Gender`='$Gender', `Email`='$Email', `Password`='$Password', `Contact_number`='$Contact_number'  WHERE student_id='$student_id'";
        // if query is executed successfully
        mysqli_query($conn, $query);

        echo "<script> window.location.href='index.php';</script>";
        mysqli_close($conn);

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="css/footer.css">

    <style>
    </style>

    <title>User Profile</title>


</head>
<body>
<?php include('includes/navbar.php'); ?>
<form action="" method="post">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">Welcome To Your Profile Page!</span>
                    <span class="text-black-50">You May Edit Your Personal Details Here!</span><span></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">My Profile</h4>
                    </div>
                    <div class="form__group">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="username" name="txtName" value="<?php echo $row['Student_name'] ?>">
                                <label for="username "class="labels">Full Name</label>
                                <br>
                                <input type="text" class="form-control" id="inputtpnumber" name='txtTpnumber' value="<?php echo $row['TP_number'] ?>">
                                <label class="labels" for="inputtpnumber">TP Number</label>
                                <br>
                                <input type="text" class="form-control" id="inputgender" name='txtGender' value="<?php echo $row['Gender'] ?>">
                                <label class="labels" for="inputgender">Gender</label>
                                <br>
                                <input type="email" class="form-control" id="inputemail" name='txtEmail' value="<?php echo $row['Email'] ?>">
                                <label class="labels" for="inputemail">Email Address</label>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Security</span></div><br>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo $row['Password'] ?>" id="password" name="txtPassword">
                        <label class="labels" for="inputnewpassword">New Password</label>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo $row['Contact_number'] ?>" id="txtContact" name="txtContact">
                        <label class="labels" for="inputcontact">Contact Number</label>
                    </div>
                    <br>
                    <button type="submit" name="updateRecord" value="Update Record" class="btn btn-outline-primary">Update Record</button>
                    
                </div>
            </div>
        </div>
    </div>
    </form>
    <div>
        <?php include_once "./includes/footer.php"; ?>
</body>
</html>











