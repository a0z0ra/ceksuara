<?php
error_reporting(E_ERROR | E_PARSE);

switch( $argv[1] ){
	case "-id":
		if( $argv[2] ){
			$kelurahan_id = $argv[2];
		} else {
			echo "Incomplete param.  Do php child.php -id <kelurahan_id>\n";
			exit();
		}
		break;
	default:
		echo "Unknown param\n";
		exit();
}

// ambil dari kpu
$sxml = retry( grabKPU );

// grab provinsi.csv
$tmpStr = $sxml->xpath('//div[@class="help"]');
$tmpStr = trim( (string)$tmpStr[0] );
list($nasional, $provinsi, $kabupaten, $kecamatan, $kelurahan) = explode(" » ", $tmpStr);
$provinsicsv = "tps/".str_replace(" ", "_", $provinsi) . ".csv";
echo "$provinsicsv >>\n";
$file = fopen($provinsicsv,"a");

// grab tpu nomer and tpu id
$totalRows = count($sxml->body->div->table->tr);
for( $i=3; $i < $totalRows-1; $i++ ){
	$txt = $kelurahan_id.",";
	$txt .= $sxml->body->div->table->tr[$i]->td[0].",";
	$txt .= $sxml->body->div->table->tr[$i]->td[1].",";
	$txt .= $tmpStr."\n";

	//write
	fwrite($file, $txt);
	echo $txt;
}

fclose( $file );

echo "ALL GOOD, MARKING $kelurahan_id AS COMPLETE\n";
$statusDoc = fopen("tmp/COMPLETE.txt","a");
$txt = "$kelurahan_id\n";
fwrite($statusDoc, $txt);
fclose($statusDoc);

return 0;

function grabKPU() {
	global $kelurahan_id;
	$kpu_url = "http://pilpres2014.kpu.go.id/c1.php?cmd=select&parent=";
	$filename = $kpu_url . $kelurahan_id;
	echo "GRABBING FROM $filename\n";
	$html = file_get_contents($filename);
	$doc = new DOMDocument();
	$doc->loadHTML($html);
	return simplexml_import_dom($doc);
}

function retry($f, $delay = 10, $retries = 3)
{
    try {
        return $f();
    } catch (Exception $e) {
        if ($retries > 0) {
            sleep($delay);
            return retry($f, $delay, $retries - 1);
        } else {
            throw $e;
			return -1;
        }
    }
}
?>
