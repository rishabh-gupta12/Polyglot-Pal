<?php
	
	$db_host='localhost';
	$db_user='root';
	$db_pass='';

	$db_name='polyglotpal' ;

	$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

	if($connection){

//		echo 'Connected to database server.......<br />';

	}
	else{

//		echo 'Unable to connect to ';
	}


?>