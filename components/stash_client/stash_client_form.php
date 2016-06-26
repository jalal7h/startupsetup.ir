<?

function stash_client_form(){
	
	if(! $id = $_REQUEST['id'] ){
		;//
	} else if(! $rw = table("item", $id) ){
		e(__FUNCTION__,__LINE__);
	}

	echo lmfo([
		'table' => 'item@' ,
		'action' => './?page='.$_REQUEST["page"].'&do='.$_REQUEST['do'], // must define
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do1',
	]);

	echo lmfe([
		
		['text:website_name','inDiv'],
		['url:website*','inDiv'],
		
		['text:name','inDiv'],
		'<div></div>',

		['cat:cat_id','cat_name'=>'cat','inDiv'],
		['select:sponsor_id','option'=>listmaker_option("users",$condition=" AND `permission`<2 ",$returnArray=true),'inDiv'],

		['text:memo','inDiv'],
		['text:kw','inDiv'],

		['textarea:brief','inDiv'],
		['textarea:desc','inDiv'],

		'<hr>
		<div style="width: 100%;">سایز استاندارد آیکن 150x150 پیکسل</div>',

		['file:stash_icon', 'inDiv'],
		['file:stash_screenshot', 'inDiv'],

		'<hr>',

		['submit:ثبت.stash_button.bgSameAsBG','inDiv'],

	]);

	echo lmfc();

}

