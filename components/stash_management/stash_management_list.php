<?

function stash_management_list(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'saveNew':
			stash_management_saveNew();
			break;
		
		case 'saveEdit':
			stash_management_saveEdit();
			break;
		
		case 'remove':
			listmaker_remove( "item" );
			break;
		
		case 'flag':
			stash_management_flag();
			break;
			
		case 'prio':
			listmaker_priority( array('item', 'some'=>'cat_id') );

		default:
			# code...
			break;
	}

	#
	# list

	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `item` WHERE 1 ORDER BY `flag` ASC , `prio` ASC ";
	$list['tdd'] = 12;

	$list['base_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';

	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';

	$list['remove_url'] = true;
	$list['up_n_down'] = $_REQUEST['cat_id'] ? true : false;
	$list['setflag_url'] = true;

	$list['list_array'] = array (
		array("head"=>"عکس", "tag"=>"th", "picture" => '$rw[\'stash_icon\']'),
		array("head"=>"عنوان", "content" => '$rw[\'name\']'),
		array("head"=>"دسته بندی", "content" => 'cat_translate($rw[\'cat_id\'])'),
		array("head"=>"ثبت کننده", "content" => 'table("users", $rw[\'user_id\'], "name")'),
		array("head"=>"اسپانسر", "content" => 'table("users", $rw[\'sponsor_id\'], "name")'),
		array("head"=>"تعداد بازدید", "content" => 'number_format($rw[\'view\'])' ,"attr" => array("align" => 'center',"dir" => "rtl")),
	);
	
	$list['paging_select'] = array(
		'cat_id' => "<option value=''>.. دسته بندی ..</option>".cat_display('cat',$is_array=false,$parent=0,$optionPreStr=""),		
		'sponsor_id' => "<option value=''>.. اسپانسر ..</option>".listmaker_option("litesponsor", $condition="", $returnArray=false ),		
	);
	
	$list['search'] = array("name","desc","kw","website","email");

	echo listmaker_list($list);

}

