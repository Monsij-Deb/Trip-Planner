<?php 
session_start();

// connect to database
$db = mysqli_connect('127.0.0.1', 'root', '', 'web3');

// variable declaration
$place = "";
$count   = "";
$start = "";
$end = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $place, $count, $start, $end;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$place    =  e($_POST['place']);
	$count       =  e($_POST['count']);
	$start   =  e($_POST['start']);
	$end  =  e($_POST['end']);

	// form validation: ensure that the form is correctly filled
	if (empty($place)) { 
		array_push($errors, "place is required"); 
	}
	if (empty($count)) { 
		array_push($errors, "no. of people is required"); 
	}
	if (empty($start)) { 
		array_push($errors, "arrival date is required"); 
	}
	if (empty($end)) { 
		array_push($errors, "leaving date is required");}
	if ($start > $end) {
		array_push($errors, "invalid dates");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		

		if (isset($_POST['count'])) {
			$user_type = e($_POST['count']);
			$query = "INSERT INTO book (place, count, start, end) 
					  VALUES('$place', '$count', '$start', '$end')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New booking successfully created!!";
			header('location: index.php');
		}
	}
	
}



// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}





