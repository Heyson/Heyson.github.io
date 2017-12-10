<?php ob_start(); ?>
<?php

//if ( ! @include( 'config.php' ) )
	//die( 'CONFIG file is missing' );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" /> 
	<title>.: District Lounge :.</title>
    <meta name="author" content="Transmyt Marketing http://transmyt.com" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
   
    
	<link rel="stylesheet" type="text/css" href="css/global.css" />
    <script src="siteTools/AC_RunActiveContent.js" type="text/javascript"></script>
	<script src="siteTools/functions.js" type="text/javascript"></script>
    
    <script src="http://app.mobilestorm.com/stun/Includes/quickFunctions.js" language="javascript" type="text/javascript"></script>
	<script src="siteTools/mobilestorm.js" type="text/javascript"></script>
   
    
</head>

<body>
<div class="accessibility"><a href="#navigation">Skip to navigation</a> | <a href="#foot">Skip to page information</a> <hr /></div>
<div class="container">
	<div class="contentContainer">
        <div id="header">
            <h1 class="fltLft"><a href="#" class="logo" title="Home"></a></h1>
            
            <div class="fltRgt">
                <ul class="headNav fltLft">
                    <li id="music"><a href="#" title="Launch Music Player" onclick="MM_openBrWindow('http://www.pashaboston.com/rumorplayer.php','pashamusic','scrollbars=no,width=39,height=39')">Launch District Music</a></li>
                    <li id="facebook"><a href="http://www.facebook.com/pages/Boston/PASHA/74053499639" target="_blank" title="Become A Fan On Facebook">Facebook</a></li>
                    <li id="twitter"><a href="http://twitter.com/pashaboston" target="_blank" title="Follow Us On Twitter">Follow Us On Twitter</a></li>
                </ul><!-- end #header.fltRgt .headNav.fltLft -->
                <div class="subscribe fltLft">
                    <form action="http://app.mobilestorm.com/stun/manageforms/addSubscriber.php" name="frm" method="post" onsubmit="return submitform()" enctype="multipart/form-data" target="_blank">
                    <input type="text" name="email" value="" />
                    <input id="submit" title="Sign Up for Emails And Event Announcements" type="submit" value="Sign Up for Emails And Event Announcements" />
                    <input type="hidden" name="formID" value="5187" />
                    <input type="hidden" name="weburl" value="1" />
                    <input type="hidden" name="isDedicatedClient" value='0' />
                    </form>
                </div> <!--end #header.fltRgt .subscribe-->
            </div><!-- end #header.fltRgt -->
            
            <hr />
            
            <a name="navigation"></a>
            <ul class="clr" id="nav">
                <li><a href="#">3D Tour</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">People</a></li>
                <li><a href="#">Event</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Photo Gallery</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact Us</a></li>
                <li class="last fltRgt"><a href="#">Memberships</a></li>
            </ul>
        </div><!-- end header -->
        
        <hr />
        
        <div class="clr" id="content">
        	<?php

            /* SITE CONTENT PAGES
            if ( !file_exists( INCLUDES.CONTENT_FILE ) || ! @include( INCLUDES.CONTENT_FILE ) )
                die( $text->ERR_GRAL_DIE );*/

            ?>
        </div><!--end content-->


        <div id="footer">

            <div class="fltLft">
                <p>180 &nbsp;Lincoln St. &nbsp;Boston,&nbsp; 02111&nbsp; |&nbsp; 617.426.0180</p>
                <span class="transmyt"><a href="http://www.transmyt.com" title="transmyt" target="_blank">Transmyt</a></span>
            </div>

            <div class="fltRgt">
            	<div class="banner"><?php /* @include( TOOLS. 'ads/ad_loader.php' ); */ ?> </div>
            </div>
        </div><!-- end footer -->
        
	</div><!-- end contentContainer-->
</div><!-- end container-->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6436074-5");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
<?php
    include_once 'replacePngTags.php';
    echo replacePngTags(ob_get_clean());
?>