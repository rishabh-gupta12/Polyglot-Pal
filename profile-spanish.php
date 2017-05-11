<!DOCTYPE html>
<?php 
    include 'read_post.php'; 
    include 'connect_db.php';    
    session_start();
     $id = $_SESSION['user_id'];
    $res = mysqli_query($connection,"SELECT * from user where ID = $id ");
    $row = mysqli_fetch_assoc($res);
    $lang1 = $row['Language1'];
    $lang2 = $row['Language2'];

?>

<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300|Montez" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/profile-post.css" rel="stylesheet">
    <link href="css/profile-view-two.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/hover-min.css" rel="stylesheet">

    <title>Welcome</title>
</head>

<body>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 col-md-2 col-lg-2 bar-left">
            
            <a href="profile-main.php"><img src="assets/profile-logo.png" width="140" height="35" style="margin: auto; display: block; margin-top: 10px;"></a>
            
            <img src="pictures/user.png" width="100" height="100" class="text-center img-circle profile-img">
            
             <p class="text-center profile-name"><?php echo "Hi, ".$row['FName']."!";?></p>

                    <ul class="row list-unstyled">
                        <li class="custom-link"><a class="custom-link" href="profile-messages.php"><img src="assets/messages.png" width="30" height="26" style="margin-right: 5px;"><span class="hvr-underline-from-left">messages</span></a></li>
                        
                        <li class="custom-link"><a class="custom-link" href="online_v2.php"><img src="assets/chats.png" width="30" height="30" style="margin-right: 5px;"><span class="hvr-underline-from-left">chats</span></a></li>
                        
                        <li class="custom-link"><a class="custom-link" href="profile-pallist.php"><img src="assets/list.png" width="30" height="30" style="margin-right: 5px;"><span class="hvr-underline-from-left">pal lists</span></a></li>
                        
                        <li class="custom-link"><a class="custom-link" href="#" data-toggle="modal" data-target="#myModal"><img src="assets/makepost.png" width="30" height="28" style="margin-right: 5px;"><span class="hvr-underline-from-left">make a post</span></a></li>
                    </ul>     
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="color: #193441">Write your post, below.</h4>
                    </div>
                    
                    <form class="form-horizontal" method="POST" action="save_post.php">
                        <div class="modal-body">
                            <div class="form-group" style="width: 97%; margin: auto; display: block; color: #193441;">
                                <label class="control-label">Choose Langage: </label>    
                                <select class="form-control pull-right" name="language">
                                    <?php
                                    echo "<option value='$lang1'>$lang1</option>";
                                    echo "<option value='$lang2'>$lang2</option>";
                                    ?>
                                </select>  
                            </div>
                            <div class="form-group" style="width: 97%; margin: auto; display: block; color: #193441;">
                                <label class="control-label">Content: </label>    
                                <input type="text" name="post" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                            <input type="submit" class="btn btn-primary" value="Post">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    

        <div class="col-xs-10 col-md-10 col-lg-10" style="padding: 0px;">
            <div class="custom-nav">
                
                <input type="text" data-placement="bottom" id="search" name="search1" class="search-box" placeholder="Search..." title="Results"/>

                    <ul class="list-inline" style="margin-top: 8px; position: absolute; left: 900px;">
                        
                        <li style="margin-left: 15px;" data-toggle="tooltip" data-placement="bottom" title="settings"><a href="profile-settings.php"><img src="assets/settings.png" width="25" height="25"></a></li>
                        

                        <li style="margin-left: 15px;"><a href="#" data-toggle="popover" data-placement="bottom" title="notifications" data-content="hey there" id=""><img src="assets/ring.png" width="25" height="25" data-toggle="tooltip" data-placement="bottom" title="notifications"></a></li>

                        <li style="margin-left: 15px;"><a href="profile-logout.php" data-toggle="tooltip" data-placement="bottom" title="logout"><img src="assets/signout.png" width="25" height="25"></a></li>
                    </ul> 
                                        
            </div>
        </div> 
        <!-- Feed Established -->
        <div class="col-xs-10 col-md-10 col-lg-10">
        
            <p class="text-center heading">English Speaking Users</p>
            <!-- Profile Details come here-->
            <div class="pal-box text-center">
                <?php
                    $res = mysqli_query($connection,"SELECT * FROM user where Language1='English' ");
                    $i=0;
                    if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $i++; 
                        if($id != $row['ID']){
                            $name = give_name($row['ID'],$connection);
                            
                            echo "<a class='link' href='profile-view-two.php?user=".$row['ID']."'>".$i.") ".$name."</a>";
                        }
                    }
                }
                else{
                    echo "Nothing in here";
                }

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

        $('#comments').hide();
        $('#viewcomments').click(function(){
            $('#comments').toggle(200);
        });  
    });
</script>
</body>
</html>