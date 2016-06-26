<?

function stash_client_saveNew(){
	
	$user_id = $_SESSION['uid'];
	$rw_users = table( "users", $user_id );

	if( $_REQUEST['website'] ){
		if( substr( strtolower($_REQUEST['website']) , 0 , 4 )!='http' ){
			$_REQUEST['website'] = "http://".$_REQUEST['website'];
		}
	}

	if(! $id = dbs( 'item' , ['name','memo','brief','cat_id','desc','email','website','website_name','kw','user_id'=>$_SESSION['uid'],'filter_money','filter_lang','filter_platform','date'=>U()] ) ){
		e(__FUNCTION__ , __LINE__, dbe() );

	} else {
		
		$stash_icon = fileupload_upload( array("id"=>$id, "input"=>"stash_icon") );
		$stash_screenshot = fileupload_upload( array("id"=>$id, "input"=>"stash_screenshot") );
		
		if(! dbq(" UPDATE `item` SET `stash_icon`='".$stash_icon[0]."' , `stash_screenshot`='".$stash_screenshot[0]."' WHERE `id`='$id' LIMIT 1 ")){
			e(__FUNCTION__,__LINE__);
		
		} else {

			texty_msg('admin','stash_client_saveNew_admin_msg',['user_name'=>$rw_users['name'], 'item_id'=>$id,'item_name'=>$_REQUEST['name']]);
			texty_msg('user','stash_client_saveNew_user_msg',['user_name'=>$rw_users['name'], 'item_id'=>$id,'item_name'=>$_REQUEST['name']]);
			
			return true;
		}

	}
	
	return false;
}

