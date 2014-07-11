<?php
	// get file
	$filename = "provinsi/DKI_JAKARTA.csv";

	// ambil dari kpu
	$kpu_url = "http://pilpres2014.kpu.go.id/c1.php?cmd=select&parent=";

	// test page
	for( $i=1; $i<=4; $i++){
		$page = file_get_contents($kpu_url.$i);
		$myfile = fopen("tmp/$i.html", "w") or die("Unable to open file!");
		fwrite($myfile, $page);
		fclose($myfile);
	}


	/*$file = fopen($filename,"r");
	while(! feof($file))
	  {
	  	$tmpArray[] = fgetcsv($file);

	  }

  fclose($file);
  print_r( $tmpArray );*/

?>