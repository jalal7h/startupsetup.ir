<?

function stash_management_form(){
	
	if(! $id = $_REQUEST['id'] ){
		;//
	} else if(! $rw = table("item", $id) ){
		e(__FUNCTION__,__LINE__);
	}

	echo lmfo([
		'table' => 'item@' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp']."_list",
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
	]);


	echo lmfe([
		
		['text:website_name','inDiv'],
		['url:website*','inDiv'],
		

		['text:name','inDiv'],
		'<div></div>',

		'<hr>',

		['select:filter_lang', 'option'=>cat_display('filter_lang') , 'inDiv'],
		['select:filter_money', 'option'=>cat_display('filter_money') , 'inDiv'],

		['select:filter_platform', 'option'=>cat_display('filter_platform') , 'inDiv'],
		['text:pin','inDiv'],

		'<hr>',

		['select:cat_id', 'option'=>cat_display('cat') , 'inDiv'],
		['select:sponsor_id'=>$rw['sponsor_id'] , 'option'=>listmaker_option("users",$condition=" AND `permission`<2 ",$returnArray=true) , 'inDiv'],

		['text:memo', 'inDiv'],
		['text:kw', 'inDiv'],
		
		['textarea:brief', 'inDiv'],
		['textarea:desc', 'inDiv'],

		'<hr>',

		"<div style='width: 100%;'>
			<span style='display: inline-block; width: 49%'>سایز استاندارد آیکن 150x150 پیکسل</span>
			<span>سایز استاندارد تصویر زمینه 970x470 پیکسل</span>
		</div>",

		['file:stash_icon', 'inDiv'],
		['file:stash_screenshot', 'inDiv'],

		'<hr>',
		['submit:ثبت.stash_button.bgSameAsBG','inDiv'],

	]);

	echo lmfc();

}




