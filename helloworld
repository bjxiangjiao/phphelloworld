<?php
  
header("Content-type:text/html;charset=utf-8");
//设置北京时间为默认时区
date_default_timezone_set('PRC');
//输出当前时间
echo date("Y-m-d H:i:s",time()); //2016-08-11 10:30:32
//获得当日凌晨的时间戳
$today = strtotime(date("Y-m-d"),time());
echo '<br>';
echo $today; //1470844800
echo '<br>';
//验证当日凌晨的时间戳是否正确
echo date("Y-m-d H:i:s",$today); //2016-08-11 00:00:00
echo '<br>';
//当天的24点时间戳
$end = $today+60*60*24;
//验证当天的24点时间戳是否正确
echo date("Y-m-d H:i:s", $end); //2016-08-12 00:00:00
echo '<br>';
//获得指定时间的零点的时间戳
$time = strtotime('2014-06-06');
echo '<br>';
echo $time; //1401984000
echo '<br>';
//验证是否是指定时间的时间戳
echo date("Y-m-d H:i:s",$time); //2014-06-06 00:00:00
