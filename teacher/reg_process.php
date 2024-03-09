<?php
session_start();
require('../include/functions.php');

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

$name = $_POST['full-name'];
$email = $_POST['email'];
$password1 = $_POST['password'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$class_id = $_POST['class'];

$sql = "SELECT STRENGTH FROM CLASS WHERE CLASS_ID = $class_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$class_strength = $row['STRENGTH'];
$class_strength += 1;

if($class_strength < 10){
    $roll_no = "P".strval($class_id)."-".strval($class_id)."0".strval($class_strength);
}else{
    $roll_no = "P".strval($class_id)."-".strval($class_id).strval($class_strength);
}

// echo $roll_no;
$sql = "INSERT INTO STUDENT(ROLL_NO, NAME, EMAIL, PASSWORD, DOB, GENDER, CLASS_ID, ADMIN_ID) 
VALUES('$roll_no', '$name', '$email', '$password1', '$dob', '$gender', $class_id, 1)";

if ($conn->query($sql) === TRUE) 
    {
       redirect('student_add.php');
    }else{
        redirect('student_add.php', 'Error: Student not added', 'error');
    }



?>