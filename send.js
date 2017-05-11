 	$('#form_input').submit(function(){
	var message = $('#message').val();
	//var sender = $('#sender').val();
	//var receiver = $('#receiver').val();

 	$.ajax({
 		url: 'send.php',
 		data: {message:message},
 		success: function(data){
 			$('#feedback').html(data);
 			$('#message').val('');
 		}
 	});

	return false;
});
