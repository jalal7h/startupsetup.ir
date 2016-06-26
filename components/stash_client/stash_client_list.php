<?

function stash_client_list(){
	
	echo '<div class="stash_client_list_wrapper">
	<div class="head">'.( $_REQUEST['do1']!='form' ?'لیست آیتم ها' :( $_REQUEST['id'] ?'ویرایش آیتم' :'ثبت آیتم جدید' ) ).'</div>
	';

	$user_id = $_SESSION['uid'];

	#
	# action
	switch ($_REQUEST['do1']) {
		
		case 'saveNew':
			stash_client_saveNew();
			break;
		
		case 'saveEdit':
			stash_client_saveEdit();
			break;
		
		case 'remove':
			listmaker_remove( "item" );
			break;

		case 'form':
			return stash_client_form();

		default:
			# code...
			break;
	}

	#
	# list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `item` WHERE `user_id`='$user_id' ORDER BY `prio` ASC ";
	$list['tdd'] = 5;

	$list['base_url'] = '_URL."/?page=".$_REQUEST["page"]."&do=".$_REQUEST["do"]';
	$list['target_url'] = true;
	$list['remove_url'] = true;
	$list['setflag_url'] = false;
	$list['addnew_url'] = false;

	$list['list_array'] = array (
		array("head"=>lmtc('item:stash_icon'), "tag"=>"th", "picture" => '$rw[\'stash_icon\']'),
		array("head"=>lmtc('item:name'), "content" => '$rw[\'name\']'),
		array("head"=>lmtc('item:cat_id'), "content" => 'cat_translate($rw[\'cat_id\'])'),
		array("head"=>lmtc('item:flag'), "content" => '( $rw[\'flag\'] ? "فعال" : "درانتظار تایید" )'),
		array("head"=>lmtc('item:view'), "content" => 'number_format($rw[\'view\'])' ,"attr" => array("align" => 'center',"dir" => "rtl")),
	);
	
	$list['paging_select'] = array(
		'cat_id' => "<option value=''>دسته بندی</option>".cat_display('cat',$is_array=false,$parent=0,$optionPreStr=""),
		'flag' => "
			<option value=''>وضعیت</option>
			<option value='1'>فعال</option>
			<option value='0'>غیرفعال</option>",
	);
	
	$list['search'] = array("name","desc","kw","website","email");

	echo listmaker_list($list);

	echo '
	<div class="divider"></div><center>
	<a class="stash_button bgSameAsBG stash_client_list_new" href="'._URL.'/?page='.$_REQUEST["page"].'&do='.$_REQUEST["do"].'&do1=form'.'">ثبت مورد جدید</a></center>';

	echo "</div>";

}

