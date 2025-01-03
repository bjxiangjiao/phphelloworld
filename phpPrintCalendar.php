<?php
function printCalendar($year, $month) {
    // 检查输入的有效性
    if (!checkdate($month, 1, $year)) {
        die('Invalid date.');
    }

    // 获取该月的第一天是星期几 (0-6, 0 表示星期天)
    $firstDay = date('w', mktime(0, 0, 0, $month, 1, $year));

    // 使用 checkdate() 和循环来确定该月有多少天
    for ($numDays = 28; !checkdate($month, $numDays + 1, $year); ++$numDays);

    // 输出表头
    echo "<table border='1'>";
    echo "<tr><th colspan='7'>{$year} 年 {$month} 月</th></tr>";
    echo "<tr>
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
          </tr>";

    // 开始填充日历
    $dayOfWeek = 0;
    echo "<tr>";
    for ($i = 0; $i < $firstDay; $i++) {
        echo "<td></td>";
        $dayOfWeek++;
    }

    for ($day = 1; $day <= $numDays; $day++) {
        echo "<td>{$day}</td>";
        $dayOfWeek++;

        // 每七天换行
        if ($dayOfWeek % 7 == 0 || $day == $numDays) {
            echo "</tr>";
            if ($day < $numDays) {
                echo "<tr>";
            }
        }
    }

    // 填充最后一周空缺
    while ($dayOfWeek % 7 != 0) {
        echo "<td></td>";
        $dayOfWeek++;
    }

    echo "</table>";
}

// 使用示例：打印2023年4月的日历
printCalendar(2023, 4);
?>
