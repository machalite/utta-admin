<?php
	//called on log out

	@session_start();
	//display header
	include_once ("connection.php");
	//fetch strings to display
	include_once ("strings.php");

	//get user id from session
	$userId=$_SESSION['id'];

	//record logout in activity log
	$sql = "INSERT INTO activitylog (user,activity)
		VALUES($userId,'$actLogout')";

	//execute SQL statement
	mysqli_query($con, $sql);

	//destroy all sessions on log out
	@session_destroy();
	session_write_close();//End the current session and store session data.
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);//Update the current session id with a newly generated one

	//redirect to login page
	header("Location: login.php");
?>
