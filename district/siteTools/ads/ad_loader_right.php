<?php

  $adsRight = load_adsRight();
  foreach ($adsRight as $adRight) {
    $adRight_pri[$adRight->id] = ($adRight->priority * 1.5) - $adRight->cfreq;
  }

  // Set the ad to show by the one shown the least with the priority modifier
  arsort($adRight_pri);
  reset($adRight_pri);
  $keys = array_keys($adRight_pri);
  $adRight_id = $keys[0];
  $adRight_to_show = $adsRight[$adRight_id];

  // Update its cfreq
  update_adRight($adRight_id,$adRight_to_show->cfreq);

  if ($adRight_to_show->code) {
    $adRight_output = $adRight_to_show->code;
  } else
  if ($adRight_to_show->file) {
    if ($adRight_to_show->type != 'swf') {
      $adRight_output = "<a href=\"/sitetools/ads/ad_redirect.php?id={$adRight_id}\" target=\"_blank\"><img src=\"http://pashaboston.com/site_admin/files/ads/{$adRight_to_show->file}\" border=\"0\" /></a>";
    } else {
      $adRight_output = "object";
    }
  } else {
    $adRight_output = '';
  }

  echo $adRight_output;


  function update_adRight($adRight_id,$cfreq) {
    if ($cfreq >= 10) {
      $res = mysql_query("UPDATE `advertisements` SET `cfreq` = 0 WHERE `site_name` = 'pasha' ");
    } else {
      $cfreq++;
      $res = mysql_query("UPDATE `advertisements` SET `cfreq` = {$cfreq} WHERE id = {$adRight_id}");
    }
    $res = mysql_query("INSERT INTO `ad_impressions` SET `ad_id` = {$adRight_id}, `ip` = '".$_SERVER['REMOTE_ADDR']."'");
  }

  function load_adsRight() {
    $res = mysql_query("SELECT * FROM `advertisements` WHERE `site_name` = 'pasha' AND `position` = \"right\" AND active = 'y' ORDER BY rand() LIMIT 1");
    for (;$row=mysql_fetch_object($res);) {
      $ret[$row->id] = $row;
    }
    return $ret;
  }

?>