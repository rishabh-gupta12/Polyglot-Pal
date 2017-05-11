<?php
	//require('connect_db.php');
	session_start();
	require('func.php');

		$sender=$_SESSION['user1'];
		$receiver=$_SESSION['user2'];
		//echo $sender;
		//echo $receiver;
		if(isset($_GET['message'])&&!empty($_GET['message'])){
			$message=$_GET['message'];
			if(send_msg($sender, $receiver, $message)){
		//		echo 'message sent';
			}
			else{
		//		echo 'Message Not sent';
			}

		}
		else{
		//	echo 'No Message';
		}

?>