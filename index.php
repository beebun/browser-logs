<?php	
	require 'vendor/autoload.php';
	$result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
	print_r($result);
?>
