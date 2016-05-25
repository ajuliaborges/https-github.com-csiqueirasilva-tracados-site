<?php /* mail script */
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	$msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);
	
	function validate($field) {
		return is_string($field) && strlen($field) > 0;
	}

	$ret = null;
	
	if(validate($nome) && validate($email) && validate($msg)) {
		$ret = "true";
	} else {
		$ret = "false";
	}
	
	echo $ret;
?>