<?php

//
$userId = $_REQUEST["user_id"];
$firstName = $_REQUEST["first_name"];
$lastName = $_REQUEST["last_name"];
$description = $_REQUEST["description"];
$email = $_REQUEST["email"];
$facebookLink = $_REQUEST["facebook_link"];
$twitterLink = $_REQUEST["twitter_link"];
$instagramLink = $_REQUEST["instagram_link"];
$linkedInLink = $_REQUEST["linkedin_link"];
$pinterestLink = $_REQUEST["pinterest_link"];
$backgroundImage = $_REQUEST["background_image"];
//$backgroundImageTiling = $_REQUEST["background_image_tiling"];

if (isset($_REQUEST["background_image_tiling"]))
{
	$backgroundImageTiling = 1;
}
else
{
	$backgroundImageTiling = 0;
}

//Update data in database
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
	
	$sql = "UPDATE users SET first_name='$firstName',
							last_name='$lastName',
							description='$description',
							email='$email',
							facebook_link='$facebookLink',
							twitter_link='$twitterLink',
							instagram_link='$instagramLink',
							linkedin_link='$linkedInLink',
							pinterest_link='$pinterestLink',
							background_image='$backgroundImage',
							background_image_tiling=$backgroundImageTiling
			WHERE user_id=$userId;";
	$connection->query($sql);
	
	$connection->close();

//Redirect this page to the newly created profile page
header("Location: http://localhost/babyfacebook/index.php?userId=$userId");