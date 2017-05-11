<?php
session_start();
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "polyglotpal";

$myid=$_SESSION['user_id'];
//$myid=1;
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection

if(!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}

//$imagename=$_FILES["uploaded"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['uploaded']['tmp_name']));

//Insert the image name and image content in image_table
$sql="update user set UserImage='$imagetmp' where ID='$myid'";

if(mysqli_query($conn,$sql))
{
	echo "success";
}
else
echo "error";

?>