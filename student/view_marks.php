<?php
session_start();
require('../include/functions.php');
authenticate();
require("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/theme.css">
    <link rel="stylesheet" href="style/view_marks.css">      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Marks</title>
    
</head>

<body>
    <h1 class="detail" style="margin-top: -16px;">Student Marks</h1>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h4 class='termhead'>Mid term</h4>
                    <table class="table table-striped" style="margin-left: 0;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Obtained Marks</th>
                                <th scope="col">Percentage</th>
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

    $roll_no = $_SESSION['ROLL_NO'];
    $s1 = 0;
    $sql = "SELECT * FROM MARKS WHERE ROLL_NO = '$roll_no'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sub_sql = "SELECT NAME FROM SUBJECT WHERE SUB_ID = '$row[SUB_ID]'";
            $sub_result = $conn->query($sub_sql);
            $sub_row = $sub_result->fetch_assoc();
          if($row['TERM'] == "Mid"){

            echo "<tr>
            <th scope='row'>".++$s1."</th>
            <td>".$sub_row['NAME']."</td>
            <td>".$row['TOTAL_MARKS']."</td>
            <td>".$row['OBTAINED_MARKS']."</td>
            <td>".($row['OBTAINED_MARKS']/$row['TOTAL_MARKS'] * 100)."%</td>
            </td>
            </tr>
            ";
          }
        }
        echo <<<HTML
            </tbody>
            </table>
        </div>
        </div>
        HTML;
    }
    

    ?>
                <div class="row">
                <div class="col-md-12">
                <h4 class='termhead'>Final term</h4>
                    <table class="table table-striped" style="margin-left: 0;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Obtained Marks</th>
                                <th scope="col">Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php

    $s1 = 0;
    $sql = "SELECT * FROM MARKS WHERE ROLL_NO = '$roll_no'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sub_sql = "SELECT NAME FROM SUBJECT WHERE SUB_ID = '$row[SUB_ID]'";
            $sub_result = $conn->query($sub_sql);
            $sub_row = $sub_result->fetch_assoc();
        if($row['TERM'] == "Final"){
            echo "<tr>
            <th scope='row'>".++$s1."</th>
            <td>".$sub_row['NAME']."</td>
            <td>".$row['TOTAL_MARKS']."</td>
            <td>".$row['OBTAINED_MARKS']."</td>
            <td>".($row['OBTAINED_MARKS']/$row['TOTAL_MARKS'] * 100)."%</td>
            </td>
            </tr>
            ";
        }
    }
    echo <<<HTML
            </tbody>
            </table>
            </div>
            </div>
        HTML;
    }

    ?>

        <div class="row">
                <div class="col-md-12">
                <h4 class='termhead'>Total Marks</h4>
                    <table class="table table-striped" style="margin-left: 0;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Obtained Marks</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

$s1 = 0;
$sql = "select ROLL_NO, NAME, sum(TOTAL_MARKS) as TOTAL, sum(OBTAINED_MARKS) as OBTAINED 
from MARKS join SUBJECT 
where MARKS.SUB_ID = SUBJECT.SUB_ID and 
ROLL_NO = '$roll_no' group by MARKS.SUB_ID;";
$result = $conn->query($sql);
if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <th scope='row'>".++$s1."</th>
        <td>".$row['NAME']."</td>
        <td>".$row['TOTAL']."</td>
        <td>".$row['OBTAINED']."</td>
        <td>".($row['OBTAINED']/$row['TOTAL'] * 100)."%</td>
        <td>".grade(($row['OBTAINED']/$row['TOTAL'] * 100))."</td>";
        if(grade(($row['OBTAINED']/$row['TOTAL'] * 100)) == "F"){
            echo "<td style='color:red;'>".status(grade(($row['OBTAINED']/$row['TOTAL'] * 100)))."</td>";
        }else{
            echo "<td style='color:green;'>".status(grade(($row['OBTAINED']/$row['TOTAL'] * 100)))."</td>";
        }
        
        echo "</tr>";
    }
echo <<<HTML
        </tbody>
        </table>
        </div>
        </div>
    HTML;
}

?>

            
            </div>
        </div>

        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>