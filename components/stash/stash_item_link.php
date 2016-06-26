<?

function stash_item_link( $rw ){
	$link = _URL."/item-".$rw['id']."-".urlencode($rw['name']).".html";

	return $link;
}

