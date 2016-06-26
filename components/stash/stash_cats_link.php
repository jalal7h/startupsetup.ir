<?


function stash_cats_link( $rw ){

	$link = _URL."/cat-".$rw['id']."-".$rw['name'].".html";
	return $link;
}

