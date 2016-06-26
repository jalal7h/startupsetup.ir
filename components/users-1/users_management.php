<?
$GLOBALS['cmp']['users_management'] = 'کاربران';

// -spi-

function users_management(){
	
	switch($_REQUEST['do']){
		case 'login':
			users_management_login();
			break;
		case 'remove':
			users_management_remove();
			break;
	}


	$list['query'] = " SELECT * FROM `users` WHERE `permission`='0' ORDER BY `id` DESC ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&do=login&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['addnew_url'] = false;
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&do=remove&id=".$rw["id"]';
	$list['remove_prompt'] = '"آیا مایل به حذف  کاربر هستید?"';
	
	$list['list_array'] = array(
		
		#
		# avatar
		array( "head" => "عکس" , "picture" => '$rw[\'profile_pic\']' ),
		
		#
		# username
		array( "head" => "نام کاربر" , "content" => '"<span title=\'".$rw[\'username\']."\'>".$rw["name"]."</span>"' , "attr" => array( "width" => "200px" , "align" => 'right' , "dir" => "rtl") ),
		
		#
		# username
		array( "head" => "تعداد آیتم" , "content" => 'dbr(dbq("SELECT COUNT(*) FROM `item` WHERE `user_id`=\'".$rw[\'id\']."\' "),0,0)." آیتم"' , "attr" => array( "width" => "200px" , "align" => 'center' , "dir" => "rtl") ),
	);

	if( is_component("billing") ){

		#
		# payments
		$list['list_array'][] = array( "head" => "پرداخت" , "content" => 'number_format(intval(dbr(dbq(" SELECT SUM(`cost`) FROM `billing_invoice` WHERE `uid`=\'".$rw[\'id\']."\' AND `date`>0 AND `method`!=\'wallet\' "),0,0)))." تومان"' , "attr" => array( "align" => 'right',"dir" => "rtl") );
		
		# 
		# credit
		$list['list_array'][] = array( "head" => "اعتبار" , "content" => 'number_format(billing_userCredit($rw["id"]))." تومان"' , "attr" => array( "align" => 'right',"dir" => "rtl") );
	}

	$list['paging_select'] = array(
		'gender' => "<option value=''>جنسیت</option><option value='1'>مذکر</option><option value='2'>مونث</option>",
	);

	$list['search'] = array("name","username","address");

	echo "<div class='".__FUNCTION__."_wrapper'>";
	echo listmaker_list($list);
	echo "</div>";

}

