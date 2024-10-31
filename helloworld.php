<?php
//设置北京时间为默认时区
date_default_timezone_set('PRC');
// 获取昨天的日期
$yesterday = date('Y-m-d', strtotime('-1 day'));

// 获取昨天零点的时间戳
$startTimestamp = strtotime($yesterday . ' 00:00:00');

// 获取昨天二十四点的时间戳（即今天零点）
$endTimestamp = strtotime($yesterday . ' 23:59:59');

// 输出结果
echo "昨天零点的时间戳: " . $startTimestamp . "\n";
echo "昨天二十四点的时间戳: " . $endTimestamp . "\n";

