<?php 
session_start(); 
include "dbcon.php";

if (!isset($_SESSION['email'])) {
    // Redirect to the login/register page if not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['name']) && isset($_POST['venue'])
    && isset($_POST['time']) && isset($_POST['tickets']) && isset($_POST['price'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
	$time = validate($_POST['time']);
    $email = $_SESSION['email'];
	$venue = validate($_POST['venue']);
    $price = validate($_POST['price']);
	$tickets = validate($_POST['tickets']);

	


	if (empty($name)) {
		header("Location: eventform.php?error= Name of event is required");
	    exit();
	}else if(empty($venue)){
        header("Location: eventform.php?error=Venue of event is required");
	    exit();
	}
	else if(empty($time)){
        header("Location: eventform.php?error=Date and time of event is required");
	    exit();
	}

	else if(empty($tickets)){
        header("Location: eventform.php?error=Number of tickets available is required");
	    exit();
	}

	else if(empty($price)){
        header("Location: eventform.php?error=Price of each ticket is required");
	    exit();
	}

	else{  

		
           $sql2 = "INSERT INTO EVENTS(name, email, venue, tickets_available, price, time) VALUES('$name', '$email', '$venue','$tickets','$price','$time')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: addevent.php?success=Your event has been added successfully");
	         exit();
           }else {
	           	header("Location: eventform.php?error=unknown error occurred");
		        exit();
           }
		
	}
	
}else{
	header("Location: eventform.php");
	exit();
}

