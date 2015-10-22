<?php

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
	
	$sql = "SELECT * FROM users ORDER BY last_name;";
	$resultSet = $connection->query($sql);
	$connection->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Babyfacebook Search</title>
	</head>
	<body>
		<ul>
			<?php while ($row = $resultSet->fetch_assoc()): ?>
				<li><a href="index.php?userId=<?php echo $row["user_id"]; ?>"><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></a></li>
			<?php endwhile; ?>
		</ul>
	</body>
</html>