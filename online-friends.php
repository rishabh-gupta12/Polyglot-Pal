<?php
	session_start();
    require('connect_db.php');
	$myusername = $_SESSION['user_id'];
	//echo $myusername;
    $i=0;
	$sql = "SELECT UserID2 FROM friends Where UserID1='$myusername'";
		$result = mysqli_query($connection,$sql);

		if (mysqli_num_rows($result) > 0) {
    
        	while($row = mysqli_fetch_assoc($result)) {
       			 //echo "Sender: " . $row["Sender"]. " Receiver: " . $row["Receiver"]. "Message: " . $row["Message"]. "<br>";
        		//echo $row["UserId2"];
        		$temp=$row["UserID2"];
        		$sql1="SELECT Online,FName,EMail FROM user WHERE ID='$temp'";
        		$result1= mysqli_query($connection,$sql1);
        		if (mysqli_num_rows($result1) > 0) {
        			$row1 = mysqli_fetch_assoc($result1);
        			if($row1["Online"]==1)
        			{
        				$temp=$row1["EMail"];
                        echo '<div class="user">';
                            echo '<img src="pictures/user2.png" width="45" height="45" class="img-circle img-1 pull-left">';
                            echo '<p class="name pull-left">';
        				    echo "<form method='post' action='setuser2.php'><button name='name' value='".$temp."' class='pull-left'>";
                            echo $row1['FName'];
                            echo "</button></form>";
                            echo '</p>';
                            echo '<img src="assets/online.png" width="15" height="15" class="img-circle img-2 pull-right"><hr>';    
                        echo '</div>';
        				//$_SESSION['fname']=$row1["Fname"];
        			}
        		}
        		else
        		{
        			//echo 'Invalid';

        		}
    		}
		} 
        else {
    		//	echo "0 results";
           // $i++;
			}
    $sql = "SELECT UserID1 FROM friends Where UserID2='$myusername'";
        $result = mysqli_query($connection,$sql);

        if (mysqli_num_rows($result) > 0) {
    
            while($row = mysqli_fetch_assoc($result)) {
                 //echo "Sender: " . $row["Sender"]. " Receiver: " . $row["Receiver"]. "Message: " . $row["Message"]. "<br>";
                //echo $row["UserId2"];
                $temp=$row["UserID1"];
                $sql1="SELECT Online,FName,EMail FROM user WHERE ID='$temp'";
                $result1= mysqli_query($connection,$sql1);
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    if($row1["Online"]==1)
                    {
                        $temp=$row1["EMail"];
                        echo '<div class="user">';
                            echo '<img src="pictures/user2.png" width="45" height="45" class="img-circle img-1 pull-left">';
                            echo '<p class="name pull-left">';
                            echo "<form method='post' action='setuser2.php'><button name='name' value='".$temp."' class='pull-left'>";
                            echo $row1['FName'];
                            echo "</button></form>";
                            echo '</p>';
                            echo '<img src="assets/online.png" width="15" height="15" class="img-circle img-2 pull-right"><hr>';    
                        echo '</div>';
                        //$_SESSION['fname']=$row1["Fname"];
                    }
                }
                else
                {
                    //echo 'Invalid';
                }
            }
        } 
        else {
                //echo "0 results";
            //$i++;
            //}
            //if($i==2)
            //{
              //  echo 'No Online Users' ;
            }

?>
