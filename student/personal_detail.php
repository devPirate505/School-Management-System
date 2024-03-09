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
    <link rel="stylesheet" href="style/personal_details.css">      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Information</title>
</head>
<body>
    <div>
        <h1 class="detail" style="margin-top: -16px;">Personal Details</h1>
      </div>
  <div class="container-fluid">
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
    $sql = "SELECT ROLL_NO, NAME, DOB, GENDER, CLASS_ID FROM STUDENT WHERE EMAIL LIKE '%$login_email%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $class = $row["CLASS_ID"];
    $_SESSION['ROLL_NO'] = $row["ROLL_NO"];
    $roll = $_SESSION['ROLL_NO'];

  ?>

    <div class="row">

      <div class="col-md-12">
        <label class="label">Roll No: <?php echo $roll;?> </label>
        <label class="label">Name: <?php echo $row["NAME"];?></label>
        <label class="label">DOB: <?php echo $row["DOB"];?></label> <br>
        <label class="label">Email: <?php echo $login_email;?></label>
        <label class="label">Gender: <?php echo $row["GENDER"];?></label>
        <?php 
          $sql = "SELECT NAME FROM CLASS WHERE CLASS_ID LIKE '%$class%'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
        ?>
        <label class="label">Class: <?php echo $row["NAME"];?></label>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</body>
</html>