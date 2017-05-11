<?php	
    session_start();
	require('connect_db.php');
	require('func.php');
    $_SESSION['user2']=$_POST['name'];
    $temp=$_POST['name'];
    $sql="SELECT FName from user Where EMail='$temp'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) > 0) {
    	$row=mysqli_fetch_assoc($result);
    	$_SESSION['user2_fname']=$row['FName'];
    	echo $_SESSION['user2_fname'];
    }
    else
    {
    	echo 'error';
    }
    header("location: main_v4.php");
?>    