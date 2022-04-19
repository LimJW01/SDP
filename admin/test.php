<?php
$student_list = array('a', 'b');
$club_member_list = array();
$available_student_list = array_diff($student_list, $club_member_list);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php foreach ($available_student_list as $i) {
            echo $i;
        } ?></h1>
</body>

</html>