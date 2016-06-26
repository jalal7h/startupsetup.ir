<?
$GLOBALS['do_action'][] = 'dynamic_colors_first';

function dynamic_colors_first(){

	$the_first_color = the_list_of_dynamic_colors( $only_first=true );
	header("Content-type: text/css; charset: UTF-8");

?>

body {
	background-color: <?=$the_first_color?>;
}
.bgSameAsBG,
.bghSameBG:hover {
	background-color: <?=$the_first_color?>;
}
a,
.clSameAsBG,
.clhSameBG:hover {
	color: <?=$the_first_color?>;
}
.stash_button ,
input[type=submit].stash_input {
	background-color: <?=$the_first_color?>;
}

.fbcm form.form > input[type="submit"] ,
a:hover ,
.stash_item_list .r > .info > .number_of_comments:hover {
	color: <?=$the_first_color?>;
}

.upvote_form.clicked ,
.upvote_form.clicked:hover {
	color: <?=$the_first_color?> !important;
}

<?
}

