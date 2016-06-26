<?

function stash_nav_item_list(){
	
	if(! $item_id = $_REQUEST['id'] ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! $rw_item = table("item", $item_id) ){
		e( __FUNCTION__ , __LINE__, $item_id );		
	
	} else if(! $rs = dbq(" SELECT * FROM `item` WHERE `flag`='1' AND `cat_id`='".$rw_item['cat_id']."' ") ){
		e( __FUNCTION__ , __LINE__, dbe() );	
	
	} else {
		echo '<div class="item_list">';
		while( $rw = dbf($rs) ){
			echo '
			<a '.($_REQUEST['id']==$rw['id'] ?"class='current'" :"" ).' href="'.stash_item_link( $rw ).'">
				<span>'.$rw['name'].'</span>
			</a>';
		}
		echo '</div>';
	}
}


/*
function stash_nav_item_list__the_old_version(){
	
	if(! $item_id = $_REQUEST['id'] ){
		e( __FUNCTION__ , __LINE__ );
	} else if(! $rw_item = table("item", $item_id) ){
		e( __FUNCTION__ , __LINE__ );		
	} else if(! $rs = dbq(" SELECT * FROM `item` WHERE `cat_id`='".$rw_item['cat_id']."' ") ){
		e( __FUNCTION__ , __LINE__ );	
	} else {
		echo '<div class="item_list">';
		while( $rw = dbf($rs) ){
			echo '
			<a '.($_REQUEST['id']==$rw['id'] ?"class='current'" :"" ).' href="'.stash_item_link( $rw ).'">
				<img src="'.$rw['stash_icon'].'"/>
				<span>'.$rw['name'].'</span>
			</a>';
		}
		echo '</div>';
	}
}
*/
