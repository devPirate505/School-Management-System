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
    <title>Teacher Details</title>
    <link rel="stylesheet" href="./style/teacher_detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>

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

    $login_email = $_SESSION['login_id'];
    $sql = "SELECT T_ID, NAME, GENDER, PHONE, SALARY FROM TEACHER WHERE EMAIL = '$login_email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['T_ID'] = $row["T_ID"];

  ?>
        <div class="row">
            <div class="col-md-12">
                <h1 class="detail" style="margin-top: -16px;">Teacher Details</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <label class="label col-md-4">Name: <?php echo $row['NAME'];?></label>
                    <label class="label col-md-4">Gender: <?php echo $row['GENDER'];?></label>
                    <label class=" label col-md-4">Email: <?php echo $login_email;?></label>
                    <label class=" label col-md-4">Phone: <?php echo $row['PHONE'];?></label>
                    <label class="label col-md-4">Salary: <?php echo $row['SALARY'];?></label>
                </div>
            </div>
        </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>