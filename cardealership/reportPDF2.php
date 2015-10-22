<?php

	



define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

//Connect to your database
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

	$sql = 'SELECT year, make, model, color
			FROM car ORDER BY year;';
	$resultSet = $connection->query($sql);
	$connection->close();
	
//Create new pdf file
$pdf=new FPDF();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles for the actual page
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30, 6, 'YEAR', 1, 0, 'L', 1);
$pdf->Cell(100, 6, 'MAKE', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'MODEL', 1, 0, 'R', 1);
$pdf->Cell(100, 6, 'COLOR', 1, 0, 'R', 1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result = mysql_query('SELECT year, make, model, color FROM car ORDER BY year;', $);

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($resultSet))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(25);
        $pdf->Cell(30, 6, 'year', 1, 0, 'L', 1);
        $pdf->Cell(100, 6, 'make', 1, 0, 'L', 1);
        $pdf->Cell(30, 6, 'model', 1, 0, 'R', 1);
		$pdf->Cell(100, 6, 'color', 1, 0, 'R', 1);

        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $year = $row['year'];
    $make = $row['make'];
    $model = $row['model'];
	$color = $row['color'];

    $pdf->SetY($y_axis);
    $pdf->SetX(25);
    $pdf->Cell(30, 6, $year, 1, 0, 'L', 1);
    $pdf->Cell(100, 6, $make, 1, 0, 'L', 1);
    $pdf->Cell(30, 6, $model, 1, 0, 'R', 1);
    $pdf->Cell(100, 6, 'color', 1, 0, 'R', 1);

	
    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

mysql_close($resultSet);

//Create file
$pdf->Output();
?>