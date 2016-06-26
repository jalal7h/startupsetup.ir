<?

# jalal7h@gmail.com
# 2016/05/12
# Version 1.1

function is_column( $table, $column ){
	
	if( $table=="" or $column=="" ){
		return '';
	}

	if(! $rs = dbq(" DESCRIBE `$table` ") ){
		e(__FUNCTION__,__LINE__, 'there is no table named as '.$table);
	
	} else while( $rw = dbf($rs) ){
		$field_array[] = $rw['Field'];
	}

	if( is_array($column) ){
		foreach ($column as $i => $this_column) {
			if(! in_array($this_column, $field_array) ){
				return false;
			}
		}
		return true;

	} else if(! sizeof($field_array) ){
		e(__FUNCTION__,__LINE__, 'there is no column in '.$table);

	} else if( in_array($column, $field_array) ){
		return true;
	}

	return false;
}

