<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tito Jackson For Boston - Meet Tito</title>

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
        	<?php query_posts('pagename=the-issues'); ?>
                
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php
				function curPageURL() {
				 $pageURL = 'http';
				 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
				 $pageURL .= "://";
				 if ($_SERVER["SERVER_PORT"] != "80") {
				  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
				 } else {
				  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
				 }
				 return $pageURL;
				}
			?>
            <div class="tweetmeme_button">  
				<script type="text/javascript">  
                    tweetmeme_url = '<?php echo curPageURL(); ?>'; 
					tweetmeme_source = 'titojackson';
                </script>  
                <script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>  
            </div> <?php the_content(); ?>
            <?php endwhile; else: ?>
             <p>Content coming soon.</p>
            <?php endif; ?>
        </div><!-- /.colRgt -->
        
        <hr />
        
        <?php include('../includes/left-col.inc'); ?>
    </div><!-- end content-->
     
    <div class="clr push">&nbsp;</div>
     
</div><!-- end container -->

<?php include('../includes/footer.inc'); ?>
</body>
</html>