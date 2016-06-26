<?

function stash_item_display_sharing( $rw ){
	
	$link = stash_item_link( $rw );

	$socials = seo_share_link( $link , $rw['name'] );
	// if( $rw['email'] ){
	// 	$socials .= '<a class="email" href="mailto:'.$rw['email'].'" rel="nofollow" target="_blank"><icon></icon></a>';
	// }
	if( $socials ){
		$socials = '
		<div class="socials">
			<div class="head">
				<div class="dotline"></div>
				<div class="text">اشتراک گذاری</div>
			</div>
			'.$socials.'
		</div>';
	}

	if( $upvote_list = upvote_list( "item" ) ){
		$upvote_list = '
		<div class="list-of-upvotes">
			<div class="head">
				<div class="dotline"></div>
				<div class="text">'.upvote_title_s.'</div>
			</div>
			'.$upvote_list.'
		</div>';	
	}

	if( $kws = stash_item_kw( $rw ) ){
		$kws = '
		<div class="list-of-kw">
			<div class="head">
				<div class="dotline"></div>
				<div class="text">کلمات کلیدی</div>
			</div>
			'.$kws.'
		</div>';
	}

	$c.= '
	<div class="sharing">
		
		<!-- socials -->
		'.$socials.'
		
		<!-- upvoteList -->
		'.$upvote_list.'

		<!-- kw -->
		'.$kws.'
		
	</div>';

	return $c;
}

