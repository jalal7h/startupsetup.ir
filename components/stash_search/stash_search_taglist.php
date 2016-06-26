<?


function stash_search_taglist(){

	?><div class="taglist"><?


	#
	# cat as tag
	foreach ($_REQUEST as $k0 => $v0) {
		
		if( substr($k0, 0, 4)!="cat_" ){
			continue;

		} else {
			$cat_id = substr($k0, 4);
			$cat_name = cat_translate( $cat_id );
			echo "<a href='#' rel='90909' cat_id='$cat_id' >$cat_name</a>";
		}

	}

	#
	# filters as tag
	if( $filter_id = $_REQUEST['filter_lang'] ){
		$filter_name = cat_translate( $filter_id );
		echo "<a href='#' rel='90908' filter='lang' >$filter_name</a>";
	}
	#
	# money
	if( $filter_id = $_REQUEST['filter_money'] ){
		$filter_name = cat_translate( $filter_id );
		echo "<a href='#' rel='90908' filter='money' >$filter_name</a>";
	}
	#
	# platform
	if( $filter_id = $_REQUEST['filter_platform'] ){
		$filter_name = cat_translate( $filter_id );
		echo "<a href='#' rel='90908' filter='platform' >$filter_name</a>";
	}

	#
	# normal tags
	if(! $q = $_REQUEST['q'] ){
		;//
	
	} else if(! $q_arr = explode(" ", $q) ){
		;//
	
	} else foreach ( $q_arr as $i => $w ) {
		
		// 
		if(! $w ){
			continue;
		
		} else if( sizeof($w_arr) and in_array($w, $w_arr) ){
			continue;
		}

		// 
		$w_arr[] = $w;
		

		// make some having all words but $w
		$q_arr_tmp = $q_arr;
		$q_arr_tmp[$i] = "";
		$q_but = implode(" ", $q_arr_tmp);
		$q_but = trim(str_replace("  ", " ", $q_but));
		
		// display the remove tag anchors
		echo "<a href='#' rel='$q_but' >$w</a>";

	}

	?></div><?
	
}



