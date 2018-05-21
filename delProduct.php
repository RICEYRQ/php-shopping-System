<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>卖货页面</title>
</head>
<body>
<form action="outProduct.php" method="post"  enctype="multipart/form-data">
    <h1 align="center">卖货</h1>
    <div align="center">
        <?php
        $id = $_GET["id"];
        require_once 'Pdo.php';
        $msyql_config=array(
            'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
            'username'=>'root',
            'password'=>'961208'
        );
        $mysql=new Pdo_db($msyql_config);
        $sql = "select *  from products where id ='{$id}'";
        $mysql->query($sql, true);
        $n = $mysql->fetch();
        ?>
        <input type="hidden" name="name" value="<?php echo $n[1]; ?>"><br><br>
        商品名：<input type="text" disabled="disabled" value="<?php echo $n[1]; ?>"><br/><br/>
        商品数量：<input type="number" name="num"  max="<?php echo $n[2]; ?>" min="1"> <br/><br/>
        单价：<input type="number" step="0.01" name="price" min="0.01"> <br/><br/>
        <input type="submit" value="确定"  id="save" name="save" style="height:30px;width:80px;"/>
        <input type="reset" value="重置" name="reset" style="height:30px;width:80px;">
        <br/><br/>
        <input type="button" value="返回" name="register" style="height:30px;width:80px;" onclick="window.location.href='showProduct.php'"/>
    </div>
</form>
</body>
</html>