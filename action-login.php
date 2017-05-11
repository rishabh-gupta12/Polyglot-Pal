<?php
	session_start();
	include 'connect_db.php';
	
	$email = $_POST['email'];
	$pass = $_POST['password'];	

	// Create connection
	

	$sql = "select EMail, Password from user where EMail='$email' and Password='$pass' ";
	$sql1 = "select ID from user where EMail='$email' and Password='$pass' ";

	$result = mysqli_query($connection, $sql);
	$result1 = mysqli_query($connection, $sql1);

	

	if (mysqli_num_rows($result1) == 1){
		echo "Hello There";
        $get= mysqli_fetch_array($result1,MYSQLI_NUM);
		$user_id = $get[0];
		//echo $user_id;
		$_SESSION['user_id']=$get[0];
		$_SESSION['user1'] = $email;
		echo $get[0];
		mysqli_query($connection, "UPDATE user SET Online = '1' where ID = $get[0]");

		header("location: profile-main.php");
	}
	else {
		echo '<script> alert("Try again"); </script>';
		header ('location: profile-login.php');
	}

	mysqli_close($connection);
?>