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
require('../include/functions.php');

$total_marks = $_POST['total_marks'];
$obt_marks = $_POST['obt_marks'];
$term = $_POST['term'];
$roll_no = $_POST['roll_no'];
$s_name = $_POST['s_name'];


$sql = "UPDATE MARKS 
SET TOTAL_MARKS = $total_marks,
OBTAINED_MARKS = $obt_marks
WHERE ROLL_NO = '$roll_no' AND SUB_ID = (SELECT SUB_ID from SUBJECT where NAME = '$s_name')
AND TERM = '$term'";

if ($conn->query($sql) === TRUE) 
    {
        redirect('marks_update.php');
    }else{
        redirect('marks_edit.php');
    }

$conn->close();

?>