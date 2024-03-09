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
        <h1 class="detail" style="margin-top: -16px;">Student Marks</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="d-flex" method="get" action="marks_update.php" role="search">
                        <input class="form-control me-2" type="search" name="search_query" placeholder="Search Roll No" aria-label="Search" required>
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        <?php 

            show_msg();
        
        ?>
            <div class="row">
                <div class="col-md-12" style=" margin-left:0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Roll No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Obtained Marks</th>
                                <th scope="col">Term</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
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

if(!isset($_GET['search_query'])){
    $sql = "SELECT MARKS.ROLL_NO, STUDENT.NAME AS STD_NAME, SUBJECT.NAME AS SUB_NAME, CLASS.NAME AS C_NAME, 
    TOTAL_MARKS, OBTAINED_MARKS, TERM 
    FROM TEACHER_SUBJECT JOIN MARKS JOIN STUDENT JOIN SUBJECT JOIN CLASS 
    WHERE TEACHER_SUBJECT.SUBJECT_ID = MARKS.SUB_ID AND MARKS.ROLL_NO = STUDENT.ROLL_NO 
    AND TEACHER_SUBJECT.SUBJECT_ID = SUBJECT.SUB_ID AND CLASS.CLASS_ID = MARKS.CLASS_ID 
    AND TEACHER_ID = $t_id";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>".$row['ROLL_NO']."</td>
            <td>".$row['STD_NAME']."</td>
            <td>".$row['C_NAME']."</td>
            <td>".$row['SUB_NAME']."</td>
            <td>".$row['TOTAL_MARKS']."</td>
            <td>".$row['OBTAINED_MARKS']."</td>
            <td>".$row['TERM']."</td>
            <td><a href='marks_edit.php?id=$row[ROLL_NO]&name=$row[SUB_NAME]&term=$row[TERM]'>
            <button type='button' class='btn btn-primary btn-sm'>
                Edit
                </button></a>
            <a href='marks_delete.php?id=$row[ROLL_NO]&name=$row[SUB_NAME]&term=$row[TERM]'>
                <button type='button' class='btn btn-danger btn-sm'>
                    Delete
                </button>
                </a>
                </td>
                </tr>
            ";
        }
    }
}else{
    $search_query = $_GET['search_query'];
    $sql = "SELECT MARKS.ROLL_NO, STUDENT.NAME AS STD_NAME, SUBJECT.NAME AS SUB_NAME, CLASS.NAME AS C_NAME, 
    TOTAL_MARKS, OBTAINED_MARKS, TERM 
    FROM TEACHER_SUBJECT JOIN MARKS JOIN STUDENT JOIN SUBJECT JOIN CLASS 
    WHERE TEACHER_SUBJECT.SUBJECT_ID = MARKS.SUB_ID AND MARKS.ROLL_NO = STUDENT.ROLL_NO 
    AND TEACHER_SUBJECT.SUBJECT_ID = SUBJECT.SUB_ID AND CLASS.CLASS_ID = MARKS.CLASS_ID 
    AND MARKS.ROLL_NO = '$search_query' and TEACHER_ID = $t_id";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row['ROLL_NO']."</td>
        <td>".$row['STD_NAME']."</td>
        <td>".$row['C_NAME']."</td>
        <td>".$row['SUB_NAME']."</td>
        <td>".$row['TOTAL_MARKS']."</td>
        <td>".$row['OBTAINED_MARKS']."</td>
        <td>".$row['TERM']."</td>
        <td><a href='marks_edit.php?id=$row[ROLL_NO]&name=$row[SUB_NAME]&term=$row[TERM]&search_query=$search_query'>
        <button type='button' class='btn btn-primary btn-sm'>
            Edit
            </button>
            <button type='button' class='btn btn-danger btn-sm'>
                Delete
        </button></a>
            </td>
            </tr>
        ";
        }
    }else{
        
    }
}
?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
        })
    </script>

</body>

</html>