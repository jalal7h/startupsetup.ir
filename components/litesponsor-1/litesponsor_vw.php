<?

function litesponsor_vw(){
	
	$c = "<div class=\"sponsors\">\n";
	if(! $rs = dbq(" SELECT * FROM `litesponsor` ORDER BY rand() LIMIT 5 ") ){
		e( __FUNCTION__ , __LINE__ );
	} else while( $rw = dbf($rs) ){
		$sz = getimagesize($rw['image']);
		$width = $sz[0];
		$height = $sz[1];
		$width = round( ($width * 40) / $height );
		$c.= '<a href="'.$rw['link'].'" target="_blank"><img width="'.$width.'px" height="40px" src="'._URL.'/'.$rw['image'].'" /></a>';
	}
	$c.= "</div>\n";

	return $c;
}


