<?php
	
	include 'connect_db.php';

	session_start();
	
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$dob=$_POST['dateofbirth'];
	$pass=$_POST['password'];
	$gender=$_POST['inlineRadioOptions'];
	$lang1=$_POST['languagespoken'];
	$lang2=$_POST['languagechoice'];


	$sql = "INSERT INTO user VALUES ('','$fname','$lname','$email','$dob','$gender','$pass','$lang1','$lang2','NULL','','')";
	
	$sql1="select EMail from user where EMail='$email'";

	$result=mysqli_query($connection,$sql1);

	if ((mysqli_num_rows($result)==0)) {
		(mysqli_query($connection,$sql));

	    echo '<script>alert("Sign up successful");</script>';

		$sql2 = "select ID from user where EMail='$email' and Password='$pass'";
		$result2 = mysqli_query($connection, $sql2);
		if (mysqli_num_rows($result2)==1){
	        $get= mysqli_fetch_array($result2,MYSQLI_NUM);
			$user_id = $get[0];
			$_SESSION['user_id'] = $user_id;
			header("location: action-login.php");
		}
		
		echo '</script>';
	} 
	else{
	    echo '<script>alert("Email already exists");</script>';
		header("location: profile-signup.php");
	}

	mysqli_close($connection);
?>