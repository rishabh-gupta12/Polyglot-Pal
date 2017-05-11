<?php 
	session_start();
	$db_host='localhost';
	$db_user='root';
	$db_pass='';

	$db_name='polyglotpal' ;

	$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if($connection)
	{
		//echo 'connected';
	}
	$user1=$_SESSION['user1'];
	//echo $user1;
	$sql = "SELECT Sender,Message FROM message WHERE Receiver='$user1'";
	$result = mysqli_query($connection,$sql);

	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$temp=$row['Sender'];
			$sql1 = "SELECT FName,LName FROM user WHERE EMail='$temp'";
			$result1=mysqli_query($connection,$sql1);
			$row1=mysqli_fetch_assoc($result1); 
			echo '<div class="sender">';
				echo '<img src="pictures/user2.png" width="50" height="50">';
				echo '<p class="name">'.$row1['FName'].'</p>';
			echo '</div>';

			echo '<div class="message-content">' ;           		
				echo $row['Message'];
			echo '</div>';
			echo '<hr>';
			//echo 'Sender:'.$row['Sender'].'<br>'.'Message:'.$row['Message'];
		}
	}
	else
	{
		echo 'No Messages';
	}

?>