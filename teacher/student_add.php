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
        <h1 class="detail" style="margin-top: -16px;">Add Student</h1>
        <div class="container">
        <form method="post" action="reg_process.php" class="student-form">
        <h2>Student Registration Form</h2>
        <?php 
        
            show_msg();
        
        ?>
        <div class="form-group">
          <label for="full-name">Full Name:</label>
          <input type="text" class="form-control" id="full-name" name="full-name" placeholder="Enter full name" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
        </div>
        <div class="form-group">
          <label for="email">Password: </label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
            <label class="form-check-label" for="male">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
            <label class="form-check-label" for="female">
              Female
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
            <label class="form-check-label" for="other">
              Other
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="class">Class:</label>
          <select class="form-control" id="class" name="class" required>
            <option value="">-- Select Class --</option>
            <option value="1">Class 1</option>
            <option value="2">Class 2</option>
            <option value="3">Class 3</option>
            <option value="4">Class 4</option>
            <option value="5">Class 5</option>
            <option value="6">Class 6</option>
            <option value="7">Class 7</option>
            <option value="8">Class 8</option>
            <option value="9">Class 9</option>
            <option value="10">Class 10</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
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
<style>
    .error{
    border: 1px solid brown;
    background: #c77;
    color: white;
    padding: 5px;
    text-align: center;
}

.done{
    border: 1px solid darkgreen;
    background: #7c7;
    color: white;
    padding: 5px;
    text-align: center;
}


</style>


</html>

<style>

body {
      background-color: #f5f5f5;
    }

    .form-container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      margin-bottom: 10px;
    }

</style>

</html>