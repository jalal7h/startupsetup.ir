<?

function litesponsor_mg_form(){

	?><div id="litesponsor_mg_form"><?

	echo lmfo([
		'table' => 'litesponsor' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func=litesponsor_mg_list',
		'name' => 'sForm' ,
		'method' => 'post' ,
		'switch' => 'do',
	]);

	echo lmfe([
		
		"<hr><br>",
		
		['text:name*','inDiv'],
		['url:link*','inDiv'],
		['file:image','inDiv'],

		"<br><hr><br>",

		['submit:ثبت','inDiv'],

	]);

	echo lmfc();

	?></div><?
}


