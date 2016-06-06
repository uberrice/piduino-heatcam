<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF8">
	<title>HeatCam</title>
</head>


<body>
	Hello world!<br>

	<form action="cgi-bin/riid.cgi">
	<input type="submit" value="read">
	</form>

	<?php
	 $imageHeight = 800;
	 $imageWidth = $imageHeight;
	 $imageColumns = 2;
	 $activeColumn = 0;
	 $reso = $imageWidth / $imageColumns / 8;


	 $data = array();
 	 $file = fopen("cgi-bin/filetest.csv","r");
 	 while (! feof($file)) {
 	 	 array_push( $data , fgetcsv($file) );
 	 }	
	 fclose($file);
	?>
	<?php
	  $png_image = imagecreate($imageWidth, $imageHeight);
	    imagecolorallocate($png_image, 0, 0, 0);//black background for beginning
	    $colorArray = array(
	    	imagecolorallocate($png_image, 0x00, 0x33, 0xCC), //darkblue
	    	imagecolorallocate($png_image, 0x99, 0x00, 0x99), //dviolet
	    	imagecolorallocate($png_image, 0xCC, 0x00, 0x66), //violet
		imagecolorallocate($png_image, 0x00, 0x99, 0x00), //dgreen
		imagecolorallocate($png_image, 0x00, 0xB3, 0x00), //green
	    	imagecolorallocate($png_image, 0xCC, 0x00, 0x00), //red
		imagecolorallocate($png_image, 0xFF, 0x33, 0x33), //lred
	    	imagecolorallocate($png_image, 0xE6, 0x5C, 0x00), //orange
		imagecolorallocate($png_image, 0xFF, 0x94, 0x4D), //lorange
	    	imagecolorallocate($png_image, 0xFF, 0xFF, 0x00), //yellow
	    	imagecolorallocate($png_image, 0xFF, 0xFF, 0xDD), //lyellow
	    	imagecolorallocate($png_image, 0xFF, 0xFF, 0xFF)  //white
	    	);

	    //fill in stuff
	    $cChooser = $data[0][0];
	     $activeColumn = 0;
	     $yPos = 0;
	     $xOffset = 0;
	    for ($i=0; $i < ($imageHeight / $reso * $imageColumns) ; $i++) { 
	    	   
	    	if ($yPos > ($imageHeight / $reso)-1) {
	    		$yPos=0;
	    		$xOffset+=($imageWidth/$imageColumns);
	    	}
	    	for ($j=1; $j < 9; $j++) { 
	    		$cChooser = ($data[$i][$j] - $data[$i][0])/3;
			if ($cChooser > 11){
				$cChooser = 11;
			}
	    		imagefilledrectangle($png_image, ($j-1)*$reso+$xOffset, $yPos*$reso, $j*$reso+$xOffset, $yPos*$reso+$reso, $colorArray[$cChooser] );	    	
	    	}
 			$yPos++;
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
