<?

function stash_item_kw( $rw ){

	$kw = $rw['kw'];

	$kw = strip_tags( $kw );
	
	if(! $kw = trim( $kw ) ){
		;//
	} else {
		$kw = str_replace( array("،",";","؛") , ",", $kw );
		$kw_array = explode(",", $kw );
		foreach ( $kw_array as $i => $word ) {
			$kw_str[] = "<a class='bghSameBG' href='"._URL."/tag/".urlencode(trim($word))."'>".$word."</a>";
		}
		if( sizeof($kw_str) ){
			$kw = implode('', $kw_str );
		}
		$kw = '<div class="stash_item_kw">'.$kw.'</div>';
	}

	return $kw;
}

