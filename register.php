<?php
/**
 * Created by PhpStorm.
 * User: riceyrq
 * Date: 2018/5/21
 * Time: 16:23
 */
require_once 'Pdo.php';
$msyql_config=array(
    'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
    'username'=>'root',
    'password'=>'961208'
);
$mysql=new Pdo_db($msyql_config);
$name = $_POST["name"];
$pas1 = $_POST["pas"];
$pas2 = $_POST["pas2"];
$sql = "select password from manager where name='{$name}'";
$result = $mysql->query($sql, true);
$n = $mysql->fetch();

if ($n[0] !== null){
    echo "<script language=\"JavaScript\">alert(\"当前用户名已被注册\");history.back();</script>";
    exit();
}

if ($name == ""){
    echo "<script language=\"JavaScript\">alert(\"用户名不能为空\");history.back();</script>";
    exit();
}


if ($pas1 != $pas2){
    echo "<script language=\"JavaScript\">alert(\"两次密码不一致，请重新输入\");history.back();</script>";
    exit();
}
else{
    $sql2 = "insert into manager (name, password) values('$name', '$pas1')";
    $mysql->exec($sql2);
    header("Location: login.html");
}
