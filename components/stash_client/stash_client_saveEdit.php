<?

function stash_client_saveEdit(){
	
	if( substr( strtolower($_REQUEST['website']) , 0 , 4 )!='http' ){
		$_REQUEST['website'] = "http://".$_REQUEST['website'];
	}

	if(! $id = $_REQUEST['id'] ){
		return false;
	}

	$stash_icon = fileupload_upload( array("id"=>$id, "input"=>"stash_icon") );
	$stash_screenshot = fileupload_upload( array("id"=>$id, "input"=>"stash_screenshot") );
	
	if(! dbq(" UPDATE `item` SET 
		
		`name`='".$_REQUEST['name']."', 
		`memo`='".$_REQUEST['memo']."', 
		`brief`='".$_REQUEST['brief']."', 
		`cat_id`='".$_REQUEST['cat_id']."', 
		`desc`='".$_REQUEST['desc']."', 
		`email`='".$_REQUEST['email']."', 
		`website`='".$_REQUEST['website']."', 
		`website_name`='".$_REQUEST['website_name']."', 

		`filter_money`='".$_REQUEST['filter_money']."', 
		`filter_lang`='".$_REQUEST['filter_lang']."', 
		`filter_platform`='".$_REQUEST['filter_platform']."', 

		`kw`='".$_REQUEST['kw']."',
	
		`notification_sent`='0',
		`flag`='0'
		
		".( $stash_icon[0] ? " , `stash_icon`='".$stash_icon[0]."' " : "")."
		".( $stash_screenshot[0] ? " , `stash_icon`='".$stash_screenshot[0]."' " : "")."
		
		WHERE `id`='$id' LIMIT 1 ")){
		e(__FUNCTION__,__LINE__);
	} else {

		texty_msg('admin','stash_client_saveEdit_admin_msg',['item_id'=>$id,'item_name'=>$_REQUEST['name']]);
		texty_msg('user','stash_client_saveEdit_user_msg',['item_id'=>$id,'item_name'=>$_REQUEST['name']]);
			
		return true;
	}

	return false;
}

