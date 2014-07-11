<?php
// get provinsi
$filename = "PROVINSI.csv";
$file = fopen($filename,"r");
while(! feof($file))
  {
  	$tmpArray = fgetcsv($file);
	$provinsi_name = preg_replace('/\s/', '_', $tmpArray[0]);
	$min_value = $tmpArray[1];
	$max_value = $tmpArray[2];
	$total_vars = $tmpArray[3];
	$provinsi [$provinsi_name] = array( "id" => $min_value, "max" => $max_value, "total" => $total_vars );
  }
fclose($file);

// fill in csv buat tau tipe idnya
/*foreach( $provinsi as $provinsi_name => $provinsiArr ){
	$cvsfilename = "provinsi/".$provinsi_name.".csv";
	$myfile = fopen($cvsfilename, "w") or die("Unable to open file!");
	$txt = '';
	for( $i = $provinsiArr["id"]; $i <= $provinsiArr["max"]; $i++ ){
		$txt .= "$i\n";
	}
	fwrite($myfile, trim($txt));
}*/

// tulis dong ah
/*\
  foreach( $provinsi as $provinsi_name => $provinsiArr ){
  	 $cvsfilename = "provinsi/".$provinsi_name.".html";
	 $myfile = fopen($cvsfilename, "w") or die("Unable to open file!");
	 if( $provinsi_name == "GORONTALO" ){
	 	for( $i = $provinsiArr["id"]; $i <= $provinsiArr["max"]; $i++ ){
	 		$daerah_no = str_pad($i, 7, "0", STR_PAD_LEFT);
			$tps_no = '007';
	 		$body .= '<div class="row"><span>'.$i.'</span>
	 		<span><a target="_blank" href="http://scanc1.kpu.go.id/viewp.php?f='.$daerah_no.$tps_no.'04.jpg">
	 		Lihat Gambar</a></span></div>';
	 	}
	 	$txt=<<<EOT
	 <html><head></head><body>{$body}</body></html>
EOT;
	 fwrite($myfile, $txt);
	 }
  }*/

function getAllImages() {

}
?>