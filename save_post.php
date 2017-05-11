<?php
	include 'connect_db.php';
	session_start();

	$uid = $_SESSION['user_id'];
	$lang = $_POST['language'];
	$content = $_POST['post'];

	$res = mysqli_query($connection, "INSERT INTO post VALUES ($uid,'','$content','$lang','unread')");

	header('location: profile-main.php');
	
?>
