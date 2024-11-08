<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>证书有效期列表</title>
    <style>
        *{margin: 0;padding: 0;}
        body{margin: 20px;}
        table{width: 100%;border-collapse:collapse;margin: 20px 0;}
        table thead th,
        table tbody td{
            text-align: left;
            padding:10px;
            border:1px solid #ccc
        }

        .thead th,
        .tbody td{
            text-align: left;
            padding:10px;
            border:1px solid #ccc

        }
    </style>
</head>
<body>
<div>有效期剩余10天为红色日期</div>
<!--完整表格-->
<table >
    <thead>
    <tr>
        <th>域名</th>
        <th>过期时间</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($data)){
        foreach ($data as $key=>$val){
    ?>
    <tr>
        <td><?php echo $val['url']; ?></td>
        <td>
            <?php echo $val['exp_date'];if($val['exp_day']){  ?>
            <span style="margin-left: 10px;<?php if($val['count_down']==1){?>color: red<?php }?>">剩余<?php echo $val['exp_day']?>天</span>
            <?php }else {?>
            <span style="margin-left: 10px;color: red">已过期</span>
            <?php }?>
        </td>
    </tr>
    <?php
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>
