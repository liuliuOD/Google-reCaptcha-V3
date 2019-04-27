<?php
public function recaptchaV3(){
	$recaptcha_response = $_POST["recaptcha_response"];
	$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_secret = "key_between_your_site_and_reCAPTCHA";
	
	$data = array(
		'secret' => $recaptcha_secret, 
		'response' => $recaptcha_response
	);
	$ch = curl_init($recaptcha_url);
	curl_setopt_array($ch, array(
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_RETURNTRANSFER => true
	));
	$responseKeys = json_decode(curl_exec($ch), true);
	
	if($responseKeys["success"]) {
		echo true;
	} else {
		echo false;
	}
}
recaptchaV3();

?>

