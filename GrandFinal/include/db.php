<?php
	define('DB_HOST', 'localhost');
	define('DB_UESR', 'root');\
	define('DB_PASSWORD', '');
	define('DB_NAME', 'TOGU');

	$conn = new mysqli(DB_HOST,DB_UESR,DB_PASSWORD,DB_NAME);
	if ($conn->connect_errno) exit('оишбка прикол');
	$conn->set_charset('utf8');
	
?>
AddDefaultCharset UTF-8