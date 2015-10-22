<?php

$upload_dir = "upload/";
$upload_file = $upload_dir . basename($_FILES["fileToUpload"]["name"]);
$upload_filetype = pathinfo($upload_file, PATHINFO_EXTENSION);
$rad = $_POST['picType'];

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_file);

//convert uploaded image to grayscale
if($rad == "grayscale"){
	$gray_image = imagecreatefrompng($upload_file);
	imagefilter($gray_image, IMG_FILTER_GRAYSCALE);
	imagejpeg($gray_image, $upload_file . ".p.jpg");
	imagedestroy($gray_image);
}
else if($rad == "negative") {
	$neg_image = imagecreatefrompng($upload_file);
	imagefilter($neg_image,IMG_FILTER_NEGATE);
	imagepng($neg_image, $upload_file . '.p.jpg');
	imagedestroy($neg_image);
}
else if($rad == "sepia") {
	$sepia_image = imagecreatefrompng($upload_file);
	imagefilter($sepia_image,IMG_FILTER_GRAYSCALE);
	imagefilter($sepia_image,IMG_FILTER_COLORIZE,100,50,0);
	imagepng($sepia_image,$upload_file . '.p.jpg');
	imagedestroy($sepia_image);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Baby Photoshop</title>
</head>

<body>

	<img src="<?php echo $upload_file; ?>" />
	<img src="<?php echo $upload_file . ".p.jpg"; ?>" />
	
</body>

</html>