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
session_start();

require('include/functions.php');

$login_email = $_POST['login_email'];
$login_password = $_POST['login_password'];
$login_save = $_POST['login_save'];

$sql = "SELECT T_ID, EMAIL, PASSWORD, USERNAME FROM TEACHER";
$result = $conn->query($sql);
if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["EMAIL"] == $login_email && $row["PASSWORD"] == $login_password){
        
        $_SESSION['login_id'] = $login_email;    //--create our token variable
        $_SESSION['username'] = $row["USERNAME"];
        $_SESSION['T_ID'] = $row["T_ID"];
        if($login_save == 'yes')
        {
            setcookie('login_id', $login_email, time() + 60);
        }
        redirect("teacher/teacher_detail.php");
      }
    }
}
$sql = "SELECT EMAIL, PASSWORD, USERNAME FROM ADMIN";
$result = $conn->query($sql);
if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["EMAIL"] == $login_email && $row["PASSWORD"] == $login_password){
        
        $_SESSION['login_id'] = $login_email;   //--create our token variable
        $_SESSION['username'] = $row["USERNAME"];

        if($login_save == 'yes')
        {
            setcookie('login_id', $login_email, time() + 60);
        }
        redirect("admin/home.php");
      }
    }
}
$sql = "SELECT EMAIL, PASSWORD, NAME FROM STUDENT";
$result = $conn->query($sql);
if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["EMAIL"] == $login_email && $row["PASSWORD"] == $login_password){
        
        $_SESSION['login_id'] = $login_email;    //--create our token variable
        $_SESSION['username'] = $row["NAME"];
        
        if($login_save == 'yes')
        {
            setcookie('login_id', $login_email, time() + 60);
        }
        redirect("student/personal_detail.php");
      }
    }
}

redirect('./index.php', 'Error: Invalid Email or Password', 'error');

$conn->close();

?>