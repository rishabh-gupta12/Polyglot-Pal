<?php include 'functions.php'; ?>

<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "polyglotpal";

$email=$_POST['email'];

$opass=$_POST['oldpass'];
$pass=$_POST['newpass'];

$lang2=$_POST['language'];

$myid=$_SESSION['user_id'];
//$myid=1;
$conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection

if(!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
if(strlen($opass)!=0)
{
	$sql="select Password from user where ID='$myid'";
	$result=mysqli_query($conn,$sql);
	if($opass!=$result)
	{
		echo "<script>
alert('Incorrect Old Password');
window.location.href='general.php';
</script>";
	}
}
if(strlen($email) != 0)
{
	$sql = "UPDATE user SET EMail='$email' WHERE ID='$myid' ";
	if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}

if(strlen($pass) != 0)
{
	$sql1 = "UPDATE user SET Password='$pass' WHERE ID='$myid' ";
	if (mysqli_query($conn, $sql1)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
if(isset($_POST['language']) && $_POST['language'] != '')
{
	$sql2 = "UPDATE user SET Language2='$lang2' WHERE ID='$myid' ";
if (mysqli_query($conn, $sql2)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}


$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['img']['tmp_name'];
    $img = file_get_contents($image);
    //$sql = "insert into user (image) values(?) where id='$myid'";
	$sql = "UPDATE user SET UserImage='?' WHERE ID='$myid' ";
 
    $stmt = mysqli_prepare($conn,$sql);
 
    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);
 
    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Successfullly Uploaded';
    }else{
        $msg = 'Could not upload';
    }
}
/*$sql="select * from user where id='$myid'";
$result=mysqli_query($conn,$sql);
$get= mysqli_fetch_array($result,MYSQLI_NUM);
echo '<img height="300" width="300" src="data:image,'.$get[9].' ">';*/
header("location: profile-settings.php");
mysqli_close($conn);

?>