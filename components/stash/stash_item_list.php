<?
$GLOBALS['block_layers']['stash_item_list'] = 'لیست آیتم ها';

function stash_item_list(){
	
	if( $cat_id = $_REQUEST['id'] ){
		if(! $rw_cat = table("cat", $cat_id)){
			e( __FUNCTION__ , __LINE__ );
			return false;
		} else {
			$query_cat = " AND `cat_id`='".$cat_id."' ";
		}
	}
	
	?>
	<div class="stash_item_list">
		<div class="cat-info">
			<div class="logo-container bgSameAsBG"><img src="<?=$rw_cat['logo']?>"/></div>
			<div class="head"><?=$rw_cat['name']?></div>
			<div class="desc"><?=$rw_cat['desc']?></div>
		</div>
	<?

	# 
	# list of cats
	$tdd = 5;
	$stt = $tdd * intval($_REQUEST['p']);
	$query = " SELECT * FROM `item` WHERE `flag`='1' $query_cat $query_search ORDER BY `prio` ASC LIMIT $stt , $tdd ";
	if(! $rs = dbq( $query )){
		e( __FUNCTION__ , __LINE__ );
	} else if(! dbn($rs) ){
		?><div class="convbox notfound">موردی یافت نشد</div><?
	} else while( $rw = dbf($rs) ) {
		stash_items_list_this( $rw );
	}
	$link = _URL."/cat-".$cat_id."-%%-".cat_translate($cat_id).".html";
	echo listmaker_paging($query, $link, $tdd, $debug=false);

	?>
	</div>
	<?

}

