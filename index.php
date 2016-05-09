<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF8">
	<title>HeatCam</title>
</head>


<body>
	Hello world!
	
	<?php
	 $imageHeight = 800;
	 $imageWidth = $imageHeight;
	 $data = array();
 	 $file = fopen("filetest.csv","r");
 	 while (! feof($file)) {
 	 	 array_push( $data , fgetcsv($file) );
 	 }	
	 fclose($file);
	?>
	<?php

	  $png_image = imagecreate(800, 800);
	    imagecolorallocate($png_image, 0, 0, 0);//black background for beginning
	    $colorArray = array(
	    	imagecolorallocate($png_image, 0x00, 0x33, 0xCC), //darkblue
	    	imagecolorallocate($png_image, 0x99, 0x00, 0x99), //dviolet
	    	imagecolorallocate($png_image, 0xCC, 0x00, 0x66), //violet
	    	imagecolorallocate($png_image, 0xCC, 0x00, 0x00), //red
	    	imagecolorallocate($png_image, 0xE6, 0x5C, 0x00), //orange
	    	imagecolorallocate($png_image, 0xFF, 0xFF, 0x00), //yellow
	    	imagecolorallocate($png_image, 0xFF, 0xFF, 0xDD), //lyellow
	    	imagecolorallocate($png_image, 0xFF, 0xFF, 0xFF)  //white
	    	);

	    //fill in stuff
	    $cChooser = $data[0][0];
	    for ($i=0; $i < 16; $i++) { 
	    	$currarray = $data[i];
	    	for ($j=1; $j < 9; $j++) { 
	    		$cChooser = ($data[$i][$j] - $data[$i][0])/2;
	    		imagefilledrectangle($png_image, ($j-1)*50, $i*50, $j*50, $i*50+50, $colorArray[$cChooser] );	    	
	    	}
	    }


	    //end of filling in stuff
	  $path_image = 'saved-example.png';
	  imagepng($png_image, $path_image);
	  imagedestroy($png_image);
	?>
	<br>
	<img src="saved-example.png">
</body>

</html>
bgr