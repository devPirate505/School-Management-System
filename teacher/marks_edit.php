<?php
session_start();
require('../include/functions.php');
authenticate();
require("header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>view marks</title>
    <link rel="stylesheet" href="./style/update_marks.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
        <h1 class="detail" style="margin-top: -16px;">Edit Marks</h1>
        <div class="container">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$t_id = $_SESSION['T_ID'];
$roll_no = $_GET['id'];
$name = $_GET['name'];
$term = $_GET['term'];

    $search_query = $_GET['search_query'];
    $sql = "SELECT MARKS.ROLL_NO, STUDENT.NAME AS STD_NAME, SUBJECT.NAME AS SUB_NAME, CLASS.NAME AS C_NAME, 
    TOTAL_MARKS, OBTAINED_MARKS, TERM 
    FROM TEACHER_SUBJECT JOIN MARKS JOIN STUDENT JOIN SUBJECT JOIN CLASS 
    WHERE TEACHER_SUBJECT.SUBJECT_ID = MARKS.SUB_ID AND MARKS.ROLL_NO = STUDENT.ROLL_NO 
    AND TEACHER_SUBJECT.SUBJECT_ID = SUBJECT.SUB_ID AND CLASS.CLASS_ID = MARKS.CLASS_ID 
    AND TEACHER_ID = $t_id AND MARKS.ROLL_NO = '$roll_no' AND SUBJECT.NAME = '$name' 
    AND TERM = '$term'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <div class='row'>
                <div class='col-md-12' id='edit_form'>
                    <form action='edit_process.php' method='post'>
                    <label class='label'>Roll No: </label>
                    <input type='text' name='roll_no' value='".$row['ROLL_NO']."' readonly></br>
                    <label class='label'>Student Name: </label>
                    <input type='text' name='std_name' value='".$row['STD_NAME']."' readonly></br>
                    <label class='label'>Class: </label>
                    <input type='text' name='c_name' value='".$row['C_NAME']."' readonly></br>
                    <label class='label'>Subject: </label>
                    <input type='text' name='s_name' value='".$row['SUB_NAME']."' readonly></br>
                    <label class='label'> Term: </label>
                    <input type='text' name='term' value='".$row['TERM']."' readonly></br>
                    <label class='label'> Total marks: </label>
                    <input type='number' max='100' min='0' name='total_marks' value='".$row['TOTAL_MARKS']."'></br>
                    <label class='label'> Obtained marks: </label>
                    <input type='number' max='100' min='0' name='obt_marks' value='".$row['OBTAINED_MARKS']."'></br></br>

                    <a href='marks_update.php'><button type='button' class='btn btn-outline-secondary'>Back</button></a>
                    <button type='submit' class='btn btn-outline-primary'>Save</button>
                    </form>


                </div>
            </div>
        
        
        
        
        
        ";
        }
    }
?>

        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>

<style>
    #edit_form label{
        line-height: 35px;
    }

</style>

</html>