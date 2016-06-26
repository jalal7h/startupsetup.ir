<?

$GLOBALS['linkify_items']['header'] = array(
	'name'=>'لینک های سرایند' , 
	'inDashboard'=>true , 
	'haveSub'=>false, 
	'haveIcon'=>false );

function stash_headerSocialLinks(){
	
	echo "<div id='header_social_links'>\n";

	if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='header' ORDER BY `prio` ASC ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);
	
	} else while( $rw = dbf($rs) ){

		$link = $rw['url'];
		$name = $rw['name'];
		
		$page_link = seo_page_link();
		$page_name = seo_page_name();
		
		if( stristr( $link, 'facebook.com' ) ){
			$link = "http://www.facebook.com/sharer/sharer.php?u=".urlencode($page_link);
		
		} else if( stristr( $link, 'twitter.com' ) ){
			$link = "http://twitter.com/share?url=".$page_link;
		
		} else if( stristr( $link, 'plus.google.com' ) ){
			$link = "http://plus.google.com/share?url=".$page_link;
		
		} else if( stristr( $link, 'linkedin.com' ) ){
			$link = "https://www.linkedin.com/shareArticle?mini=true&url=".urlencode($page_link)."&title=".urlencode($page_name)."&summary=&source=";
		}

		echo '<p><a href="'.$link.'" target="_blank">'.$name.'</a></p>'."\n";

	}
	
	?>
	</div>
	<?
}


