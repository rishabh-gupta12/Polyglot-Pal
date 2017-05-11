<?php
     session_start();
       #$_SESSION["id"] = 12;
       $a = $_SESSION['user_id'];
       #echo $a;
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "polyglotpal"; 
       $conn = mysqli_connect($servername, $username, $password,$dbname);
       if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
       } 
       #$a = $_SESSION["id"];
       $sql1 = "SELECT PID from post where UID = '$a'";
       $result1 = mysqli_query($conn,$sql1);
       $end_result = '';
    while($row1 = mysqli_fetch_assoc($result1)) {
         $temp = $row1["PID"];
         //echo $temp;  
         //echo "<br>";
      	 $sql = "SELECT * from comment where status = 'unread' and PID = '$temp' ";
       	$result = mysqli_query($conn, $sql);
       	if (mysqli_num_rows($result) > 0) {
          	  while($row = mysqli_fetch_assoc($result)) {
                  #$sql11 = "SELECT Content from post where UID = '$a'";
                  $qw = $row["UID"];
                  $sql3 = "SELECT FName from user where ID = '$qw' ";
                  $result3 = mysqli_query($conn, $sql3);
                  $row3 = mysqli_fetch_assoc($result3);
       			  #$result11 = mysqli_query($conn,$sql1);
                 # $_SESSION[''] = sd
 echo '<a href =view_post.php?postid='.$temp.'&userid='.$a.'>'.'Notification from '.$row3["FName"].'</a>';
          	  		#echo $end_result;
          	  		echo '<br/>';
          	  	#$end_result.='<li href="#">'.'Notification from '.$row["UID"].'</li>';
                   #$end_result.='<li>'.'<a href ="#" >'.'Notification from '.$row["feed_id"].'</a>'.'</li>'; 
                  #echo $row['UID'];
                  #$end_result.=$row['UID'];
                  #$end_result.=echo '<br>';
            	}
       	}
   	}
   	$qw=0;
       $sql11 = "SELECT FromID from friend_request where ToID=$a ";
       $result11 = mysqli_query($conn, $sql11);
       while($row11 = mysqli_fetch_assoc($result11)) {
       	$qw = $qw + 1;
       }
       if($qw>=1){
       echo '<a href="profile-friendrequest.php">You have '.$qw.' new friend requests</a>';
       }
       else{
        echo 'You have 0 new friend requests';
       }
    #   if (mysqli_num_rows($result1) > 0) {
     #       while($row1 = mysqli_fetch_assoc($result1)) {
      #            $who = $row1["FromID"];
       #           $sql2 = "SELECT FName from user where ID=$who ";
        #          $result2 = mysqli_query($conn, $sql2);
         #         $end_result.='<li>'.'Friend request from '.$result2.'</li>';
          #  }
       #}
       #			$sql = "UPDATE comment SET status='read' WHERE PID = '$temp' ";
       #			$result2 = mysqli_query($conn,$sql);
       //echo "$end_result";
   		//echo $end_result;

       $_SESSION['dd']=$end_result;
      # echo $end_result;
       $conn->close();
?>