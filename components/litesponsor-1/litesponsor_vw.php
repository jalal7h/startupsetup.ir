<?

function litesponsor_vw(){
	
	$c = "<div class=\"sponsors\">\n";
	if(! $rs = dbq(" SELECT * FROM `litesponsor` ORDER BY rand() LIMIT 5 ") ){
		e( __FUNCTION__ , __LINE__ );
	} else while( $rw = dbf($rs) ){
		$c.= '<a href="'.$rw['link'].'" target="_blank"><img src="'._URL.'/'.$rw['image'].'" /></a>';
	}
	$c.= "</div>\n";

	return $c;
}


