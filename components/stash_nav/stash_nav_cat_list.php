<?

function stash_nav_cat_list(){
	
	if( $_REQUEST['page']=='101' ){
		$id = $_REQUEST['id'];
		$its_a = "cat";
	} else {
		$id = $_REQUEST['id'];		
		$id = table("item", $id, "cat_id");
		$its_a = "item";
	}

	?>
	<div class="cat_list">
		<?
		if(! $cats = cat_display( "cat" , $is_array=true , $parent=0 , $str="" ) ){
			e( __FILE__ , __LINE__ );
		} else foreach ($cats as $cat_id => $cat_name) {
			echo '<a '.($id==$cat_id ?"class='current'" :"" ).' href="'.stash_cats_link( table("cat", $cat_id) ).'">';
			echo $cat_name;

			if( $its_a=="item" and $id==$cat_id ){
				stash_nav_item_list();
			}

			echo '</a>';
		}
		?>
	</div>
	<?
}

