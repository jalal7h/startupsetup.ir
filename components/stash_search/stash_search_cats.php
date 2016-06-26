<?

function stash_search_cats(){

	?><div class="cats"><?

	if(! $cats = cat_display( $cat="cat" , $is_array=true ) ){
		e(__FUNCTION__,__LINE__);
	
	} else foreach ($cats as $i => $cat) {
		?>
		<label>
			<input type="checkbox" id="stash_search_cat_<?=$i?>" name="cat_<?=$i?>" value="1" <?=($_REQUEST['cat_'.$i]=='1' ?"checked": "")?> />
			<span><?=$cat?></span>
		</label>
		<?
	}

	?></div><?
}


