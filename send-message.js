$('#compose').submit(function(){
var to = $('#to').val();
var body = $('#body').val();
//var receiver = $('#receiver').val();

$.ajax({
 	url: 'send-message.php',
 	data: {to:to, body:body},
 	success: function(data){
 		$('#feedback').html(data);
 		$('#body').val('');
 		$('#to').val('');
 	}
 });

	return true;
});
