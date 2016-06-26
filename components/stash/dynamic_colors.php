<?

function the_list_of_dynamic_colors( $only_first=false ){
	
	// return '[ "8A9BB1", "FED156", "7758C3", "72616E", "167C80", "90AB3D", "D8732B", "C53B68", "EE836E", "6ED6EE" ]';
	
	if(! $c_arr = tab__temp('the_list_of_dynamic_colors')){
		$c = '[ "8A9BB1", "FED156", "7758C3", "72616E" ]';
	} else {
		$c_arr = str_replace( array( "\n" , "\r\n" , " " ,  "," , "،" , "
" ) , " ", $c_arr );
		$c_arr = explode( " " , $c_arr );
		foreach ($c_arr as $k => $c_word) {
			if(! $c_word = trim($c_word) ){
				continue;
			} else {
				
				if( $only_first ){
					return $c_word;
				}

				$c_arr2[] = $c_word;
			}
		}
		$c = '[ "'.implode( '", "', $c_arr2 ).'" ]';
		$c = mb_ereg_replace('[^a-zA-Z0-9\"\[\]\ \,]+','',$c);

	}

	return $c;
}

