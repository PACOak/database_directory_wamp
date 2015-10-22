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
	//if ()if sorted
	$sql = "SELECT year, make, model, color, price
				FROM car
				ORDER BY year DESC, make, model, color, price;";
	$resultSet = $connection->query($sql);
	$connection->close();
?>
<!DOCTYPE html>
<html>

<head>
	<title>PDFReport</title>
	<h1>Report</h1>
</head>

<body>
	<?php echo $resultSet->num_rows; ?> cars are in the result set.
	<?php //print_r($resultSet->fetch_all()); ?>
	
	<?php if ($resultSet->num_rows != 0): ?>
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead><a href='reportPDF.php' target='_blank' class='report'>[REPORT]</a>
				<tr>					
					<th>Year</th>
					<th>Make</th>
					<th>Model</th>
					<th>Color</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $resultSet->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row["year"]; ?></td>
						<td><?php echo $row["make"]; ?></td>
						<td><?php echo $row["model"]; ?></td>
						<td><?php echo $row["color"]; ?></td>
						<td><?php echo $row["price"]; ?></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Year</th>
					<th>Make</th>
					<th>Model</th>
					<th>Color</th>
					<th>Price</th>
				</tr>
			</tfoot>
		</table>
	<?php endif; ?>

</body>

</html>