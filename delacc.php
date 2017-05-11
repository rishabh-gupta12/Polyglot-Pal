<html>
<head>
</head>
<body>

<?php include 'functions.php'; ?>

<?php
if(isset($_POST['delacc']))
{
	$servername = "localhost";

$username = "root";

$password = "";

$dbname = "polyglotpal";

$myid=$_SESSION['user_id'];
//$myid=2;

$conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection

if(!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}

$sql="delete from user where ID='$myid'";
mysqli_query($conn,$sql);
echo "<script>
alert('Your account has been deleted...');
header('location: profile-login.html');
</script>";
}
?>
<div class="settings_view">
<div id="left_bar">
			<ul>
				<li><a href="general.php">General</a></li>
				<li><a href="privacy.php">Privacy</a></li>
				<li><a href="delacc.php">Delete Account</a></li>
			</ul>
</div>
<div id="right_bar">
		<p name="caption">Delete Account???</p>
		<form method="post" action="">
		<br><br><br><br>
		Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Polyglot Pal. Some information may still be visible to others, such as your name in their friends list and messages you sent. 
		<br>
		<input type="submit" value="Delete Account" name="delacc" onclick="return confirm('Are you sure you want to delete your account?');" />
		</div>
</div>
</body>
</html>