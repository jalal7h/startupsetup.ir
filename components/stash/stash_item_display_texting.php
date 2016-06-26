<?

function stash_item_display_texting( $rw ){

	$c.= '
	<div class="texting">
		<div class="name">'.$rw["name"].'</div>
		<a class="cat" href="'.$cat_link.'" target="_blank" >'.cat_translate( $rw["cat_id"] ).'</a>
		<div class="brief">'.nl2br($rw["brief"]).'</div>
		'.useravatar( $rw['sponsor_id'] , $text_flag=true , $link_flag=true ).'
		<div class="desc">'.nl2br($rw["desc"]).'</div>
	</div>';

	return $c;
}

