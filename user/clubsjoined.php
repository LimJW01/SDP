<?php
    include('includes/dbh.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
    .align-right {
        text-align: right;
        border: 0;
        margin-right: 50px;
    }

    .title {
        margin-left: 50px;
    }
    </style>

    <title>Clubs Joined</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>
<article id="clubs">
    <div class="title">
        <h1>Clubs Joined<br></h1>
    </div>
    <div class="card column" style='width: 190px; margin-left: 50px;'>
        <?php $sql = "SELECT * FROM clubs ORDER BY Club_name ASC";
                $result = $conn->query($sql);
                $result_check = mysqli_num_rows($result);
                ?>
            <?php if ($result_check > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <a href="club.php?club=<?php echo $row['Club_name']; ?>">
                <div class='grid-item'>
                    <div class="img-container">
                        <img title="<?php echo $row['Club_name']; ?>"
                            src="data:image/jpeg;base64,<?php echo base64_encode($row['Club_image']); ?>"
                            alt='club_image'>
                    </div>
                    <h2><?php echo $row['Club_name']; ?></h2>
                </div>
            </a>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </article>












<?php include_once "./includes/footer.php"; ?>
    
</body>
</html>