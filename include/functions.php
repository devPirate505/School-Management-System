<?php

/*
    Redirect user to login page if a person
    has not signed in or his session is expired
*/

function authenticate()
{
    //--CHECK IF USER IS LOGGED IN

    if(!isset($_SESSION['login_id']) && !isset($_COOKIE['login_id']))
    {
        header('location: ../index.php?msg=Please Login First');
        exit();
    }
}

/*
    Redirect user to a new location = $url
    With a message = $msg
    And a message type = $msg_type
*/

function redirect($url, $msg = NULL, $msg_type='success')
{
    
    $_SESSION['msg'] = $msg;
    $_SESSION['msg_type'] = $msg_type;
    header("location: $url");
    exit();

}

/* 
    Display a message
    If available in session
    and delete after displaying
*/

function show_msg()
 {
	if(isset($_SESSION['msg']))
	 {
		 
		 if($_SESSION['msg_type'] == 'error')
		 {
		 
			 echo "<div id='msg' class='error'>$_SESSION[msg]</div>";
			 unset($_SESSION['msg']);
			 
		 }else{
			 
			 echo "<div id='msg' class='success'>$_SESSION[msg]</div>";
			 unset($_SESSION['msg']);
			 
		 }
	 }
	 
 }

function grade($marks){

// Define the grading system
$grading_system = array(
    array('A+', 95),
    array('A', 90),
    array('A-', 85),
    array('B+', 80),
    array('B', 75),
    array('B-', 70),
    array('C+', 65),
    array('C', 60),
    array('C-', 55),
    array('D', 50),
    array('F', 0)
);

// Loop through each grade and check if the obtained marks fall within the grade range
foreach ($grading_system as $grade) {
    if ($marks >= $grade[1]) {
        $letter_grade = $grade[0];
        break;
    }
}
return $letter_grade;
}

function status($grade){
    if($grade == 'F'){
        $stat = 'Fail';
    }else{
        $stat = 'Pass';
    }

    return $stat;
}

?>