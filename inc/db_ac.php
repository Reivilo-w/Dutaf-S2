<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASS', '');

	$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
?>
