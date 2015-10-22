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
	$sqlAVG = "SELECT AVG(price) AS Average
				FROM car;";
	$sqlMIN = "SELECT MIN(price) AS Minimum_Amount
				FROM car;";
	$sqlMAX = "SELECT MAX(price) AS Maximum_Amount
				FROM car;";
	$sqlCOUNT = "SELECT COUNT(year) AS Amount_Of_Cars
				FROM car;";

	$resultSet = $connection->query($sql);
	$resultAVG = $connection->query($sqlAVG);
	$resultMIN = $connection->query($sqlMIN);
	$resultMAX = $connection->query($sqlMAX);
	$resultCOUNT = $connection->query($sqlCOUNT);
	$connection->close();

require('fpdf.php');
//include("index.php");

$pdf = new FPDF();

	//Cell( w [,  h [,  txt [,
	// border [,  ln [,  align [,
	// fill [,  link]]]]]]])

	//w=cell width
	//h=cell height - default=0
	//txt=string to print - default=empty string

	//border=
	//	0-no border - default
	//	1-frame
	//	L-left
	//	T-top
	//	R-right
	//	B-bottom

	//ln=
	//	0-to the right - default
	//	1-to the beginning of the next line
	//	2-below

	//align=
	//	L or empty string-left align - default
	//	C-center
	//	R-right align

	//fill=
	//	true-cell background fill
	//	false-transparent cell - default

	//link=URL

// Column headings
$pdf->AddPage();
$pdf->SetFont('Courier','B',30);
$pdf->Cell(100,30,'Car Report',0,1);
$pdf->SetFillColor(200,200,200);
$pdf->SetTextColor(120,120,120);
$pdf->SetFont('Courier','BU',18);
$pdf->Cell(38,5,'Year',0,0,'L',1);
$pdf->SetFillColor(120,120,120);
$pdf->SetTextColor(200,200,200);
$pdf->Cell(38,5,'Make',0,0,'L',1);
$pdf->SetFillColor(200,200,200);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(38,5,'Model',0,0,'L',1);
$pdf->SetFillColor(120,120,120);
$pdf->SetTextColor(200,200,200);
$pdf->Cell(38,5,'Color',0,0,'L',1);
$pdf->SetFillColor(200,200,200);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(38,5,'Price',0,1,'R',1);

while ($res = $resultSet->fetch_assoc()):
	//data
	$dataYear = $res["year"];
	$dataMake = ucwords($res["make"]);
	$dataModel = ucwords($res["model"]);
	$dataColor = ucwords($res["color"]);
	$dataPrice = '$' . number_format($res["price"]);
	//fonts and color for data
	$pdf->SetFont('Courier','',20);
	$pdf->SetFillColor(120,120,120);
	$pdf->SetTextColor(200,200,200);
	$pdf->Cell(38,10,$dataYear,0,0,'L',1);
	$pdf->SetFillColor(200,200,200);
	$pdf->SetTextColor(120,120,120);
	$pdf->Cell(38,10,$dataMake,0,0,'L',1);
	$pdf->SetFillColor(120,120,120);
	$pdf->SetTextColor(200,200,200);
	$pdf->Cell(38,10,$dataModel,0,0,'L',1);
	$pdf->SetFillColor(200,200,200);
	$pdf->SetTextColor(120,120,120);
	$pdf->Cell(38,10,$dataColor,0,0,'L',1);
	$pdf->SetFont('Courier','B',20);
	$pdf->SetFillColor(120,120,120);
	$pdf->SetTextColor(196,8,8);
	$pdf->Cell(38,10,$dataPrice,0,1,'R',1);
endwhile;
//getting avg, min, max, and count of cars
$resAVG = $resultAVG->fetch_assoc();
$dataAVG = $resAVG["Average"];
$resMIN = $resultMIN->fetch_assoc();
$dataMIN = $resMIN["Minimum_Amount"];
$resMAX = $resultMAX->fetch_assoc();
$dataMAX = $resMAX["Maximum_Amount"];
$resCOUNT = $resultCOUNT->fetch_assoc();
$dataCOUNT = $resCOUNT["Amount_Of_Cars"];

//average price
$pdf->SetFont('Courier','',20);
$pdf->SetFillColor(200,200,200);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(150,20,'Average Price:',
					0,0,'L',1);
$pdf->SetFont('Courier','B',20);
$pdf->SetTextColor(255,10,10);
$pdf->Cell(40,20,'$' . number_format($dataAVG,2),
					0,1,'R',1);

//min price
$pdf->SetFont('Courier','',20);
$pdf->SetFillColor(120,120,120);
$pdf->SetTextColor(200,200,200);
$pdf->Cell(150,20,'Min Price:',
					0,0,'L',1);
$pdf->SetFont('Courier','B',20);
$pdf->SetTextColor(194,8,8);
$pdf->Cell(40,20,'$' . number_format($dataMIN,2),
					0,1,'R',1);

//max price
$pdf->SetFont('Courier','',20);
$pdf->SetFillColor(200,200,200);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(150,20,'Max Price:',
					0,0,'L',1);
$pdf->SetFont('Courier','B',20);
$pdf->SetTextColor(255,10,10);
$pdf->Cell(40,20,'$' . number_format($dataMAX,2),
					0,1,'R',1);

//total cars
$pdf->SetFont('Courier','',20);
$pdf->SetFillColor(120,120,120);
$pdf->SetTextColor(200,200,200);
$pdf->Cell(150,20,'Total Cars:',
					0,0,'L',1);
$pdf->SetFont('Courier','B',20);
$pdf->SetTextColor(194,8,8);
$pdf->Cell(40,20,number_format($dataCOUNT,2),
					0,1,'R',1);

$pdf->Output();
?>
