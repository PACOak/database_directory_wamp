<?php

//get data passed in from update.php
$userId = $_REQUEST["user_id"];


//delete data in database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "baby_facebook";
	
	// Create the database connection
	$connection = new mysqli($servername, $username, $password, $database);
	
	// Check connection
	if ($connection->connect_error)
	{
		die("Database connection failed");
	}
	
	$sql = "DELETE FROM users
			WHERE user_id=$userId;";
	$connection->query($sql);
	
	$connection->close();

//Redirect this page to the newly created profile page
header("Location: http://localhost/babyfacebook/search.php");