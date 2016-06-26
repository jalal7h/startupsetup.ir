<?


function stash_search__take_care_of_filter_money_in_q(){

	// var_dump($_REQUEST);
	$q = trim($_REQUEST['q']);
	$q = str_replace("ي","ی",$q);

	if(! $rs_cat = dbq(" SELECT `id`,`name` FROM `cat` WHERE `cat`='filter_money' ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs_cat) ){
		;//
		
	} else while( $rw_cat = dbf($rs_cat) ){
		$rw_cat['name'] = trim($rw_cat['name']);
		if( stristr( $q, $rw_cat['name'] ) ){
			
			$q = str_ireplace( $rw_cat['name'] , "" , $q );
			$_REQUEST['q'] = $q;

			if(! $_REQUEST['filter_money'] ){
				$_REQUEST['filter_money'] = $rw_cat['id'];
			}
		}
		
	}

}

