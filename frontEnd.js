$(document).ready(function(){
	grecaptcha.ready(function() {
		grecaptcha.execute('your_reCAPTCHA_site_key', {action: 'contact'}).then(function(token) {
			$.ajax({
				url : "backEnd.php",
				method : "POST",
				data : {
					recaptcha_response : token
				},
				success : function(r) {
					if(r) {
						// ...visitors won't be robots
						// ...you can do something you want
					}
				}
			});
		});
	});

});
