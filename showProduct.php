<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>商品清单页面</title>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<h1 align="center">商品清单</h1>
<div align="center">
    <input type="button" value="添加新商品" name="register" style="height:30px;width:80px;" onclick="window.location.href='addNewProduct.html'"/><br><br>
    <table border="1" align="center">
        <tr bgcolor="#DDDDDD">

            <td width="200" align="center">商品名</td>
            <td width="200" align="center">商品数量</td>
            <td width="200" align="center">操作一</td>
            <td width="200" align="center">操作二</td>
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
        $sql = "select * from products";
        $mysql->query($sql, true);
        $attr = $mysql->fetchAll();
        foreach($attr as $row){

            ?>
            <tr>

                <td><?php echo $row[1]?></td>
                <td><?php echo $row[2]?></td>
                <td> <a href="addProduct.php?id=<?php echo $row[0] ?>"> 进货 </a></td>
                <td> <a href="delProduct.php?id=<?php echo $row[0] ?>"> 卖出 </a></td>
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