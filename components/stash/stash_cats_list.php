<?
$GLOBALS['block_layers']['stash_cats_list'] = 'لیست دسته ها';

function stash_cats_list(){
	
	?>
	<div class="stash_cats_list">
	<?

	# 
	# list of cats
	if(! $cats = cat_display( "cat" , $is_array=true )){
		e( __FUNCTION__ , __LINE__ );
	} else foreach ($cats as $cat_id => $cat_name) {
		$rw_cat = table( "cat" , $cat_id );
		?>
		<a href="<?=stash_cats_link( $rw_cat )?>">
			<img width="100px" height="100px" src="<?=$rw_cat['logo']?>" />
			<div><?=$rw_cat['name']?></div>
		</a>
		<?
	}

	?>
	</div>
	<?

}

