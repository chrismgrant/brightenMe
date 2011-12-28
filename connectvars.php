<!-- CONNECTING VARIABLES TO THE DATABASE connectvars.php -->

<?php
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "brighten_me");
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
			or die("Could not connect to the database.");
?>