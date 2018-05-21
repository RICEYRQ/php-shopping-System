<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>进出货明细页面</title>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<h1 align="center">进出货明细</h1>
<div align="center">
    <?php
    ini_set('date.timezone','Asia/Shanghai');
    $t = time();
    ?>
    <input type="button" value="查看某月收支情况" name="register" style="height:30px;width:120px;" onclick="window.location.href='showInOut.php?month=<?php echo  date("Y-m", $t) ?>>'"/><br><br>
    <table border="1" align="center">
        <tr bgcolor="#DDDDDD">

            <td width="200" align="center">操作</td>
            <td width="200" align="center">商品名</td>
            <td width="200" align="center">商品数量</td>
            <td width="200" align="center">商品单价</td>
            <td width="200" align="center">时间</td>
        </tr>
        <?php
        require_once 'Pdo.php';

        $msyql_config=array(
            'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
            'username'=>'root',
            'password'=>'961208'
        );
        $mysql=new Pdo_db($msyql_config);
        $mysql->exec('set names utf8');
        $sql = "select * from message";
        $mysql->query($sql, true);
        $attr = $mysql->fetchAll();
        foreach($attr as $row){

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
    <br/><br/>
    <input type="button" value="返回" name="register" style="height:30px;width:80px;" onclick="window.location.href='Choose.html'"/>
</div>
</body>
</html>