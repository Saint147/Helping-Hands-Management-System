<?php
session_start();
include("connection.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    include "connection.php";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	//$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location:login.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location:login.php?error=Password is Required");
	}else {

		// Hashing the password
		$password = md5($password);
        
        //$sql = "SELECT * FROM `tbluuser` WHERE username='$username' AND password='$password'";
        $sql="Select * from `tbluuser` where username='$username' and password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] = $password ) {
        		$_SESSION['username'] = $row['username'];
        		$_SESSION['id'] = $row['Id'];
                $_SESSION['email'] = $row['email'];
        		$_SESSION['userType'] = $row['userType'];
                $_SESSION['status'] = $row['status'];
        		$_SESSION['login'] = $row['username'];

        		header("Location:dashboard.php");

        	}else {
        		header("Location:login.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location:login.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location:login.php");
}
?>