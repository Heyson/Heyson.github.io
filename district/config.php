<?php

# CONFIG
define( 'INDEX', true );
define( 'LANG', 'en_US' );
define( 'DEBUG_MODE', false );
define( 'SITE', 'rumor' );

# DIRS
define( 'ROOT', dirname(__FILE__) . '/' );
define( 'TOOLS', 'sitetools/' );
define( 'CONTENT', 'content/' );
define( 'INCLUDES', 'includes/' );

# DATABASE
define( 'DB_HOST', 'db008.zabco.net' );
define( 'DB_USER', 'dba7776' );
define( 'DB_PASS', '795wj930' );
define( 'DB_NAME', 'db7776' );

# MODULES
if ( ! @include( TOOLS .'lang/'. LANG .'.php' ) )
	die( 'LANG module is missing' );
	
if ( ! @include( TOOLS .'email/email.php' ) )
	die( 'EMAIL module is missing' );
	
if ( ! @include( TOOLS .'database/database.php' ) )
	die( 'DATABASE module is missing' );

if ( ! @include( TOOLS .'functions.php' ) )
	die( 'FUNCTIONS library is missing' );

if ( ! @include( TOOLS .'router.php' ) )
	die( 'ROUTER library is missing' );

# FILTERS
if ( $_POST )
	filterGlobals( $_POST );

if ( $_GET )
	filterGlobals( $_GET );
	
?>