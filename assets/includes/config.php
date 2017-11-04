<?php
	$site = array(
		"name" => "MCRep",
		"version" => "0.0.1",
		"url" => "http://mcrep.us"
	);

	$mysql = array(
		"host" => "sql2.freemysqlhosting.net",
		"database" => "sql2202422",
		"username" => "sql2202422",
		"password" => "REDACTED"
	);
	$mysqli = new mysqli($mysql['host'], $mysql['username'], $mysql['password'], $mysql['database']);

	session_start();
?>
