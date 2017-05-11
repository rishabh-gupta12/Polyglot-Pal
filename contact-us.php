<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300|Montez" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/style.css" rel="stylesheet">
	<link href="css/hover-min.css" rel="stylesheet">
	<title>Polyglot Pal | Contact Us</title>
</head>
<body>
	
		<div class="container-fluid">
		<div class="row" style="height: 70px; background: #193441;">
			<a href="index.php"><img src="assets/logo(2).png" style="margin: auto; display: block; margin-top:10px; " width="50" height="50"></a>
	</div>
	<form action="" method="POST" class="form-horizontal container" style="color: #193441;">
	<p style="font-size: 20px; margin-top: 10px; margin-bottom: 50px;">
		We are here to answer any questions you may have about your Polyglot Pal experiences. Reach out to us and we'll respond as soon as we can. Suggestions are greatly welcome!
	</p>
		<div class="form-group">
			<label class="control-label">Name: </label>
			<input type="text" name="name" id="name" placeholder="Name" required><br><br>
		</div>
		<div class="form-group">
			<label class="control-label">Email: </label>
			<input type="email" name="email" id="email" placeholder="Email" required><br><br>
		</div>
		<div class="form-group">
			<label class="control-label">Message: </label>
			<textarea rows="5" cols="100" name="message" id="message" placeholder="Type your message here..." required></textarea>
		</div>
		<input type="submit" name="send" value="SEND" class="btn btn-default btn-primary" onclick="thankyou()">
	</form>
	</div>
	<?php
		include 'connect_db.php';
		
		if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['message'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			$sql = "insert into contact_us values ('$name', '$email', '$message')";
			mysqli_query($connection,$sql);
			mysqli_close($connection);
		}

		
	?>
<script>
	function thankyou(){
		alert('Thank you for your response');
	}
</script>
</body>
</html>