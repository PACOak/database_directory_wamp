<?php

	$carId = $_REQUEST["id"];

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
	
	$sql = "SELECT car_id, make, model, year, color, vin, price, dealership_id
				FROM car
				WHERE car_id = $carId;";
	$resultSet = $connection->query($sql);
	$carData = $resultSet->fetch_assoc();
	$connection->close();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Employee Dashboard - Update</title>
</head>

<body>
	<h1>Update Auto Record</h1>
	<form action="includes/process-update.php" method="post"/>
		<label for="color">Color</label>
		<input type="text"
			name="color"
			id="color"
			value="<?php echo $carData["color"]; ?>" />
				<br />
			
		<label for="make">Make</label>
		<input type="text"
			name="make"
			id="make"
			required
			value="<?php echo $carData["make"]; ?>" />
				<br />
			
		<label for="model">Model</label>
		<input type="text"
			name="model"
			id="model"
			required
			value="<?php echo $carData["model"]; ?>" />
				<br />
			
		<label for="year">Year</label>
		<input type="number"
			name="year"
			id="year"
			min="<?php echo date("Y") - 20; ?>"
			max="<?php echo date("Y") + 1; ?>"
			required
			value="<?php echo $carData["year"]; ?>" />
				<br />
			
		<label for="vin">Vin</label>
		<input type="text"
			name="vin"
			id="vin"
			required
			value="<?php echo $carData["vin"]; ?>" />
				<br />
			
		<label for="price">Price</label>
		<input type="text"
			name="price"
			id="price"
			value="<?php echo $carData["price"]; ?>" />
				<br />		
			
		<select name="dealership_id" id="dealership_id">
			<?php while ($row = $resultSet->fetch_assoc()): ?>
				<option value="<?php echo $row["dealership_id"]; ?>"><?php echo $row["name"]; ?></option>
			<?php endwhile; ?>
		</select>
		
		<input type="hidden" name="car_id" id="car_id" value="<?php echo $carData["car_id"]; ?>" />
		
		<button type="submit">Update Auto</button>
	</form>
</body>

</html>