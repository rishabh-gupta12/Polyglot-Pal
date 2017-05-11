<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300|Montez" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">

<title>Polyglot Pal | Login</title>
</head>
<body>
<?php $sel=$_GET['sel']; ?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '133791803770243',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<a href="index.php" style="text-decoration: none;"><h3 class="text-center extra-margin-top extra-margin-bottom heading-4"><img src="assets/logo.png" width="50" height="50"> Polyglot Pal</h3></a>
	
	<ul class="nav nav-tabs custom-nav">
		    <li><a href="#login">login</a></li>
		    <li class="active"><a href="#signup">sign up</a></li>
	  	</ul>

	<div class="container custom-container">
		<div class="tab-content extra-padding-left extra-padding-right">
			    <div id="login" class="tab-pane fade">
			    
			      <form action="action-login.php" method = "POST">	
						<div class="form-group">
							<input type="text" class="form-control extra-margin-top-25" name="email" id="email" placeholder="Login ID (email)" required>
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						
						<div class="row extra-margin-top-25 text-center">
							<div class="col-xs-6">
								<div class="checkbox">
									<label><input type="checkbox"> <span class="small">Remember me</span></label>
		  						</div>
							</div>
							<div class="col-xs-6"><input type="submit" class="btn btn-default btn-new-2 extra-margin-bottom-25" name="submit" value="Login"></div>
						</div>
					</form>
			    
			    </div>
			    <div id="signup" class="tab-pane fade in active">
				    <form action="action-signup.php" method="POST">
						<div class="form-group extra-margin-top-25"><input class="form-control" type = "text" name = "firstname" placeholder = "First Name" required></div>

						<div class="form-group"><input class="form-control" type = "text" name = "lastname" placeholder = "Last Name" required></div>

						<div class="form-group"><input class="form-control" type = "email" name = "email" placeholder = "email@example.com" required></div>

						<div class="form-group"><input class="form-control" type = "date" name = "dateofbirth" placeholder = "Date of Birth" required></div>

						<div class="form-group"><input class="form-control" type = "password" name = "password" placeholder = "Password" required></div>

						<div class="form-group text-center">
							<label class="radio-inline"><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male">Male </label>
							<label class="radio-inline"><input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female"> Female</label>	
						</div>  	

						<div class="form-group">
							<select class="form-control" name="languagespoken" required>
								    <option value="" disabled selected>Language I speak...</option>
							        <option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="German">German</option>
									<option value="English">English</option>
					       	</select>
				       	</div>

				       	<div class="form-group">
							<select class="form-control" name="languagechoice">
									<option value="" disabled required>Language I want to learn...</option>
									<option value="French" <?php if($sel==='french') echo 'selected' ?> > French </option>
									<option value="Spanish" <?php if($sel==='spanish') echo 'selected' ?> > Spanish </option>
									<option value="German" <?php if($sel==='german') echo 'selected' ?> > German </option>
									<option value="English" <?php if($sel==='english') echo 'selected' ?> > English </option>
							</select>
						</div>			
						<div class="row text-center">
							<input class="btn btn-default btn-new-2 extra-margin-top-25 extra-margin-bottom-25" type="submit" name="submit" value="Sign Up">
						</div>
						</div>
					</form>
			    </div>
		</div>
	</div>

<div class="fb-like pull-right" style="margin-top: 250px;" data-href="http://polyglotpal.ueuo.com/" data-width="300px" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true">	
</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
    	$(".nav-tabs a").click(function(){
        	$(this).tab('show');
    	});
	});
</script>
</body>
</html>