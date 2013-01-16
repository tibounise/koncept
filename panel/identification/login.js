$(document).ready(function() {
	$('#loginForm-submit').click(function() {
		$.ajax({
				url : 'identification/login.php',
				type : 'POST',
				data : {
						'username' : $('#loginForm-username').val(),
					    'password' : $('#loginForm-password').val() 
					   },
				dataType : 'json',
				async : false,
				success : function(data) {
					alert(data.message);
				},
				error : function() {
					alert(data.message);
				}
		});
	});
});
