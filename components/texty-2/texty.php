<?

# jalal7h@gmail.com
# 2016/05/21
# Version 2.0

# get or put template content
# something like tab__temp, but only for message templates
# 

function texty( $name , $update=null ){
	
	if( $update ){
		
		if(! $rs0 = dbq(" SELECT * FROM `texty` WHERE `name`='$name' LIMIT 1 ") ){
			e(__FUNCTION__." : ".__LINE__);
		
		} else if( dbn($rs0)==1 ){ // update
			
			foreach( $update as $i => $v ){
				$v = trim($v);
				if( in_array( $i , ['title','content'] ) ){
					$set_query[] = " `$i`='$v' ";
				}
			}
			if( sizeof($set_query) ){
				$set_query = implode(', ', $set_query);
				if(! dbq(" UPDATE `texty` SET $set_query WHERE `name`='$name' LIMIT 1 ") ){
					e(__FUNCTION__." : ".__LINE__);
				}
			}
		
		} else { // insert
			$title = trim($update['title']);
			$content = trim($update['content']);
			if(! dbq(" INSERT INTO `texty` (`name`,`title`,`content`) VALUES ('$name','$title','$content') ") ){
				e(__FUNCTION__." : ".__LINE__);
			}
		}
	}
	
	if(! $rs = dbq(" SELECT * FROM `texty` WHERE `name`='$name' LIMIT 1 ") ){
		e(__FUNCTION__." : ".__LINE__);
	
	} else if( dbn($rs)!=1 ){
		e(__FUNCTION__." : ".__LINE__." , texty $name not defined");
	
	} else {
		$rw = dbf($rs);
		return [ $rw['title'], $rw['content'] ];
	}

	return false;
}
