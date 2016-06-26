<?
$GLOBALS['block_layers']['stash_search'] = 'جستجوی آیتم ها';


function stash_search(){

	#
	# take care of cat in q
	stash_search__take_care_of_cat_in_q();
	#
	# filters
	stash_search__take_care_of_filter_lang_in_q();
	stash_search__take_care_of_filter_money_in_q();
	stash_search__take_care_of_filter_platform_in_q();

	#
	# search query
	if(! $r = stash_search_query() ){
		echo "something wrong";
	} else {
		$q = $r['q'];
		$tdd = $r['tdd'];
		$rw_s = $r['rw_s'];
		$q_or_c = $r['q_or_c'];
	}

	#
	# search open
	?><form method="post" action="<?=_URL?>/?page=<?=$_REQUEST['page']?>" class="stash_item_list <?=__FUNCTION__?>">
	<input type="submit"/>
	<input type="hidden" name="q" value="<?=$q?>">
	<?

	#
	# search head
	?>
	<div class="head">
		
		<div class="right">
			<input type="text" name="q_new" autocomplete="off" value="" placeholder="جستجو ..">
			<icon class="submit"></icon>
			<? stash_search_taglist(); ?>
		</div>
		
		<? stash_search_filters(); ?>

	</div>
	<?

	#
	# trending
	stash_search_trending();

	#
	# list
	#
	# * open
	?><div class="list"><?
	# 
	# * not found
	if( sizeof($rw_s)==0 ){
		?><div class="convbox notfound">موردی یافت نشد</div><?
	# 
	# * foreach	
	} else foreach( $rw_s as $i => $rw ) {
		if( $rw ){
			stash_items_list_this( $rw );
		}
	}
	# 
	# * paging
	?><input type="hidden" name="p" value="<?=intval($_REQUEST['p'])?>"/><?
	$link = _URL."/tag/$q/%%";
	echo listmaker_paging( $q_or_c, $link, $tdd, $debug=false );
	# 
	# * close
	?></div><?
	
	#
	# categories
	stash_search_cats();

	#
	# search close
	?></form><?

}


















