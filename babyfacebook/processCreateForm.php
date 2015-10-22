<?php

//Get data passed in from create.php form
$firstName = $_REQUEST["first_name"];
$lastName = $_REQUEST["last_name"];
$description = $_REQUEST["description"];
$email = $_REQUEST["email"];
$backgroundImage = $_REQUEST["background_image"];

if (isset($_REQUEST["background_image_tiling"]))
{
	$backgroundImageTiling = 1;
}
else
{
	$backgroundImageTiling = 0;
}

//Insert data into database
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
	
	$sql = "INSERT INTO users(first_name, last_name, description, email, background_image, background_image_tiling) 
			VALUES('$firstName','$lastName','$description','$email','$backgroundImage',$backgroundImageTiling);";
	$connection->query($sql);
	
	$sql2 = "SELECT MAX(user_id) FROM users;";
	$resultSet = $connection->query($sql2);
	$row = $resultSet->fetch_array();
	$userId = $row[0];
	
	$connection->close();

//Redirect this page to the newly created profile page

//header("Location: http://localhost/babyfacebook/index.php?userId=$userId");