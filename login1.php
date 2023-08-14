<?php 
session_start(); 
include "dbcon.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE email='$email'";		

		$result = mysqli_query($conn, $sql);
		
		/*if($result && mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
			if (password_verify($pass, $row['password'])) {
				$_SESSION['email'] = $row['email'];
				// Password is correct
				header("Location: addevent.php");
				exit();
			} else {
				// Password is incorrect
				header("Location: login.php?error=Incorect Email or password");
			}
		}
		*/ 

		

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];            	
            	//$_SESSION['id'] = $row['id'];
            	header("Location: addevent.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect Email or password");
		        exit();
			}
        }	
		else{
			header("Location: login.php?error=Incorect Email or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}

