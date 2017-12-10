<?php
	session_start();
	if($_POST){
		$array = $_POST;
	} else {
			die("You must Access this file through a form.");
	}
	if ($_POST['token'] !== $_SESSION['token']) {  
    	die('Your submission was not processed, please try again.');
	}else{
	$to = "TitoJacksonForBoston@gmail.com";
	
	$subject = 'Tito Jackson for Boston: Website Sidebar Inquiry';
	$fake_adminemail = 'noreply@titojackson.com';
	$fake_name ='Tito Jackson for Boston';
	
	$name = $_POST['name'];
	$email = trim( $_POST['email'] );
	$comments = $_POST['comments'];
	
	$todayis = date("l, F j, Y, g:i a");
	
	$body = "Date: $todayis\n\n\n From: $name\n\n\n E-Mail: $email\n\n\n Message: $comments";
	
	mail($to, $subject, $body);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tito Jackson - Thank You</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta name="author" content="Transmyt Marketing http://transmyt.com" />
    
    <style type="text/css">
		.container{ font-family: Arial, Helvetica, sans-serif; margin: 45px auto 0; width: 480px; text-align: center; }
	</style>
</head>

<body>
<div class="container">
     <h1><img src="../media/images/thankyou.jpg" alt="Tito Jackson for Boston - Thank You" /></h1>
     <p>Thank you for your comments!</p>
</div><!-- end container -->

</body>
</html>