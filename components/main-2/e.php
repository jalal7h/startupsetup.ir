<?

function e( $text, $line=null, $etc=null ){

	if( $line ){
		$text.= " : ".$line;
	}
	if( $etc ){
		$text.= " (".$etc.")";
	}

	#
	# echo 
	echo "<center>".$text."</center>";
	
	#
	# put into e
	// $fp = fopen("e","a+");fwrite($fp, date("[Y/m/d H:i:s] ").$text."\n");fclose($fp);

	#
	# error log
	error_log($text);

	return false;
}


