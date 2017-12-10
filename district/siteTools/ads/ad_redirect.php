<?php

  require('../../config.php');
  
  if ($_GET['id']) {
    $res = mysql_query("SELECT url FROM `advertisements` WHERE id = {$_GET['id']}");
    $ad = mysql_fetch_object($res);
    
    $res = mysql_query("INSERT INTO `ad_clicks` SET `ad_id` = {$_GET['id']}, `ip` = '".$_SERVER['REMOTE_ADDR']."'");
    
    header("Location: {$ad->url}");
  }

?>
