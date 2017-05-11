<?php
include 'connect_db.php';
// include 'functions.php';
session_start();

$action=$_GET['action'];
$user=$_GET['user'];
$myid=$_SESSION['user_id'];
echo $action;
echo $user;
echo $myid;
if($action=='send')
{
	$sql="insert into friend_request values('$myid', '$user')";
	mysqli_query($connection,$sql);
}
if($action=='cancel')
{
	$sql="delete from `friend_request` where `FromID`='$myid' and `ToID`='$user'";
	mysqli_query($connection,$sql);
}
if($action=='ignore')
{
	$sql="delete from `friend_request` where `FromID`='$user' and `ToID`='$myid'";
	mysqli_query($connection,$sql);
}
if($action=='accept')
{
	$sql="delete from `friend_request` where `FromID`='$user' and `ToID`='$myid'";
	mysqli_query($connection,$sql);
	$sql1="insert into friends values('', '$user', '$myid')";
	mysqli_query($connection,$sql1);
}
if($action=='unfrnd')
{
	$sql="delete from friends where(UserID1='$myid' and UserID2='$user') or (UserID1='$user' and UserID2='$myid')";
		
	mysqli_query($connection,$sql);
	
}
header('location: profile-main.php?user='.$user);
?>