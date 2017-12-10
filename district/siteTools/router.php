<?php defined( 'INDEX' ) or exit( 'Direct Access to this location is not allowed.' ); ?>

<?php

unset( $section, $inc );
$section = $_GET['section'];

switch ( $section )
{
	case 'recurring1': 	$inc = 'recurring1.php'; break;
	case 'recurring2': 	$inc = 'recurring2.php'; break;
	case 'recurring3': 	$inc = 'recurring3.php'; break;
	case 'recurring4': 	$inc = 'recurring4.php'; break;
	case 'recurring5': 	$inc = 'recurring5.php'; break;
	case 'events': 		$inc = 'calendar.php'; break;
	case 'tour': 		$inc = 'tour.php'; break;
	case 'test':		$inc = 'contact_test.php'; break;
	case 'contact':		$inc = 'contact.php'; break;
	case 'contact1':	$inc = 'contact_1.php'; break;
	case 'contact2':	$inc = 'contact_2.php'; break;
	case 'contact3':	$inc = 'contact_3.php'; break;
	case 'contact4':	$inc = 'contact_4.php'; break;
	case 'gallery':		$inc = 'http://pashaboston.net/photogallery/index2.php?galleryid=3'; break;
	case 'videos':		$inc = 'videos.php'; break;
	case 'vuploads':	$inc = 'vuploads.php'; break;
	case 'news':		$inc = 'news.php'; break;
	case 'downloads':	$inc = 'downloads.php'; break;
  	case 'about':  		$inc = 'about.php'; break;
  	case 'people':  	$inc = 'people.php'; break;

	default: 			$inc = 'calendar.php'; break;
}

define( 'CONTENT_FILE', $inc );

?>