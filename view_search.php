<?php
	session_start();
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="polyglotpal";
    $conn = mysqli_connect($servername, $username, $password,$dbname);
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	//$user = $_GET['df'];
	$user=$_GET['userid'];
	$sql = "SELECT * FROM user WHERE ID='$user'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {
	// echo $row['FName'].'<br>';
	// echo $row['LName'].'<br>';
	// echo $row['EMail'].'<br>';

	header("location:./profile-view-two.php?user=$user");
	}
?>