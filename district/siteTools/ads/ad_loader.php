<?php

  $ads = load_ads();
  foreach ($ads as $ad) {
    $ad_pri[$ad->id] = ($ad->priority * 1.5) - $ad->cfreq;
  }

  // Set the ad to show by the one shown the least with the priority modifier
  arsort($ad_pri);
  reset($ad_pri);
  $keys = array_keys($ad_pri);
  $ad_id = $keys[0];
  $ad_to_show = $ads[$ad_id];

  // Update its cfreq
  update_ad($ad_id,$ad_to_show->cfreq);

  if ($ad_to_show->code) {
    $ad_output = $ad_to_show->code;
  } else
  if ($ad_to_show->file) {
    if ($ad_to_show->type != 'swf') {
      $ad_output = "<a href=\"/sitetools/ads/ad_redirect.php?id={$ad_id}\" target=\"_blank\"><img src=\"http://pashaboston.com/site_admin/files/ads/{$ad_to_show->file}\" border=\"0\" /></a>";
    } else {
      $ad_output = "object";
    }
  } else {
    $ad_output = '';
  }

  echo $ad_output;


  function update_ad($ad_id,$cfreq) {
    if ($cfreq >= 10) {
      $res = mysql_query("UPDATE `advertisements` SET `cfreq` = 0 WHERE `site_name` = 'pasha' ");
    } else {
      $cfreq++;
      $res = mysql_query("UPDATE `advertisements` SET `cfreq` = {$cfreq} WHERE id = {$ad_id}");
    }
    $res = mysql_query("INSERT INTO `ad_impressions` SET `ad_id` = {$ad_id}, `ip` = '".$_SERVER['REMOTE_ADDR']."'");
  }

  function load_ads() {
    $res = mysql_query("SELECT * FROM `advertisements` WHERE `site_name` = 'pasha' AND `position` = \"footer\" AND active = 'y' ");
    for (;$row=mysql_fetch_object($res);) {
      $ret[$row->id] = $row;
    }
    return $ret;
  }

?>
