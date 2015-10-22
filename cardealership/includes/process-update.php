<?php

//add data to database
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
	
	$sql = "UPDATE car
				SET color = '$_REQUEST[color]',
					make = '$_REQUEST[make]',
					model = '$_REQUEST[model]',
					year = $_REQUEST[year],
					vin = '$_REQUEST[vin]',
					price = $_REQUEST[price]
				WHERE car_id = $_REQUEST[car_id];";
				
	$connection->query($sql);
	
	$connection->close();

//Redirect this page to the newly created profile page
header("Location: http://localhost/cardealership/inventory-internal.php");