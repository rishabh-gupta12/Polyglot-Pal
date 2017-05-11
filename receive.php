<?php 
		session_start();
		$db_host='localhost';
		$db_user='root';
		$db_pass='';

		$db_name='polyglotpal' ;

		$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		$user1=$_SESSION['user1'];
		$user2=$_SESSION['user2'];
		//echo $user1;
		//echo $user2;
		$sql = "SELECT Sender,Receiver,Message,Message_Translated FROM chat where Sender='$user1' and Receiver='$user2' or Sender='$user2' and Receiver='$user1'";
		$result = mysqli_query($connection,$sql);

    $sql1 = "SELECT Translate_Message FROM user WHERE EMail='$user1'";
    $result1 = mysqli_query($connection,$sql1);
    $row1 = mysqli_fetch_assoc($result1);

		if (mysqli_num_rows($result) > 0) {
    // output data of each row
        	echo "<ul class='list-unstyled'>";
        	while($row = mysqli_fetch_assoc($result)) {
       			 if($row["Sender"]==$user2){
       			 		echo "<li class='user1 pull-left'>".$row["Message"]."</li>";
                    	echo "<br><br>";
                if($row1['Translate_Message']==1){        
                    echo "<li class='user-translated pull-left'>".$row["Message_Translated"]."</li>";
                        echo "<br><br>";  
                }         
       			 }
       			 else{
       			 		echo "<li class='user2 pull-right'>".$row["Message"]."</li>";
                      echo "<br><br>";
       			 }
                    	
                    	//<li class="user2 pull-right">Hi, ceiling!</li>
                   
       			 //echo "Sender: " . $row["Sender"]. " Receiver: " . $row["Receiver"]. "Message: " . $row["Message"]. "<br>";
    		}
    		echo " </ul>";
		} else {
    			echo "0 results";
			}

	
?>

