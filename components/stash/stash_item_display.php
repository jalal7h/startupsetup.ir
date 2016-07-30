<?
$GLOBALS['block_layers']['stash_item_display'] = 'نمایش آیتم';

function stash_item_display(){

	#
	# find it
	if(! $item_id = $_REQUEST['id'] ){
		e( __FUNCTION__ , __LINE__ );
		return false;
	
	} else if(! $rw_item = table("item", $item_id)){
		e( __FUNCTION__ , __LINE__ );		
		return false;
	}

	#
	# counter
	dbq(" UPDATE `item` SET `view`=`view`+1 WHERE `id`='".$item_id."' LIMIT 1 ");

	#
	# display
	?>
	<div class="stash_item_display">
		<img class="screenshot" alt="<?=$rw_item['name']?>" src="<?=$rw_item['stash_screenshot']?>" />
		<div class="under-screenshot">
			<div class="icon-container">
				<img class="icon" alt="<?=$rw_item['name']?>" src="<?=$rw_item['stash_icon']?>" />
			</div>
			<?=upvote_form( "item" )?>
			<a class="website" target="_blank" href="<?=$rw_item['website']?>?startupsetup"><?=$rw_item['website_name']?></a>
			<? stash_item_display_filters( $rw_item ); ?>
		</div>
		<div class="info">
			<?=stash_item_display_texting( $rw_item )?>
			<?=stash_item_display_sharing( $rw_item )?>
		</div>
		<?=fbcm( "item" , $item_id )?>
	</div>
	<?
}





