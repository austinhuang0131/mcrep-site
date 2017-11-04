<?php
	$site = array(
		"name" => "MCRep",
		"version" => "0.0.1",
		"url" => "http://j3e90r-user.freehosting.host"
	);

	$mysql = array(
		"host" => "sql2.freemysqlhosting.net",
		"database" => "sql2202422",
		"username" => "sql2202422",
		"password" => "sF7*jM8!"
	);
	$mysqli = new mysqli($mysql['host'], $mysql['username'], $mysql['password'], $mysql['database']);

	session_start();
?>
