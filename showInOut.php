<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>收支明细页面</title>
</head>
<body>
<form action="doInOut.php" method="post"  enctype="multipart/form-data">
    <h1 align="center">收支明细</h1>
    <div align="center">
        <?php
        ini_set('date.timezone','Asia/Shanghai');
        $YandM = explode("-", $_GET["month"]);
        require_once 'Pdo.php';
        $msyql_config=array(
            'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
            'username'=>'root',
            'password'=>'961208'
        );
        $year = intval($YandM[0]);
        $month = intval($YandM[1]);
        $t1 = mktime(0, 0, 0, $month, 1, $year);
        $mm = $month + 1;
        $yy = $year;
        if ($mm > 12) {
            $mm = 1;
            $yy = $yy + 1;
        }
        $t2 = mktime(0, 0, 0, $mm, 1, $yy);
        $mysql=new Pdo_db($msyql_config);
        $sql = "select *  from message where time >='{$t1}' and time < '{$t2}'";
        $mysql->query($sql, true);
        $n = $mysql->fetchAll();
        require_once 'InOut.php';
        $inOut = new InandOut($n);
        $in = $inOut->inIs();
        $out = $inOut->outIs();
        $total = $inOut->totalIs();
        ?>
        该月进货花费：<input type="text" disabled="disabled" value="<?php echo $in ?>"><br/><br/>
        该月卖货利润：<input type="text" disabled="disabled" value="<?php echo $out ?>"><br/><br/>
        该月收支总数：<input type="text" disabled="disabled" value="<?php echo $total ?>"><br/><br/>
     <table border="1" align="center">
        <tr bgcolor="#DDDDDD">

            <td width="200" align="center">操作</td>
            <td width="200" align="center">商品名</td>
            <td width="200" align="center">商品数量</td>
            <td width="200" align="center">商品单价</td>
            <td width="200" align="center">时间</td>
        </tr>
        <?php

        foreach($n as $row){

            ?>
            <tr>
                <td><?php echo $row[1]?></td>
                <td><?php echo $row[2]?></td>
                <td><?php echo $row[3]?></td>
                <td><?php echo $row[4]?></td>
                <td><?php echo date("Y-m-d H:i:s",$row[5]) ?></td>
            </tr>
            <?php
        }
        ?>
      </table>
        <input type="hidden" name="name" value="<?php echo $n[1]; ?>"><br><br>
        月份：<input type="number" name="month"  value="<?php echo $month?>" max="12" min="1">
        <input type="submit" value="确定"  id="save" name="save" style="height:30px;width:80px;"/>
        <br/><br/>
        <input type="button" value="返回" name="register" style="height:30px;width:80px;" onclick="window.location.href='showMessage.php'"/>
    </div>
</form>
</body>
</html>