<!DOCTYPE html>
<html>

<head>
	<title>Magic Database Connection</title>
</head>

<body>

	Hello <?php echo $_REQUEST["myname"]; ?>!
	You appear to be connecting from: <?php echo $_SERVER["REMOTE_ADDR"]; ?>
	
	<?php var_dump($_SERVER); ?>
	<?php var_dump($_COOKIE); ?>
	<?php var_dump($_FILES); ?>
	<?php var_dump($_REQUEST); ?>
	<?php var_dump($_ENV); ?>
	
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "first_database";
		
		// Create the database connection
		$connection = new mysqli($servername, $username, $password, $database);
		
		// Check connection
		if ($connection->connect_error)
		{
			die("Database connection failed");
		}
		
		echo "Database connection success!!!";
		
		$sql = "SELECT * FROM students;";
		$resultSet = $connection->query($sql);
		
		echo "Num Rows: " . $resultSet->num_rows . "<br/>";
		
		while ($row = $resultSet->fetch_assoc())
		{
			echo $row["student_id"] . " " . $row["first_name"] . " " . $row["last_name"] . "</br>";
		}
		
		var_dump($resultSet);
		
		$connection->close();
	?>
	
	
</body>

</html>