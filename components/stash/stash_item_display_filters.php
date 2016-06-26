<?

function stash_item_display_filters( $rw_item ){

	?>
	<div id="stash_item_display_filters">
		<?

		if( $rw_item['filter_money'] ){
			$filter_name = trim( cat_translate($rw_item['filter_money']) );
			echo "<a href=\""._URL."/tag/$filter_name\">#$filter_name</a>\n";
		}
		
		if( $rw_item['filter_platform'] ){
			$filter_name = trim( cat_translate($rw_item['filter_platform']) );
			echo "<a href=\""._URL."/tag/$filter_name\">#$filter_name</a>\n";
		}
		
		if( $rw_item['filter_lang'] ){
			$filter_name = trim( cat_translate($rw_item['filter_lang']) );
			echo "<a href=\""._URL."/tag/$filter_name\">#$filter_name</a>\n";
		}

		?>
	</div>
	<?

}

