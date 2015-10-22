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
	
	$sql = "SELECT car_id, make, model, year, color, vin, price, name
				FROM car JOIN dealership
				ON car.dealership_id = dealership.dealership_id;";
	$resultSet = $connection->query($sql);
	$connection->close();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Employee Dashboard</title>
</head>

<body>
	<h1>Checking ResultSet Code</h1>
	<a href="inventory-internal-create.php">Add Car</a>
	<?php echo $resultSet->num_rows; ?> cars are in the result set.
	<?php //print_r($resultSet->fetch_all()); ?>
	
	<?php if ($resultSet->num_rows != 0): ?>
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Make</th>
					<th>Model</th>
					<th>Year</th>
					<th>Color</th>
					<th>VIN</th>
					<th>Price</th>
					<th>Dealership</th>					
					<th>Control</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $resultSet->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row["car_id"]; ?></td>
						<td><?php echo $row["make"]; ?></td>
						<td><?php echo $row["model"]; ?></td>
						<td><?php echo $row["year"]; ?></td>
						<td><?php echo $row["color"]; ?></td>
						<td><?php echo $row["vin"]; ?></td>
						<td><?php echo $row["price"]; ?></td>
						<td><?php echo $row["name"]; ?></td>
						<td><a href="inventory-internal-update.php?id=<?php echo $row["car_id"]; ?>">Update</a> <a href="includes/process-delete.php?id=<?php echo $row["car_id"]; ?>">Delete</a></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Make</th>
					<th>Model</th>
					<th>Year</th>
					<th>Color</th>
					<th>VIN</th>
					<th>Price</th>
					<th>Dealership</th>
					<th>Control</th>
				</tr>
			</tfoot>
		</table>
	<?php endif; ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#example").DataTable();
		});
	</script>
	
	
</body>

</html>