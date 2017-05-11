<?php
	include 'connect_db.php';
	session_start();

	$uid = $_SESSION['user_id'];
	$pid = $_POST['postid'];
	$content = $_POST['comment'];

	$res = mysqli_query($connection, "INSERT INTO comment VALUES ($pid,$uid,NULL,'$content','unread')");

	header("location: profile-main.php");
	
?>
