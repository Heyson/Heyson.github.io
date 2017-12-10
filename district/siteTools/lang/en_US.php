<?php
# 
#	08-01-2008
#	Federico Baccaro
#	info@federicobaccaro.com.ar
#

defined( 'INDEX' ) or die( 'Access restricted' );

class lang
{
	# DATA BASE
	var $DB_ERR_DEFHOST 		= 'Database HOST is not defined';
	var $DB_ERR_DEFUSER 		= 'Database USERNAME is not defined';
	var $DB_ERR_DEFPASS 		= 'Database PASSWORD is not defined';
	var $DB_ERR_DEFNAME 		= 'Database NAME is not defined';
	var $DB_ERR_DEFQUERY 		= 'Database QUERY is not defined';
	var $DB_ERR_AXXDENIED 		= 'Access to Database denied';
	var $DB_ERR_NAME 			= 'Database NAME is wrong';
	var $DB_ERR_QUERY 			= 'Database QUERY is wrong';
	
	# USER
	var $USER_ERR_PASS 			= 'Invalid PASSWORD';
	var $USER_ERR_NAME 			= 'Invalid USERNAME';
	var $USER_ERR_EMAIL			= 'Invalid EMAIL';
	var $USER_ERR_STATUS		= 'Access suspended';
	var $USER_ERR_NOPASS		= 'Enter your PASSWORD';
	var $USER_ERR_NONAME		= 'Enter your USERNAME';
	var $USER_ERR_DUPLICATED	= 'The USERNAME already exists';
	var $USER_ERR_WRONGNAME		= 'The USERNAME does not exists';
	var $USER_ERR_WRONGPASS		= 'The PASSWORD is wrong';
	var $USER_ERR_PRIVILEGES 	= 'Insufficient privileges';
	var $USER_ERR_DELYOURSELF 	= 'You cannot REMOVE yourself';
	var $USER_ERR_DELMASTER 	= 'MASTER users cannot be removed';
	var $USER_ERR_CONFIRMATION 	= 'The PASSWORD and the CONFIRMATION does not match';
	
	# FILES
	var $ERR_XML_WRITE			= 'Cannot write the XML file';
	var $ERR_XML_MISSING		= 'The XML file is missing';
	
	# ERRORS
	var $ERR_GRAL_DIE			= 'The system is down, please try again later';
	var $ERR_GRAL_ITEM			= 'Invalid ITEM';
}

# REF http://dev.mysql.com/doc/refman/5.0/en/error-messages-server.html
$text = new lang;

?>