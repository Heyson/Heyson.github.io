<?php defined( 'INDEX' ) or exit( 'Direct Access to this location is not allowed.' ); ?>

<?php
#
#	02-09-2008 (v1.1)
#	Federico Baccaro
#	info@federicobaccaro.com.ar
#

class calendar
{
	var $days = array( 'SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT' );
	var $months = array( 'JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER' );
	var $events = array();
	var $url = '?';

	function show( $time = false )
	{
		if ( !$time )
			$time = time();

		global $database;

		# MONTH CALLED
		$today = date( 'j', $time );
		$monthNr = date( 'n', $time );
		$yearNr = date( 'Y', $time );
		$daysQty = date( 't', $time );
		$firstday = date( 'w', mktime(0, 0, 0, $monthNr, 1, $yearNr) );
		$monthName = $this->months[$monthNr-1];

		# NEXT & PREV MONTHS
		$time =  mktime(0, 0, 0, $monthNr + 1, 1, $yearNr);
		$nextMonthNr = date( 'm', $time );
		$nextYearNr = date( 'Y', $time );
		$time =  mktime(0, 0, 0, $monthNr - 1, 1, $yearNr);
		$prevMonthNr = date( 'm', $time );
		$prevYearNr = date( 'Y', $time );

		# INIT
		$cal  = "\r".'<table class="calendar" cellspacing="0">'."\n";
		$cal .= '	<tr class="control">'."\n";
		$cal .= '		<td colspan="7">
                <a href="'. $this->url .'year='. $prevYearNr .'&month='. $prevMonthNr .'" class="left">&nbsp;</a>
                <span class="title-white">'. $monthName .' '. $yearNr .'</span>
                <a href="'. $this->url .'year='. $nextYearNr .'&month='. $nextMonthNr .'" class="right">&nbsp;</a>
                </td>'."\n";
		$cal .= '	</tr>'."\n";
		$cal .= '	<tr class="names">'."\n";

		# NAMES
		foreach ( $this->days as $day )
			$cal .= '		<td>'. $day .'</td>'."\n";

		$cal .= '	</tr>'."\n";
		$cal .= '	<tr class="numbers">'."\n";

		# BLANKS
		for ( $i = 0; $i < $firstday; $i++ )
			$cal .= '		<td class="blank">&nbsp;</td>'."\n";

		# DAYS
		$temp = $firstday;
		$tempYear = date( 'Y' );
		$tempMonth =  date( 'n' );
		$tempDay =  date( 'j' );
		for	( $i = 1; $i <= $daysQty; $i++) {

      unset($day_items, $day);
      $temp %= 7;
      //$day = $i;

      if ( $temp == 0 )
         $cal .= '	</tr><tr class="numbers">'."\n";

			if ( in_array( $i, $this->events ) ) {

				$sql = "SELECT * FROM events WHERE site_name = '".SITE."' AND MONTH(date) = $monthNr AND DAYOFMONTH(date) = $i AND YEAR(date) = $yearNr";
				$data = $database->query( $sql );

        // loop through each event
				while($row = mysql_fetch_array( $data )) {

				  # IMAGE
				  $showimage = '';
				  //if ( $row['image'] )
				  //	$showimage = '<img src="content/events/'. $row['image'] .'" width="122" height="157" />';


          $img_url = 'http://pashaboston.com/site_admin/images/event_images/'.SITE.'/'. $row['image_file'];
          $size = getimagesize($img_url);
          $img_x = $size[0];
          $img_y = $size[1];
          $showimage = '<img src="' . $img_url .'" />';

				  # GUEST LIST SIGN UP
          if ($row['guest_list'] == 'yes') {
            $signup_link = '<a href="?section=contact1&y='. $yearNr .'&m='. $monthNr .'&d='. $i .'" class="subtitle-lightblue">Sign Up For Guest List</a> | ';
          } else {
            $signup_link = '&nbsp;';
          }
				  if ( $yearNr < $tempYear ) { $signup_link = '&nbsp;'; }
				  elseif ( $yearNr == $tempYear )
				  {
					  if ( $monthNr < $tempMonth )
						  $signup_link = '&nbsp;';

					  elseif ( $monthNr == $tempMonth && $i < $tempDay )
						  $signup_link = '&nbsp;';
				  }

				  # TOOLTIP
          //$day  = '<div>'. $i .'</div>';
          $day .= '<div id="event_large">';
          $day .= '  <div id="tooltip">';
          $day .= '    <div id="pointer"></div>';
          $day .= '    <div id="top"></div>';
          $day .= '    <div id="data">';
          $day .= '      <div id="event_info">';
          $day .= '        <div id="day_title">'.date('F jS, Y',strtotime($yearNr.'-'.$monthNr.'-'.$i)).'</div><br class="clear" />';
          if ($row['image_file']) {
          $day .= '        <div id="image" style="width: '.$img_x.'px; height: '.$img_y.'px;">'. $showimage .'</div>';
          }
          $day .= '        <div id="info">';
          $day .= '          <span class="subtitle-white" style="font-size:14px">'. $row['title'] .'</span>';
          $day .= '          <hr style="margin-right:5px" />';
          $day .= '          <table width="100%" border="0" cellspacing="2" cellpadding="0">';
          $day .= '            <tr><td><span class="subtitle-gray">Music</span></td><td style="padding-left:7px">'. $row['music'] .'</td></tr>';
          $day .= '            <tr><td><span class="subtitle-gray">Cover</span></td><td style="padding-left:7px">'. $row['cover'] .'</td></tr>';
          $day .= '            <tr><td><span class="subtitle-gray">DJ(s)</span></td><td style="padding-left:7px">'. $row['dj'] .'</td></tr>';
          $day .= '            <tr><td><span class="subtitle-gray">Host</span></td><td style="padding-left:7px"><span class="subtitle-lightblue">'. $row['hosted'] .'</span></td></tr>';
          $day .= '          </table>';
          $day .= '          <div id="sharethis">';
          $day .= '            <script type="text/javascript" src="http://w.sharethis.com/widget/?tabs=web%2Cemail&amp;charset=utf-8&amp;style=default&amp;publisher=fb789862-ccef-476e-a42e-9247ecbe8632&amp;headerbg=%2378a1c1&amp;inactivebg=%23bfbfbf&amp;linkfg=%2378a1c1"></script>';
          $day .= '          </div>';
          $day .= '        </div>';
          $day .= '      </div>';
          $day .= '      <div id="more_info">'. $signup_link .'<a href="'. $row['more'] .'" target="_blank" class="subtitle-lightblue">More Information</a></div>';
          $day .= '    </div>';
          $day .= '    <div id="bottom"></div>';
          $day .= '  </div>';
          $day .= '</div>';

          $day_items[] = $day;
			  }
      }

			if ( $tempYear == $yearNr && $tempMonth == $monthNr && $tempDay == $i ) {
				$cal .= '		<td class="today"><div id="box"><div>'. $i .'</div>'. implode('',$day_items) .'</div></td>'."\n";
			} else if( $tempYear == $yearNr && $tempMonth == $monthNr && $tempDay > $i ) {
        $cal .= '   <td class="day_past"><div id="box"><div>'. $i .'</div>'. implode('',$day_items) .'</div></td>'."\n";
      }	else {
				$cal .= '		<td><div id="box"><div>'. $i .'</div>'. implode('',$day_items) .'</div></td>'."\n";
      }

			$temp++;

		}

		# BLANKS
		for ( $i = $temp; $i < 7; $i++ )
			$cal .= '		<td class="blank">&nbsp;</td>'."\n";

		# END
		$cal .= '	</tr>'."\n";
		$cal .= '</table>'."\n";
		echo $cal;
	}
}

?>