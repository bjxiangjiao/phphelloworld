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

// 设置时区，确保与您的服务器时区匹配
date_default_timezone_set('Asia/Shanghai');

// 获取上个月1号的日期
$lastMonthFirstDay = date("Y-m-01", strtotime("last month"));

// 获取这个月1号的日期
$thisMonthFirstDay = date("Y-m-01");

// 输出结果
echo "上个月1号: " . $lastMonthFirstDay . "\n";
echo "这个月1号: " . $thisMonthFirstDay . "\n";

