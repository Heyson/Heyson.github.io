<?php 
	session_start();
	define('WP_USE_THEMES', false);
	require('../blog/wp-blog-header.php');
	$thisPage="getinvolved"; 
	$_SESSION['token'] = uniqid(md5(microtime()), true);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tito Jackson For Boston - Get Involved</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta name="author" content="Transmyt Marketing http://transmyt.com" />
    <meta name="Description" content="Tito Jackson - Boston City Councillor-at-Large" />
    <meta name="Keywords" content="Tito Jackson City Coucilor, City Councilor Tito Jackson, Tito Jackson City Coucillor, City Councillor Tito Jackson, Boston City Councilor at Large, Boston City Counsel, 2009 Boston City Coucil, Boston election, 2009 elections, Allston, Back Bay, Bay Village, Beacon Hill, Brighton, Charlestown, Chinatown, Dorchester, Downtown, East Boston, Fenway, Hyde Park, Jamaica Plain, Mattapan, MIssion Hill, North End, Roslindale, Roxbury, South Boston, South End, West End, West Roxbury, Tito Jackson, Boston Massachusetts" />
    
    <link rel="stylesheet" type="text/css" media="screen" href="../scripts/css/global.css" />
    <link rel="stylesheet" type="text/css" media="print" href="../scripts/css/print.css" />
    
    <!-- Favorite Icon -->
	<link rel="icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    
    <script language="javascript" type="text/javascript" src="../scripts/js/global.js"></script>
    
</head>

<body>
<div class="accessibility"><a href="#navigation">Skip to page navigation</a> | <a href="#main">Skip to content</a> | <a href="#foot">Skip to page information</a><hr /></div>

<div class="container">
	<?php include('../includes/header.inc'); ?>
    	</div>
    </div><!-- end header -->
    
    <hr />
    
    <div id="content">
    	<a name="main"></a>
        <div class="fltRgt">
            <h2>Get Involved</h2>
            <p><form action="http://www.titojacksonforboston.com/thanks-for-getting-involved/" method="post" name="InvolveForm" onsubmit="return ValidateInvolveForm();" target="_blank">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>" />
                <p><label for="fullname">Full Name (required):</label><br /> <input id="fullname" name="fullname" type="text" /></p>
                
                <p><label for="emailaddress">E-mail Address (required):</label><br /> <input id="emailaddress" name="emailaddress" type="text" /></p>
                
                <p><label for="address">Address:</label><br /> <input id="address" name="address" type="text" /></p>
                
                <p><label for="phone">Phone Number:</label><br /> <input id="phone" name="phone" type="text" /></p>
                
                <p><strong class="label">How Can You Get Involved? (check all that apply)</strong><br />
                
                <input id="canvasing" name="check[]" type="checkbox" value="Canvasing" /> <label class="check" for="canvasing">Canvasing</label><br />
                <input id="doorKnocking" name="check[]" type="checkbox" value="Door Knocking" /> <label class="check"  for="doorKnocking">Door Knocking</label><br />
                <input id="houseParty" name="check[]" type="checkbox" value="House Party" /> <label class="check"  for="houseParty">House Party</label><br />
                <input id="officeHelp" name="check[]" type="checkbox" value="Office Help" /> <label class="check"  for="officeHelp">Office Help</label><br />
                <input id="paradesStandOut" name="check[]" type="checkbox" value="Parades/Stand Out" /> <label class="check"  for="paradesStandOut">Parades/Stand Out</label><br />
                <input id="phoneCalls" name="check[]" type="checkbox" value="Phone Calls" /> <label class="check"  for="phoneCalls">Phone Calls</label><br />
                <input id="yardWindowSign" name="check[]" type="checkbox" value="Yard/Window Sign" /> <label class="check"  for="yardWindowSign">Yard/Window Sign</label><br />
                <input id="allOfTheAbove" name="check[]" type="checkbox" value="All of the Above" /> <label class="check"  for="allOfTheAbove">All of the Above</label><br />
                <input id="other" name="check[]" type="checkbox" value="Other" /> <label class="check"  for="other">Other (please specify in comments)</label></p>
                
                <p><label for="message">Message/Comments:</label><br />
                <textarea cols="5" id="message" name="message" rows="5"></textarea></p>
                
                <p><input class="btn" type="submit" value="Submit" /></p>
			</form></p>
        </div><!-- /.colRgt -->
        
        <hr />
        
        <?php include('../includes/left-col.inc'); ?>
    </div><!-- end content-->
     
    <div class="clr push">&nbsp;</div>
     
</div><!-- end container -->

<?php include('../includes/footer.inc'); ?>
</body>
</html>