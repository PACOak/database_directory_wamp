<?php
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
	
	$sql = "SELECT dealership_id, name
				FROM dealership
				ORDER BY name;";
	$resultSet = $connection->query($sql);
	$connection->close();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Employee Dashboard - Create</title>
</head>

<body>
	<h1>Create Auto Record</h1>
	<form action="includes/process-create.php" method="post"/>
		<label for="color">Color</label><input type="text" name="color" id="color" /><br />
		<label for="make">Make</label><input type="text" name="make" id="make" required /><br />
		<label for="model">Model</label><input type="text" name="model" id="model" required /><br />
		<label for="year">Year</label><input type="number" name="year" id="year" min="<?php echo date("Y") - 20; ?>" max="<?php echo date("Y") + 1; ?>" required /><br />
		<label for="vin">Vin</label><input type="text" name="vin" id="vin" required /><br />
		<label for="price">Price</label><input type="text" name="price" id="price" /><br />		
		<select name="dealership_id" id="dealership_id">
			<?php while ($row = $resultSet->fetch_assoc()): ?>
				<option value="<?php echo $row["dealership_id"]; ?>"><?php echo $row["name"]; ?></option>
			<?php endwhile; ?>
		</select>
		
		
		
		<button type="submit">Add Auto</button>
	</form>
</body>

</html>