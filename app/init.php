<?php

	define('HOST','localhost');
	define('DB_NAME','to do');
	define('USER','root');
	define('PASS','');

	$_SESSION['user_id'] = 1; 

	try{
		$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo $e;
	}

?>