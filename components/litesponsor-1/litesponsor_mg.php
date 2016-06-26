<?
$GLOBALS['cmp']['litesponsor_mg'] = 'اسپانسر ها';

function litesponsor_mg(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"litesponsor_mg_list" => "لیست اسپانسر ها",
		"litesponsor_mg_form" => "ثبت اسپانسر جدید",
	);
	listmaker_tabmenu($menu,$url);
}


