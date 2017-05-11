<!DOCTYPE html>
<?php 
    include 'read_post.php'; 
    include 'connect_db.php';    
    session_start();

    $id = $_GET['user'];
    $myid = $_SESSION['user_id'];

    $sql = "SELECT * from user where ID=$id";

    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);

    #$img = '';

    #$num = rand(2,5);

?>

<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300|Montez" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/profile-view-two.css" rel="stylesheet">

    <title>Welcome</title>
</head>

<body>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 col-md-2 col-lg-2 bar-left">
            
            <a href="profile-main.php"><img src="assets/profile-logo.png" width="140" height="35" style="margin: auto; display: block; margin-top: 10px;"></a>
            
            <img src="pictures/user.png" alt="..." width="100" height="100" class="text-center img-circle profile-img">

             <!-- <img src="data:image/png;base64,<?php #echo base64_encode(stream_get_contents($img); ?>" width="100" height="100" class="text-center img-circle profile-img"> -->

                    <?php
                        if($id != $myid)
                        {
                            $check = "select ID from friends where((UserID1='$myid' and UserID2='$id') or (UserID1 = '$id' and UserID2='$myid'))";
                            $result = mysqli_query($connection, $check);
                            if(mysqli_num_rows($result)==1)
                            {
                                echo "<p class='text-center profile-name'>(Already Pals)</p>";
                                echo "<button class='btn-pal'><a href='actions.php?action=unfrnd&user=$id'>Remove from Pals</a></button>"; 
                            }
                            //$check2 = "select * from friend_request where FromID='$myid' and ToID='$id'";

                            else
                            {
        
                                $from_query="select * from `friend_request` where `FromID`='$id' and `ToID`='$myid'";
                                $to_query="select * from `friend_request` where `FromID`='$myid' and `ToID`='$id'";
                                $result1 = mysqli_query($connection, $from_query);
                                $result2 = mysqli_query($connection, $to_query);
                                if(mysqli_num_rows($result1)==1){
                                    echo "<button class='btn-pal'><a href='actions.php?action=ignore&user=$id'>Ignore</a>|<a href='actions.php?action=accept&user=$id'>Accept</a></button>";
                                }
                                else if(mysqli_num_rows($result2)==1){
                                    echo "<button class='btn-pal'><a href='actions.php?action=cancel&user=$id'>Cancel Request</a></button>"; 
                                }
                                else
                                    echo "<button class='btn-pal'><a href='actions.php?action=send&user=$id'>Add to Pals</a></button>";
                            }
                            // if(mysqli_num_rows($result2)==1){
                            //     echo "<p class='profile-name'></p>";
                            //     echo "<button class='btn-pal'><a href='actions.php?action=cancel&user=$id'>Cancel Request</a></button>";
                            // }
                            // else{
                            //     if(mysqli_num_rows($result)==1)
                            //     {
                                    
                            //     }
                            //     else{
                            //         echo '<button class="btn-pal"><a href="actions.php?action=send&user=$id">Add to Pals</a></button>';
                            //     }
                            // }
                            
                        }
                    ?>      
                  
                    
        </div>

        <div class="col-xs-10 col-md-10 col-lg-10" style="padding: 0px;">
            <div class="custom-nav">
                
                <input type="text" data-placement="bottom" id="search" name="search1" class="search-box" placeholder="Search..." title="Results"/>

                    <ul class="list-inline" style="margin-top: 8px; position: absolute; left: 900px;">
                        
                        <li style="margin-left: 15px;" data-toggle="tooltip" data-placement="bottom" title="settings"><a href="profile-settings.php"><img   src="assets/settings.png" width="25" height="25"></a></li>
                        

                        <li style="margin-left: 15px;">

                         <a href="#" data-placement="bottom" title="notifications" data-poload="notification_list.php" id="id-wala"><img src="assets/ring.png" width="25" height="25" data-toggle="tooltip" data-placement="bottom" title="notifications"></a>

                        </li>

                        <li style="margin-left: 15px;"><a href="profile-logout.php" data-toggle="tooltip" data-placement="bottom" title="logout"><img src="assets/signout.png" width="25" height="25"></a></li>
                    </ul> 
                                        
            </div>
        </div> 
        <!-- Feed Established -->
        <div class="col-xs-10 col-md-10 col-lg-10">
        
            <p class="text-center heading">Profile</p>
            <!-- Profile Details come here-->
            <div class="profile">
            <?php
                    echo "Name: ".$row['FName']." ".$row['LName'];
                    echo "<hr>";
                    echo "<br>Gender: ".$row['Sex'];
                    echo "<hr>";
                    echo "<br>Language Spoken: ".$row['Language1'];
                    echo "<hr>";
                    echo "<br>Interest of Language: ".$row['Language2'];
                    echo "<hr>";
            ?>
            </div>
            <!-- End of Profile Details here -->

        </div>
        <!-- End of Right Section here -->
        
    </div>
    <!-- End of Grid System here -->
    
</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
     $('#search').focusout(function() {
        var e = $(this);
           e.popover({
            }).popover('hide');
    });
    $('#id-wala').click(function() {
            console.log('Hey');
        var e=$(this);
        $.ajax({
                type: "POST",
                url: "notification_list.php",
               success: function(data, status, jqXHR){
                   console.log('html->'+data);
                    e.popover({
                    html: true,
                    content: data,
                    }).popover('show');   
                    var popover = e.attr('data-content',data).data('bs.popover');
                    popover.setContent();
        
              },
               error: function() {
                    alert('Error occured');
                }
            });
    });
    $("#search").keyup(function(){
        var data = $("#search").val();
          var e=$(this);
            $.ajax({
                type: "POST",
                url: "do_search.php",
                data: {search:data},
               success: function(data, status, jqXHR){
                   console.log('html->'+data);
                    e.popover({
                    html: true,
                    content: data,
                    }).popover('show');   
                    var popover = e.attr('data-content',data).data('bs.popover');
                    popover.setContent();
        
              },
               error: function() {
                    alert('Error occured');
                }
            });    
    });
     $(document).ready(function(){
        $('#id-wala').click(function() {
            console.log('Hey');
            var e=$(this);
            $.get(e.data('poload'),function(d) {
                console.log(d);
               e.popover({
                html: true,
                content: d
                }).popover('show');
            });
        });

        $('[data-toggle="tooltip"]').tooltip();
        
        $("[data-toggle=popover]").popover({ html: true });

        
        $('.comments').hide();

        $('.viewcomments').click(function(){
            $('.comments').toggle(200);
        });  

    });
</script>
</body>
</html>