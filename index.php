<?php
	switch( $argv[1] ){
		case "-lineno":
			if( $argv[2] ){
				$CURRENT = $argv[2];
				$MAX_LINENO = $argv[3];
			} else {
				echo "Incomplete param.  Do php index.php -lineno <line nomer dari KELURAHAN_ID.csv> <optional:max lineid>\n";
				exit();
			}
			break;
		default:
			echo "Unknown param\n";
			exit();
	}

	$file = new SplFileObject('KELURAHAN_ID.csv');
	try{
		while(TRUE) {
			$file->seek($CURRENT-1);
			$kelurahan_id = $file->current();
			$child = popen('php child.php -id '.$kelurahan_id, 'r');
			$response = stream_get_contents($child);
			echo $response;
			if(preg_match("/Incomplete param/", $response) || $CURRENT >= $MAX_LINENO ) return FALSE;
			$CURRENT++;
		}
	} catch (Exception $e) {
		throw $e;
		return -1;
	}



?>