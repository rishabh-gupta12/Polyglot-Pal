<?php
session_start();
if (isset($_POST['search'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="polyglotpal";
    $conn = mysqli_connect($servername, $username, $password,$dbname);
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $word = $_POST['search'];
    //echo $word;
    //$word=htmlentities($word)
    $sql = "SELECT * FROM user WHERE FName LIKE '%$word%' ";
    //echo $sql;
    // get results
    //$sql = 'SELECT * FROM Profiles';
     $end_result = '';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         #$end_result.='<li>'.$row["FName"].'</li>';
        #$_SESSION['fnamer'] = $row['Fname'];
         #$end_result.='<li>'.'<a href =view_search.php>'.$row["Fname"].'</a>'.'</li>';
        echo '<a href =view_search.php?userid='.$row["ID"].'>'.$row["FName"].'</a>';
        echo '<br>';
    }
        #echo $end_result;
} else{
        echo '<a href =profile-english.php'.'>'.'Language(English)'.'</a>'.'<br>';
        echo '<a href =profile-french.php'.'>'.'Language(French)'.'</a>'.'<br>';
        echo '<a href =profile-german.php'.'>'.'Language(German)'.'</a>'.'<br>';
        echo '<a href =profile-spanish.php'.'>'.'Language(Spanish)'.'</a>'.'<br>';
        #echo 'No results found';
}
#mysqli_close($conn);
}
?>