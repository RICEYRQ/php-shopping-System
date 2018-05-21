<?php
/**
 * Created by PhpStorm.
 * User: riceyrq
 * Date: 2018/5/21
 * Time: 18:08
 */
require_once 'Pdo.php';
$msyql_config=array(
    'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
    'username'=>'root',
    'password'=>'961208'
);
$mysql=new Pdo_db($msyql_config);
$name = $_POST["name"];
$num = $_POST["num"];
$price = $_POST["price"];
$sql = "select productnum  from products where productname ='{$name}'";
$result = $mysql->query($sql, true);
$n = $mysql->fetch();
if ($n[0] !== null){
    $num1 = $n[0] - $num;
    $sql2 = "update  products set productnum ='{$num1}' where productname  = '{$name}'";
    $mysql->exec($sql2);
}
$t = time();
$in = "出货";
$sql3 = "insert into message (inorout , productname , productnum , price , time ) values('$in', '$name', '$num', '$price', '$t')";
$mysql->exec($sql3);
header("Location: showProduct.php");