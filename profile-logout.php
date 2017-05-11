<?php

// include 'functions.php';
session_start();
include 'connect_db.php';

$uid = $_SESSION['user_id'];

mysqli_query($connection, "UPDATE user SET Online = '0' where ID = $uid");

session_destroy();
header('location: profile-login.php');

?>