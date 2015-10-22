<?php

header("Content-type: image/png");

$image = imagecreatefrompng("baseImage.png");

$orange = imagecolorallocate($image, 220, 210, 60);

imagestring($image, 1, 0, 0, $_REQUEST["memeText"], $orange);

imagepng($image);

imagedestroy($image);

?>