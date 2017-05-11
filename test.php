<?php
require('connect_db.php');
session_start();

$temp=$_GET['translate'];
$myusername=$_SESSION['user1'];
$sql = "UPDATE user SET Translate_Message='$temp' WHERE EMail='$myusername'";
mysqli_query($connection,$sql);
header('location:main_v4.php');
?>
