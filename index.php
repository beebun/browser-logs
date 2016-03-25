<?php	
	require 'vendor/autoload.php';
	$result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
	echo "<pre>";
	print_r($result);
	echo "</pre>";
?>
