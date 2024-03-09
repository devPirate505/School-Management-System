<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1 style='display: inline-block; margin: 7px 0px 7px 10px;'>
        XYZ School
    </h1>
    <p id="address">Phase 1, Hayatabad, Peshawar</p>

    <div id="menu">
        <a href="teacher_detail.php">Details</a>
        <a href="subject.php">Subject</a>
        <a href="marks_update.php">Student Marks</a>
        <a href="student_add.php">Add Student</a>
        <a href="../log_out.php">Log out</a>
    </div>

</body>
</html>

<?php

echo "<div align='right' style='display: inline-block; width: 40%;'> Welcome " . @$_SESSION['username'] . "</div> <hr/>";

	show_msg();

?>

<style>
#menu{
    display: inline-block;
    margin-left: 100px;
}
#menu a{
    margin-left: 15px;
    text-decoration: none;
}

#address{
    width: 18%;
    position: absolute;
    top: 52px;
    left: 19px;
    font-size: 13px;
}
</style>