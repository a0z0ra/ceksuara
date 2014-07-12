<?php
	switch( $argv[1] ){
		case "-filename":
			if( $argv[2] ){
				$filename = $argv[2];
			} else {
				echo "File not found\n"; exit();
			}
			break;
		default:
			echo "Unknown param\n";
			exit();
	}

	// get file
	$filename = ($filename)?$filename:"provinsi/test.csv";

	// ambil dari kpu
	$kpu_url = "http://pilpres2014.kpu.go.id/c1.php?cmd=select&parent=";

	// scrape page for keywords
	$TYPE = array( "PROVINSI","KABUPATEN","KECAMATAN", "KELURAHAN" );

	$file = fopen($filename,"r");
	while(! feof($file))
	  {
	  	$id = fgetcsv($file);

		// scrape
		$page = file_get_contents($kpu_url.$id[0]);
		preg_match_all('/(Kabupaten\/Kota|Kecamatan|Kelurahan\/Desa|ID TPS)/', $page, $result );
		switch( $result[1][0] ){
			case "Kabupaten/Kota":
				$tipe = "PROVINSI";
				break;
			case "Kecamatan":
				$tipe = "KABUPATEN";
				break;
			case "Kelurahan/Desa":
				$tipe = "KECAMATAN";
				break;
			case "ID TPS":
				$tipe = "KELURAHAN";
				break;
			default:
				$tipe = "UNKNOWN";
				break;
		}

		$newline .= "$id[0],$tipe\n";

		echo "$id[0],$tipe\n";
	  }

  //$file = fopen($filename,"w");
  //fwrite($file, trim($newline));
  fclose($file);

?>