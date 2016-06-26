<?

define('__item', 'آیتم');
define('__items', 'آیتم ها');

$GLOBALS['cmp']['stash_management'] = 'مدیریت '.__items;

function stash_management(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp']."_list" => "لیست ".__items,
		$_REQUEST['cp']."_form" => "ثبت ".__item." جدید",
	);
	listmaker_tabmenu($menu,$url);
}

