<?php 
	//session_start();
	require('translate_v2.php');

	function send_msg($sender ,$receiver,$message)
	{
		$db_host='localhost';
		$db_user='root';
		$db_pass='';

		$db_name='polyglotpal' ;

		$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		//$message=mysqli_real_escape_string($connection,$message);
		$sql1= "SELECT Language1 from user where EMail='$sender'";
		$result1=mysqli_query($connection,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		$langfrom=$row1['Language1'];
		$sql1= "SELECT Language1 from user where EMail='$receiver'";
		$result1=mysqli_query($connection,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		$langto=$row1['Language1'];
		$trans=new Translator();
		$trans->getToken();
		if($langfrom=='French')
		{
			$langfrom='fr';
		}
		elseif($langfrom=='German')
		{
			$langfrom='de';
		}
		elseif ($langfrom=='Spanish') 
		{
			$langfrom='es';
		}
		else
		{
			$langfrom='en';
		}

		if($langto=='French')
		{
			$langto='fr';
		}
		elseif($langto=='German')
		{
			$langto='de';
		}
		elseif ($langto=='Spanish') 
		{
			$langto='es';
		}
		else
		{
			$langto='en';
		}
		$translation=$trans->translate($message,$langfrom,$langto);
		//echo $transaltion;
		

		if(!empty($sender) && !empty($receiver) && !empty($message))
		{
			$sql = "INSERT INTO chat (Sender,Receiver,Message,Message_Translated) VALUES ('$sender','$receiver','$message','$translation')";
			if (mysqli_query($connection,$sql)) {
   				 return 1;
			} 
			else {
    			return 0;
			}
		}
		else
		{

			return 2;
		}


	}
		function get_msg()
	{
		$db_host='localhost';
		$db_user='root';
		$db_pass='';

		$db_name='polyglotpal' ;

		$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		$sql = "SELECT Sender,Receiver,Message FROM chat";
		$result = mysqli_query($connection,$sql);

		if (mysqli_num_rows($result) > 0) {
    // output data of each row
        	while($row = mysqli_fetch_assoc($result)) {
       			 echo "Sender: " . $row["Sender"]. " Receiver: " . $row["Receiver"]. "Message: " . $row["Message"]. "<br>";
    		}
		} else {
    			echo "0 results";
			}

	}
?>