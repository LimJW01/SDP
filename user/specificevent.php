<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

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

    div.polaroid {
        width: 100%;
        background-color: white;
        margin-bottom: 25px;
    }

    div.container {
        text-align: center;
        padding: 10px 20px;
    }

    .layered.box {
        box-shadow:
            0 1px 1px hsl(0deg 0% 0% / 0.075),
            0 2px 2px hsl(0deg 0% 0% / 0.075),
            0 4px 4px hsl(0deg 0% 0% / 0.075),
            0 8px 8px hsl(0deg 0% 0% / 0.075),
            0 16px 16px hsl(0deg 0% 0% / 0.075);
    }
    </style>



    <title>Specific Event</title>
</head>

<body>
    <?php include('includes/navbar.php'); ?>
    <div class="title">
        <h1>Club's Event<br></h1>
    </div>
    <div class="polaroid">
        <!-- insert event photo from database below -->
        <img src="image/taekwondo.png" alt="5 Terre" style="width:20%">
        <div class="container">
            <!-- insert event name from database below -->
            <h3>Event Name Here</h3>
        </div>
        <div class="wrapper">
            <div class="layered box">
                <div class="descevent">
                    <h3>Description</h3>
                    <br>
                    <p>Paste event description from database here</p>
                </div>
            </div>
        </div>
    </div>













    <?php include_once "./includes/footer.php"; ?>

</body>

</html>