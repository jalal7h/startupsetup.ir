<?

function stash_search_query(){

	#
	# variables
	$r['tdd'] = 5;
	$list_of_searchable_columns = [ 'name' , 'memo' , 'brief' , 'desc' , 'kw' , 'website_name' ];

	#
	# bake the q
	if( $r['q'] = trim( strip_tags($_REQUEST['q']) ) ){
		#
		$query_search = " AND ( ";
		$query_pin.= " AND ( ";
		#
		$q_arr = explode(" ", $r['q']);
		foreach ($q_arr as $k => $word) {
			$query_search."\n";
			foreach( $list_of_searchable_columns as $i => $column ){
				$query_search.= " `".$column."` LIKE '%".$word."%' OR ";
			}
			$query_pin.= " `pin` LIKE '%".$word."%' OR ";
		}
		#
		$query_search.= " 0 ) ";
		$query_pin.= " 0 ) ";
	}
	
	#
	# cat query
	foreach ($_REQUEST as $cat => $v) {
		if( substr($cat,0,4)=="cat_" and is_numeric(substr($cat,4)) ){
			$cat_id_arr[] = intval(substr($cat,4));
		}
	}
	if( sizeof($cat_id_arr) ){
		$query_cat = " AND `cat_id` IN (".implode(',', $cat_id_arr).") ";
	}

	#
	# filters query
	if( intval($_REQUEST['filter_platform']) ){
		$query_filter = " AND `filter_platform`='".intval($_REQUEST['filter_platform'])."' ";
	}
	if( intval($_REQUEST['filter_lang']) ){
		$query_filter.= " AND `filter_lang`='".intval($_REQUEST['filter_lang'])."' ";
	}
	if( intval($_REQUEST['filter_money']) ){
		$query_filter.= " AND `filter_money`='".intval($_REQUEST['filter_money'])."' ";
	}

	#
	# trending
	if( $trending = trim($_REQUEST['trending']) ){
		switch( $trending ){

			case 'date':
				$orderby_trending = " ORDER BY `id` DESC ";
				break;

			case 'upvote':
				$column_trending = " , (SELECT COUNT(*) FROM `upvote` WHERE `table_name`='item' AND `table_id`=`item`.`id`) as `upvote` ";
				$orderby_trending = " ORDER BY `upvote` DESC ";
				break;

			case 'comment':
				$column_trending = " , (SELECT COUNT(*) FROM `facebookComment` WHERE `table_name`='item' AND `table_id`=`item`.`id`) as `comment` ";
				$orderby_trending = " ORDER BY `comment` DESC ";
				break;
		}
	} else {
		$_REQUEST['trending'] = 'prio';		
	}

	#
	# `tdd` and `stt`
	$p = intval($_REQUEST['p']);
	$stt = $r['tdd'] * $p;

	#
	# pin
	# if its the first page, and we have some pin word in `q` we will try to push the only pin `rw` at beginning of `rws`
	if( $query_pin ){
		
		$query0 = " SELECT * FROM `item` WHERE `flag`='1' $query_pin $query_search $query_filter $query_cat ORDER BY `id` DESC LIMIT 1 ";
		
		if(! $rs_trending = dbq( $query0 ) ){
			e(__FUNCTION__,__LINE__,dbe());
		
		} else if(! $rn_pin = dbn($rs_trending) ){
			;//
		
		} else {
			while( $rw_trending = dbf($rs_trending) ){
				$rw_trending['pin_flag'] = true;
				$trending_id_arr[] = $rw_trending['id'];
				$num_of_pin_records++;
				if( $p==0 ){
					$r['rw_s'][] = $rw_trending;
				}
			}
			if( sizeof($trending_id_arr) ){
				$query_trending = " AND `id` NOT IN (".implode(',', $trending_id_arr).") ";
			}
		}

	}

	# 
	# reassign stt and tdd
	if( $p==0 ){
		$tdd = $r['tdd'] - $rn_pin;
	} else {
		$tdd = $r['tdd'];
		$stt-= $num_of_pin_records;
	}

	#
	# query
	$query = " SELECT * $column_trending FROM `item` WHERE `flag`='1' $query_trending $query_search $query_filter $query_cat $orderby_trending LIMIT $stt , $tdd ";

	// echo "<div dir=ltr >".$query."</div>";

	$r['q_or_c'] = str_replace( ' * ', ' COUNT(*) ', $query );
	$r['q_or_c'] = explode(" LIMIT ", $r['q_or_c'] )[0];
	$r['q_or_c'] = explode(" ORDER ", $r['q_or_c'] )[0];	
	$r['q_or_c'] = dbq( $r['q_or_c'] );
	$r['q_or_c'] = dbr( $r['q_or_c'] ,0,0);
	$r['q_or_c']+= $num_of_pin_records;

	#
	# execute
	if(! $rs = dbq( $query )){
		return false;
	
	#
	# no result found
	} else if(! dbn($rs) ){
		return $r;
	
	#
	# fetch and return
	} else {
		
		#
		# fetch
		while( $r['rw_s'][] = dbf($rs) ){
			;//
		}

		return $r;
	}

}

