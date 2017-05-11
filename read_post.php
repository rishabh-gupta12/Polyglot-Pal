<?php
    function give_name($UID,$conn){
        $res = mysqli_query($conn, "select * from user where ID = $UID ");
        $row = mysqli_fetch_assoc($res);
        return $row['FName'];
    }

    function give_comment($PID,$conn){
        $res = mysqli_query($conn, "select * from comment where PID = $PID ");
        return $res;
    }
?>
