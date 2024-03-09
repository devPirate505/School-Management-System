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
    <title>subject</title>
    <link rel="stylesheet" href="./style/subject.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
        <h1 class="detail" style="margin-top: -16px;">Subjects</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" style="margin:2rem 0 0 0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Class Strength</th>
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
    $s = 0;
    $sql = "SELECT SUBJECT.NAME as S_NAME, CLASS.NAME as C_NAME, CLASS.STRENGTH 
    FROM TEACHER_SUBJECT JOIN SUBJECT JOIN CLASS 
    where TEACHER_SUBJECT.SUBJECT_ID = SUBJECT.SUB_ID 
    and SUBJECT.CLASS_ID = CLASS.CLASS_ID and TEACHER_ID = $t_id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <th scope='row'>".++$s."</th>
            <td>".$row['S_NAME']."</td>
            <td>".$row['C_NAME']."</td>
            <td>".$row['STRENGTH']."</td>
            </tr>
            ";
        }
        echo <<<HTML
            </tbody>
            </table>
        </div>
        </div>
        HTML;
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
</body>

</html>