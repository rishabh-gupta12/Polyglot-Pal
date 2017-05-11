<?php
	session_start();
	require('connect_db.php');
		$sender=$_SESSION['user1'];

		if(isset($_GET['to'])&&!empty($_GET['to']))
		{
			if(isset($_GET['body'])&&!empty($_GET['body']))
			{
				$receiver=$_GET['to'];
				$message=$_GET['body'];
				$sql = "INSERT INTO message VALUES ('','$sender','$receiver','$message')";
				mysqli_query($connection,$sql);
				echo 'Message Sent';
			}	
		}
?>