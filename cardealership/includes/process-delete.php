<?php

//get data passed in from update.php
$carId = $_REQUEST["id"];


//delete data in database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "cardealership";
	
	// Create the database connection
	$connection = new mysqli($servername, $username, $password, $database);
	
	// Check connection
	if ($connection->connect_error)
	{
		die("Database connection failed");
	}
	
	$sql = "DELETE FROM car
			WHERE car_id=$carId;";
	$connection->query($sql);
	
	$connection->close();

//Redirect this page to the newly created profile page
header("Location: http://localhost/cardealership/inventory-internal.php");