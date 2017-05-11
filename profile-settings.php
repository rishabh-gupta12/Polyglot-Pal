<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300|Montez" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/hover-min.css" rel="stylesheet">

    <?php #$img = '';

    #$num = rand(2,5);
    ?>

    <title>Welcome</title>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 col-md-2 col-lg-2 bar-left">
            
            <a href="profile-main.php"><img src="assets/profile-logo.png" width="140" height="35" style="margin: auto; display: block; margin-top: 10px;"></a>
            
            <img src="pictures/user.png" alt="..." width="100" height="100" class="text-center img-circle profile-img">

             <!-- <img src="data:image/png;base64,<?php #echo base64_encode(stream_get_contents($img); ?>" width="100" height="100" class="text-center img-circle profile-img"> -->

                  <p class="text-center profile-name">Hi, Rohan!</p>
                    <ul class="row list-unstyled" style="margin-left: 5px;">
                        <li id="a" class="custom-link"><img src="assets/account.png" width="30" height="30" style="margin-right: 5px;"><span class="hvr-underline-from-left">account</span></li>
                        <li id="b" class="custom-link"><img src="assets/privacy.png" width="30" height="30" style="margin-right: 5px;"><span class="hvr-underline-from-left">privacy</span></li>
                        <li id="c" class="custom-link"><img src="assets/deleteaccount.png" width="30" height="30" style="margin-right: 5px;"><span class="hvr-underline-from-left">delete account</span></li>
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
                                <select class="form-control pull-right">
                                    <?php
                                    echo "<option>$lang1</option>";
                                    echo "<option>$lang2</option>";
                                    ?>
                                </select>  
                            </div>
                            <div class="form-group" style="width: 97%; margin: auto; display: block; color: #193441;">
                                <label class="control-label">Content: </label>    
                                <input type="text" name="post" class="form-control" >
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

        <div class="col-sm-10 col-md-10 col-lg-10" style="padding: 0px;">
            <div class="custom-nav">

                <input type="text" data-placement="bottom" id="search" name="search1" class="search-box" placeholder="Search..." title="Results"/>

                    <ul class="list-inline" style="margin-top: 8px; position: absolute; left: 900px;">
                        
                        <li style="margin-left: 15px;" data-toggle="tooltip" data-placement="bottom" title="settings"><a href="profile-settings.php"><img src="assets/settings.png" width="25" height="25"></a></li>
                        
                        <li style="margin-left: 15px;">

                         <a href="#" data-placement="bottom" title="notifications" data-poload="notification_list.php" id="id-wala"><img src="assets/ring.png" width="25" height="25" data-toggle="tooltip" data-placement="bottom" title="notifications"></a>

                        </li>

                        <li style="margin-left: 15px;"><a href="profile-logout.php" data-toggle="tooltip" data-placement="bottom" title="logout"><img src="assets/signout.png" width="25" height="25"></a></li>
                    </ul>                   
            </div>
        </div>


        <div class="col-sm-10 col-md-10 col-lg-10" style="padding: 0px;">
            <p class="heading text-center">Settings</p>
            <!-- Settings Established -->
            
            <div id = "one">
                <form method="post" onsubmit="return general();" action="change.php" enctype="multipart/form-data">
                    
                    <!-- <div class="form-group">
                        <label class="control-label">Change Email ID</label>
                        <input type="email" id="email" name="email" class="form-control text-box">
                    </div> -->
                    
                    <div class="form-group">
                        <label class="control-label">Change Password</label>
                        <input class="form-control text-box" type="password" id="oldpass" name="oldpass" placeholder="Old Password">
                        <input class="form-control text-box" type="password" id="newpass" name="newpass" placeholder="New Password" style="margin-top: 2px;">
                        <input class="form-control text-box" type="password" id="cnewpass" name="cnewpass" placeholder="Confirm New Password" style="margin-top: 2px;">
                    </div>
                        
                    <div class="form-group">
                        <label class="control-label">Change Language</label>
                        <select name="language" class="form-control text-box">
                            <option value="">--Select Language--</option>
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                            <option value="Spanish">Spanish</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input id="img" name="img" type="file"><br>
                        <input type="submit" value="Apply Changes" name="save" class="btn btn-default">                        
                    </div>

                </form>
            </div>

            <div id = "two">
                <form method="post">
                    <div class="form-group">
                        <label class="control-label">Who can post on my timeline?</label>
                        <select name="post">
                            <option value="public">Public</option>
                            <option value="friends">Friends</option>
                            <option value="me">Only Me</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Who can send me private messages?</label>
                        <select name="post">
                            <option value="public">Public</option>
                            <option value="friends">Friends</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Who can comment on my posts?</label>
                        <select name="post">
                            <option value="public">Public</option>
                            <option value="friends">Friends</option>
                            <option value="me">Only Me</option>
                        </select>
                    </div>

                  <input type="submit" value="Save" name="save" class="btn btn-default">
                </form>     
            </div>

            <div id = "three">
                
                <form method="post" action="delacc.php">
                    <div class="form-group">
                        <label class="control-label">Delete Account?</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Polyglot Pal. Some information may still be visible to others, such as your name in their friends list and messages you sent.</label>
                        <input class="btn btn-default" type="submit" value="Delete Account" name="delacc" onclick="return confirm('Are you sure you want to delete your account?');">
                    </div>
            </div>
            <!-- End of Settings here -->

        </div>
        <!-- End of Right Section here -->
        
    </div>
    <!-- End of Grid System here -->

</div>  

<script src="js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/form-validation.js"></script>
<script src="js/form-toggle.js"></script>    
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
<script>    
function general(){

    var x1,x2;
    x1=document.getElementById("newpass").value;
    x2=document.getElementById("cnewpass").value;
    if(x1.length<8 && x1.length>0)
    {
      alert("Password must contain at least 8 characters");
      return false; 
    }
    if(x1!=x2)
    {
      alert("Passwords do not match!");
      return false; 
    }
    else{
        //alert("Your changes have been saved");
        return true;
    }
    }

</script>
</body>
</html>