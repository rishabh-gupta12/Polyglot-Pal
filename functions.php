<?php
session_start();
function loggedin()
{
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		return true;
	}
	else
		return false;
}

function getuser($id, $field)
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname="polyglotpal";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
	$query=mysqli_query($conn, "select $field from user where ID='$id'");
	$run=mysqli_fetch_array($query);
	return $run[$field];
}
?>