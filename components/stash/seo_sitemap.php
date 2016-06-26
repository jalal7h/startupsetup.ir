<?

$GLOBALS['seo_sitemap'][] = array( 
	"query" => " SELECT
		*, `date`
		FROM `item` WHERE 1 ORDER BY `id` DESC LIMIT 10000 ",
	"link" => 'stash_item_link( $rw )'
);

