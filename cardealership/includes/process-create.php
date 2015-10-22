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
	
	$sql = "INSERT INTO car(color,make,model,year,vin,price,dealership_id)
				VALUES('$_REQUEST[color]','$_REQUEST[make]','$_REQUEST[model]',$_REQUEST[year],'$_REQUEST[vin]',$_REQUEST[price],$_REQUEST[dealership_id]);";
	
	$connection->query($sql);
	
	$connection->close();

//Redirect this page to the newly created profile page
header("Location: http://localhost/cardealership/inventory-internal.php");