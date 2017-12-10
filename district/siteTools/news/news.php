<?php defined( 'INDEX' ) or exit( 'Direct Access to this location is not allowed.' ); 
  
  // Load up the last 3 news items
  function get_news($num=false,$month=false,$year=false) {
    if ($year && $month) {
      $where_clause = " AND YEAR(`datetime`) = {$year} AND MONTH(`datetime`) = {$month} ";
    }
    if ($num) {
      $limit = " LIMIT {$num} ";
    }
    $sql = "SELECT * FROM `news_items` WHERE site_name = '".SITE."' AND `active` = 'y' AND CURRENT_TIMESTAMP() < `expire` {$where_clause} ORDER BY `datetime` DESC {$limit}";
    $res = mysql_query($sql);
    for(;$row = mysql_fetch_object($res);) {
      $news[] = $row;
    }
    return $news;
  }
  
  function get_total_news() {
    $sql = "SELECT count(id) as num FROM `news_items` WHERE site_name = '".SITE."' AND `active` = 'y' AND CURRENT_TIMESTAMP() < `expire`";
    $res = mysql_query($sql);
    $val = mysql_fetch_object($res);
    return $val->num;
  }
  
?>
