$(document).ready(function() {
	// Onclick signup, hide login and show signup form
	$('#signup').click(function() {
		$('#first').slideUp('slow', function() {
			$('#second').slideDown('slow');
		});
	})

	$('#signin').click(function(){
		$('#second').slideUp("slow", function() {
			$('#first').slideDown('slow');
		});
		
	});
});