<?

function stash_template__index_or_etc(){
	if( _PAGE==1 ){
		return "index";
	} else {
		return "etc";
	}
}