<?php /* mail script */
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	$msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);
	
	function validate($field) {
		return is_string($field) && strlen($field) > 0;
	}

	$destination = "tracadosdesign@gmail.com";
	$subject = "CONTATO SITE TRAÇADOS";
	$headers = "";
	
	$headers = "From: " . strip_tags($email) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";

	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$mailMessage = "<html><body>";
	$mailMessage .= "MENSAGEM ENVIADA DE: " . $nome . " (" . $email . ")";
	$mailMessage .= "<br />";
	$mailMessage .= "<br />";
	$mailMessage .= "CONTEÚDO DA MENSAGEM: ";
	$mailMessage .= "<br />";
	$mailMessage .= "<br />";
	$mailMessage .= $msg;
	$mailMessage .= "<br />";
	$mailMessage .= "<br />";
	$mailMessage .= "</body></html>";
	
	$ret = "false";
	
	if(validate($nome) && validate($email) && validate($msg)) {
	
		$mailReturn = mail($destination, $subject, $mailMessage, $headers);
	
		if($mailReturn) {
			$ret = "true";
		}
		
	}
	
	echo $ret;
?>