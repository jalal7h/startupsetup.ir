<?

function litesponsor_mg_list(){

	#
	# action
	switch($_REQUEST['do']){
		
		case 'saveNew' : 
			litesponsor_mg_saveNew();
			break;
		
		case 'saveEdit' : 
			litesponsor_mg_saveEdit();
			break;
		
		case 'remove' : 
			listmaker_remove('litesponsor');
			break;
	}
	
	#
	# list
	$list['query'] = " SELECT * FROM `litesponsor` WHERE 1 ORDER BY `id` DESC ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=litesponsor_mg_form&p=".$_REQUEST["p"]."&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&p=".$_REQUEST["p"]."&do=remove&id=".$rw["id"]';
	$list['remove_prompt'] = '"آیا مایل به حذف هستید?"';
	
	$list['list_array'] = array(
		// picture
		array(	"picture" => '$rw["image"]'),
		
		// name
		array(	"content" => '$rw["name"]'),
	);

	echo listmaker_list($list);
}


