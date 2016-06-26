<?

function stash_management_saveNew(){
	
	if( $_REQUEST['website'] ){
		if( substr( strtolower($_REQUEST['website']) , 0 , 4 )!='http' ){
			$_REQUEST['website'] = "http://".$_REQUEST['website'];
		}
	}

	$_REQUEST['pin'] = str_replace( array(",","\n","\r\n") , "،" , $_REQUEST['pin'] );

	if(! $id = dbs( 'item', ['name','memo','brief','cat_id','desc','email','website','website_name','kw','flag'=>'1','user_id'=>$_SESSION['uid'],'pin','filter_money','filter_platform','filter_lang','date'=>U(),'notification_sent'=>'1'] ) ){
		e(__FUNCTION__ , __LINE__);

	} else {

		$stash_icon = fileupload_upload( array("id"=>$id, "input"=>"stash_icon") );
		$stash_screenshot = fileupload_upload( array("id"=>$id, "input"=>"stash_screenshot") );

		if(! dbq(" UPDATE `item` SET `stash_icon`='".$stash_icon[0]."' , `stash_screenshot`='".$stash_screenshot[0]."' WHERE `id`='$id' LIMIT 1 ")){
			e(__FUNCTION__,__LINE__);

		} else {
			return true;
		}

	}
	
	return false;
}

