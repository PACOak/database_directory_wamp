<!DOCTYPE html>
<html>

<head>
	<title>Baby Photoshop</title>
</head>

<body>

	<form action="process-image.php" 
			method="post" 
			enctype="multipart/form-data">
		<input type="file" 
				name="fileToUpload" 
				id="fileToUpload" />
				
		<input type="radio" 
				name="picType"
				id="gray"
				value="grayscale" 
				checked>
				Grayscale</input>
		<input type="radio" 
				name="picType"
				id="neg"
				value="negative">
				Negative</input>
		<input type="radio" 
				name="picType"
				id="sepia"
				value="sepia">
				Sepia</input>
				
		<button type="submit">Process My Image</button>
	</form>
	
</body>

</html>