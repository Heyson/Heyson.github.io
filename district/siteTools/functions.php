<?php defined( 'INDEX' ) or exit( 'Direct Access to this location is not allowed.' ); ?>

<?php

function _htmlspecialchars( &$data, $quote_style = ENT_COMPAT )
{
	 $data = is_array( $data ) ?
		 array_map( '_htmlspecialchars', $data ) :
		 htmlspecialchars( $data, $quote_style );
}

function _stripslashes( &$data )
{
	 $data = is_array( $data ) ?
		 array_map( '_stripslashes', $data ) :
		 stripslashes( $data );
		 
	return $data;
}

function _addslashes( &$data )
{
	 $data = is_array( $data ) ?
		 array_map( '_addslashes', $data ) :
		 addslashes( $data );
	
	return $data;
}

function filterGlobals( &$data )
{
	if ( get_magic_quotes_gpc )
		$data = _stripslashes( $data );
	
	$data = _addslashes( $data );
	return $data;
}

function is_num( $num, $cant = '' )
{
	$filter = '/^[0-9]{1,'. $cant .'}$/';
	return preg_match( $filter, $num ) ? true : false;
}

function filesArray( $folder )
{
	if ( !file_exists( $folder ) )
		return false;
	
	$link = @opendir( $folder );
	if ( !$link )
		return false;
	
	$files = array();
	while( $file = @readdir( $link ) ) 
	{
		if ( $file == '.' || $file == '..' || $file == 'Thumbs.db' ) { continue; }
		if ( is_dir( $folder . $file ) ) { continue; }
		array_push( $files, $file );
	}
	
	@closedir( $link );
	if ( !$files )
		return false;
	
	return $files;
}

?>