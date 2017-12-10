<?php
# 
#	08-01-2008 (v1.0)
#	Federico Baccaro
#	info@federicobaccaro.com.ar
#

defined( 'INDEX' ) or die( 'Access restricted' );
# REQS: LANG & EMAIL modules

class database
{
	var $lnk;
	var $error = false;
	var $errorMsg;
	var $sysMsg;
	var $querys;
	
	function database()
	{
		global $text;
		
		if ( !defined('DB_HOST') ) 
			$this->error( $text->DB_ERR_DEFHOST );			
			
		elseif ( !defined('DB_USER') )
			$this->error( $text->DB_ERR_DEFUSER );
			
		elseif ( !defined('DB_PASS') )
			$this->error( $text->DB_ERR_DEFPASS );
		
		else
		{	
			$this->lnk = @mysql_connect( DB_HOST, DB_USER, DB_PASS );
		
			if ( !$this->lnk )
				$this->error( $text->DB_ERR_AXXDENIED, mysql_error() );

			elseif ( !defined('DB_NAME') )
				$this->error( $text->DB_ERR_DEFNAME );
			
			elseif ( !@mysql_select_db( DB_NAME, $this->lnk ) )
				$this->error( $text->DB_ERR_NAME, mysql_error() ); 
		}
	}
	
	function query( $sql = false )
	{
		global $text;
		
		if ( !$sql )
			$this->error( $text->DB_ERR_DEFQUERY );
						
		$r = @mysql_query( $sql , $this->lnk );
		$this->querys++;
		
		if ( $r )
			return $r;
			
		else {
			$mysqlerr = htmlspecialchars( mysql_error() );
			$report = array( 'QUERY' => htmlspecialchars( $sql ), 'SERVER: ' => $mysqlerr );
			email::report( $report );
			$this->error( $text->DB_ERR_QUERY, $mysql );
			return false; }
	}
	
	function showcols( $table )
	{
		$t = $this->query( "SHOW COLUMNS FROM ". $table );
		$arr = array();
		if ( $t )
		{
			while ( $col = mysql_fetch_array( $t ) )
				array_push( $arr, $col[0] );
				
			return $arr;		
		}
	}
	
	function error( $msg, $sysmsg = false )
	{
		$this->error = true;
		$this->errorMsg = $msg;
		
		if ( $sysmsg )
			$this->sysMsg = $sysmsg;
		else
			$this->sysMsg = $msg;
	}
}

$database = new database;

if ( $database->error ) {
	email::report( $database->sysMsg );
	DEBUG_MODE ? die( $database->sysMsg ) : die( $database->errorMsg ); }
	
?>