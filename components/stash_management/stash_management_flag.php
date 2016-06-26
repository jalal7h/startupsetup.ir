<?

function stash_management_flag(){

	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw = table('item',$id) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		if( $rw['flag']==1 ) {
			;// its already activated, and its going to be disabled

		} else if( $rw['notification_sent']==1 ){
			;// notification already sent, or its saved by admin
		
		} else {
			
			dbs( 'item', ['notification_sent'=>'1'], ['id'] );
			
			$rw_users = table( 'users', $rw['user_id'] );

			texty_msg( 
				$rw_users['username'], 
				'stash_management_flag_user_msg', 
				[	'item_id'=>$id,
					'item_name'=>$rw['name'],
					'user_name'=>$rw_users['name'],
					'item_link'=>stash_item_link($rw)
				]
			);

		}

		listmaker_flag( "item" );

	}

}

