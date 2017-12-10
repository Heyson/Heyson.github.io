<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Private-Event</title>

<link rel="stylesheet" type="text/css" href="file://///Transworld/share/Clients/Pasha Entertainment/district boston/css/global.css" />
	<script src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/siteTools/functions.js" type="text/javascript"></script>
    
    <script src="http://app.mobilestorm.com/stun/Includes/quickFunctions.js" language="javascript" type="text/javascript"></script>
	<script src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/siteTools/mobilestorm.js" type="text/javascript"></script>
	<script src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/siteTools/swfobject_modified.js" type="text/javascript"></script>
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
                <li class="inactive"><a href="#">District</a></li>
                <li class="inactive"><a href="#">Menu</a></li>
                <li class="inactive"><a href="#">Events</a></li>
                <li class="inactive"><a href="#">Calendar</a></li>
                <li class="inactive"><a href="#">Photo Gallery</a></li>
                <li class="inactive"><a href="#">News</a></li>
                <li class="last inactive"><a href="#">Memberships</a></li>
                <li class="last fltRgt"><a href="#">Contact Us</a></li>
          
            
            </ul>
        </div><!-- end header -->
        
        <hr />
        
        <div class="clr" id="content"> 
            
            <ul class="clr" id="subNav">
                <li><a href="#">Reservations</a></li>
                <li><a href="#">Guest List</a></li>
                <li><a href="#">Private Functions & Corporate Events</a></li>
                <li><a href="#">General Contact</a></li>
             </ul>
            
            <div class="colThin">
          
          
          <div style="width:429px; float:left; margin-right: 10px;">

	<?php

	# MAILING
	if ( $_POST['email'] && isset( $_POST['email'] ) )
	{
		$c_name = $_POST['firstname'];
		$c_lastname = $_POST['lastname'];
		$c_email = trim( $_POST['email'] );
		$c_phone = $_POST['phone'];
		$c_people = $_POST['people'];
		$c_reserve = $_POST['reserve'];
		$c_comments = $_POST['comments'];
		$c_day = $_POST['date_day'];
		$c_month = $_POST['date_month'];
		$c_year = $_POST['date_year'];
		$c_eventday = strtolower( date( 'l', mktime( 0, 0, 0, $c_month, $c_day, $c_year ) ) );

    $sql = "
            INSERT INTO `contact_submissions` SET
              `site_name` = '".SITE."',
              `form` = 'guest_list',
              `first_name` = '".mysql_real_escape_string(strip_tags($c_name))."',
              `last_name` = '".mysql_real_escape_string(strip_tags($c_lastname))."',
              `email` = '".mysql_real_escape_string(strip_tags($c_email))."',
              `phone` = '".mysql_real_escape_string(strip_tags($c_phone))."',
              `number_guests` = '".mysql_real_escape_string(strip_tags($c_people))."',
              `reserve_table` = '".mysql_real_escape_string($c_reserve == 'Yes' ? 'y' : 'n')."',
              `reserve_date` = '".mysql_real_escape_string(date('Y-m-d', mktime( 0, 0, 0, $c_month, $c_day, $c_year )))."',
              `comments` = '".mysql_real_escape_string(strip_tags($c_comments))."'
          ";
    mysql_query($sql);

		switch ( $c_eventday )
		{
			case 'sunday': 		$mailto = 'sunday@districtboston.com'; break;
			case 'monday': 		$mailto = 'monday@districtboston.com'; break;
			case 'tuesday': 	$mailto = 'tuesday@districtboston.com'; break;
			case 'wednesday': 	$mailto = 'wednesday@districtboston.com'; break;
			case 'thursday': 	$mailto = 'thursday@districtboston.com'; break;
			case 'friday': 		$mailto = 'friday@districtboston.com'; break;
			case 'saturday': 	$mailto = 'saturday@districtboston.com'; break;
		}

		$subject = 'Guest List and Reservations';
		$fake_adminemail = 'noreply@districtboston.com';
		$fake_name ='District Boston Website';

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '. $fake_name .' <'. $fake_adminemail .">\r\n";
		$headers .= 'Reply-To: '. $c_email . "\r\n";
		$headers .= 'X-Priority: 1' . "\r\n";
		$headers .= 'X-MSMail-Priority: High' . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();

		$message  = '<html><head><title></title></head><body>';
		$message .= '<h3>'. $subject .'</h3>';
		$message .= '<ol>';
		$message .= ' <li><b>First Name:</b> '. $c_name .'</li>';
		$message .= ' <li><b>Last Name:</b> '. $c_lastname .'</li>';
		$message .= ' <li><b>Email:</b> '. $c_email .'</li>';
		$message .= ' <li><b>Cell Phone:</b> '. $c_phone .'</li>';
		$message .= ' <li><b>Date of Reservation:</b> '. ucfirst( $c_eventday ) .' ('. $c_month .'/'. $c_day .'/'.$c_year .')</li>';
		$message .= ' <li><b>Number of People:</b> '. $c_people .'</li>';
		$message .= ' <li><b>Reserve a Table:</b> '. $c_reserve .'</li>';
		$message .= ' <li><b>Comments:</b> '. $c_comments .'</li>';
		$message .= '</ol>';
		$message .= '</body></html>';

		$email_OK = false;

		ini_set('sendmail_from', $fake_adminemail );
		if ( @mail( $mailto, $subject, $message, $headers) )
			$email_OK = true;
	}



	# SHOW "CONTACT THANKS"
	if ( $email_OK ):

		include( ROOT.INCLUDES .'contact_thankyou1.php' );

	# SHOW FORM
	else:

	?>

	<img src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/images/icon_guestlist.gif" alt="GUEST LIST" />
	<img src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/images/icon_phone.gif" alt="CONTACT" hspace="7" />
    <span class="title-white">GUEST LIST AND RESERVATIONS</span>

    <p class="text-gray">
    	Please use the form below only if you want to be placed on the house guest list, if you need information about VIP tables  or to submit a request for a table reservation on a specific date.  Please note that all requests are forwarded to a host who will contact you by phone in order to discuss availability, pricing and any special requirements you may have.  <b>Kindly note that a minimum of 24 hours is required for all requests to be processed.</b>  All requests must be confirmed by telephone.</p>

    <p>
        Fields marked with a <span class="title-lightblue">*</span> are required.
        We repect your privacy. All informaion is 100% secure.
    </p>

    <form method="post" action="" style="margin-bottom:-30px;" name="contactform">

	<table style="margin:10px 0 25px;">
		<tr valign="bottom">
			<td>
				<label>First Name <span class="title-lightblue">*</span></label>
				<div>
					<input type="text" class="text" name="firstname" value="" />
				</div>
			</td>
			<td style="padding-left:12px;">
                <label>Last Name <span class="title-lightblue">*</span></label>
                <div>
                    <input type="text" class="text" name="lastname" value="" />
                </div>
			</td>
		</tr>
		<tr valign="bottom">
			<td>
                <label>Email Address <span class="title-lightblue">*</span></label>
                <div>
                    <input type="text" class="text" name="email" value="" />
                </div>
			</td>
			<td style="padding-left:12px;">
                <label>Cell Phone Numer <span class="title-lightblue">*</span></label>
                <div>
                    <input type="text" class="text" name="phone" value="" />
                </div>
			</td>
		</tr>
        <tr valign="bottom">
        	<td colspan="2">

            	<label>Date of Reservation</label>
                <span>
                    <div style="width:130px;float:left;margin-right:16px;">
                        <select name="date_month" style="width:130px;border:1px solid #111;">
                        	<?php
							$this_month = date( 'n' ); // month number
							$get_month = $_GET['m'];
							$selected = is_num( $get_month, 2 ) ? $get_month : $this_month;
							$months = array( '', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
							for( $i=1; $i<=12; $i++ ): ?>
                            <option value="<?php echo $i; ?>"<?php echo $i == $selected ? ' selected="selected"' : ''; ?>><?php echo $months[$i]; ?></option>
							<?php endfor; ?>
                        </select>
                    </div>
                    <div style="width:40px;float:left;margin-right:16px;">
                        <select name="date_day" style="width:40px;border:1px solid #111;">
                        	<?php
							$today = date( 'd' );
							$get_day = $_GET['d'];
							$selected = is_num( $get_day, 2 ) ? $get_day : $today;
							for( $i=1; $i<=31; $i++ ): ?>
                            <option<?php echo $i == $selected ? ' selected="selected"' : ''; ?>><?php echo $i; ?></option>
							<?php endfor; ?>
                        </select>
                    </div>
                    <div style="width:60px;float:left;">
                        <select name="date_year" style="width:60px;border:1px solid #111;">
                        	<?php
							$this_year = date( 'Y' );
							$get_year = $_GET['y'];
							$selected = is_num( $get_year, 4 ) ? $get_year : $this_year;
							?>

                            <option<?php echo $this_year == $selected ? ' selected="selected"' : ''; ?>><?php echo $this_year; ?></option>
                            <option<?php echo $this_year+1 == $selected ? ' selected="selected"' : ''; ?>><?php echo $this_year+1; ?></option>
                            <option<?php echo $this_year+2 == $selected ? ' selected="selected"' : ''; ?>><?php echo $this_year+2; ?></option>
                        </select>
                    </div>
				</span>
            </td>
        </tr>
		<tr valign="bottom">
			<td>
				<label>Number of People</label>
				<div>
					<input type="text" class="text" name="people" value="" />
				</div>
			</td>
			<td style="padding-left:12px;">
                <label>Reserve a Table</label>
                <div style="width:194px;">
                    <select name="reserve" style="width:194px;border:1px solid #111;height:23px">
                        <option>Select</option><option>Yes</option><option>No</option>
                    </select>
				</div>
			</td>
		</tr>
        <tr>
        	<td colspan="2">
                <label>
                    Special Comments <span class="title-lightblue">|</span>
                    Requests <span class="title-lightblue">|</span>
                    Questions
                </label>

                <div style="width:97%;margin-bottom:10px;">
                    <div class="textarea">
                        <textarea name="comments" rows="4"></textarea>
                    </div>
                </div>

                <input type="image" name="guestform" value="1" src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/images/button_submit.jpg" />
            </td>
        </tr>
	</table>

    </form>

	<script language="JavaScript" type="text/javascript">

		// VALIDATOR
		var frmvalidator  = new Validator("contactform");
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("firstname","req","Please enter your Name");
		frmvalidator.addValidation("firstname","maxlen=60",	"Max length for FirstName is 60");
		frmvalidator.addValidation("firstname","alpha_s","Name can contain alphabetic chars only");

		frmvalidator.addValidation("lastname","req","Please enter your Last Name");
		frmvalidator.addValidation("lastname","maxlen=100","For Last Name, Max length is 100");
		frmvalidator.addValidation("lastname","alpha_s","Last Name can contain alphabetic chars only");

		frmvalidator.addValidation("email","maxlen=50","For Email, Max length is 50");
		frmvalidator.addValidation("email","req","Please enter your Email");
		frmvalidator.addValidation("email","email","Enter a valid Email Address");

		frmvalidator.addValidation("phone","req","Please enter your Phone Number");
		frmvalidator.addValidation("phone","maxlen=50","For Phone, Max length is 50");
		//frmvalidator.addValidation("phone","numeric","Only digits allowed in Phone Numer");

		frmvalidator.addValidation("reserve","dontselect=0","Please select whether or not you want to reserve a table");
    </script>

    <?php endif; # END SHOW FORM ?>

</div>

<div id="sidebar-right">

	<?php

	$sql  = "SELECT * FROM contact_info";
	$data = $database->query( $sql );

	$arr = array();
	while ( $row = mysql_fetch_array( $data ) )
		$arr[$row['area']] = trim( $row['content'] );

	_stripslashes( $arr );
	$address = $data ? $arr['address'] : $database->errorMsg;
	$phone = $data ? $arr['phone'] : $database->errorMsg;
	$latitude = $data ? $arr['googlemap_lat'] : '40.721014' ;
	$longitude = $data ? $arr['googlemap_lon'] : '-73.992405';

	$oh_sun = $arr['openinghours_sun'];
	$oh_mon = $arr['openinghours_mon'];
	$oh_tue = $arr['openinghours_tue'];
	$oh_wed = $arr['openinghours_wed'];
	$oh_thu = $arr['openinghours_thu'];
	$oh_fri = $arr['openinghours_fri'];
	$oh_sat = $arr['openinghours_sat'];

	$oh_sun = $oh_sun == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_sun .'</span>' :
		'<span class="subtitle-white">'. $oh_sun .'</span>';
	$oh_mon = $oh_mon == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_mon .'</span>' :
		'<span class="subtitle-white">'. $oh_mon .'</span>';
	$oh_tue = $oh_tue == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_tue .'</span>' :
		'<span class="subtitle-white">'. $oh_tue .'</span>';
	$oh_wed = $oh_wed == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_wed .'</span>' :
		'<span class="subtitle-white">'. $oh_wed .'</span>';
	$oh_thu = $oh_thu == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_thu .'</span>' :
		'<span class="subtitle-white">'. $oh_thu .'</span>';
	$oh_fri = $oh_fri == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_fri .'</span>' :
		'<span class="subtitle-white">'. $oh_fri .'</span>';
	$oh_sat = $oh_sat == 'AVP' ?
		'<span class="subtitle-lightblue">'. $oh_sat .'</span>' :
		'<span class="subtitle-white">'. $oh_sat .'</span>';

	?>

	<img src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/images/rumor2.gif" alt="RUMOR" />

    <br /><br />
	<span class="subtitle-white">Address</span><br />
    <span class="title-gray"><?php echo $address; ?></span>

    <br /><br />
	<span class="subtitle-white">Phone Number</span><br />
    <span class="title-lightblue"><?php echo $phone; ?></span>

    <br /><br />

	<!-- GOOGLE MAP -->
    <iframe width="170" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/?ie=UTF8&amp;ll=42.350746,-71.066075&amp;spn=0.000989,0.001717&amp;z=16&amp;output=embed&amp;s=AARTsJqzARj-Z8VnW5pkPMLMmZbqrJcYpw"></iframe>
	<!-- MAP END -->

    <br /><br />
	<span class="subtitle-white">Hours Of Operation</span><br />
    <table width="100%">
    	<tr>
			<td><span class="subtitle-gray">Sunday</span></td>
			<td align="right"><?php echo $oh_sun; ?></td>
		</tr>
    	<tr>
			<td><span class="subtitle-gray">Monday</span></td>
			<td align="right"><?php echo $oh_mon; ?></td>
		</tr>
    	<tr>
			<td><span class="subtitle-gray">Tuesday</span></td>
			<td align="right"><?php echo $oh_tue; ?></td>
		</tr>
    	<tr>
			<td><span class="subtitle-gray">Wednesday</span></td>
			<td align="right"><?php echo $oh_wed; ?></td>
		</tr>
    	<tr>
			<td><span class="subtitle-gray">Thursday</span></td>
			<td align="right"><?php echo $oh_thu; ?></td>
		</tr>
    	<tr>
			<td><span class="subtitle-gray">Friday</span></td>
			<td align="right"><?php echo $oh_fri; ?></td>
		</tr>
    	<tr>
			<td><span class="subtitle-gray">Saturday</span></td>
			<td align="right"><?php echo $oh_sat; ?></td>
		</tr>
	</table>

    <br />
	<img src="file://///Transworld/share/Clients/Pasha Entertainment/district boston/images/icon_arrow.jpg" alt="EVENTS" style="margin:0 5px -1px 0" />
    <a href="file://///Transworld/share/Clients/Pasha Entertainment/district boston/?section=events" class="title-lightblue" title="EVENTS">EVENTS CALENDAR</a>

</div>
          
          
          	</div>
        </div><!--end content-->


        <div id="footer">

            <div class="fltLft">
                <p>180 &nbsp;Lincoln St. &nbsp;Boston,&nbsp; 02111&nbsp; |&nbsp; 617.426.0180</p>
                <span class="transmyt"><a href="http://www.transmyt.com" title="transmyt" target="_blank">Transmyt</a></span>
            </div>

            <div class="fltRgt">
            	<div class="banner">
                </div>
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
} catch(err) {}
swfobject.registerObject("FlashID");
</script>
</body>

</html>