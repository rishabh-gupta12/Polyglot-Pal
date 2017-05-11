<?php
	include 'connect_db.php';
	session_start();

	$uid = $_SESSION['user_id'];
	$to = $_POST['to'];
	$content = $_POST['body'];

	$res = mysqli_query($connection, "SELECT EMail from user where UID = $uid");
	$row = mysqli_fetch_assoc($res);

	$sender_email = $row['EMail'];

	$sql = "INSERT into message values(NULL,'$sender_email','$to','$content')"; 

	header("location: profile-messages.php");
?>