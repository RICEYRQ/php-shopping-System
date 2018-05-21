<?php
/**
 * Created by PhpStorm.
 * User: riceyrq
 * Date: 2018/5/21
 * Time: 16:47
 */
require_once 'Pdo.php';
$msyql_config=array(
    'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
    'username'=>'root',
    'password'=>'961208'
);
$mysql=new Pdo_db($msyql_config);
session_start();
$name = $_SESSION['name'];
$oldPas = $_POST["oldpas"];
$pas1 = $_POST["pas"];
$pas2 = $_POST["pas2"];
$sql = "select password from manager where name='{$name}'";
$result = $mysql->query($sql, true);
$n = $mysql->fetch();
if ($n[0] !== $oldPas){
    echo "<script language=\"JavaScript\">alert(\"原密码输入错误\");history.back();</script>";
    exit();
}
if ($pas1 != $pas2){
    echo "<script language=\"JavaScript\">alert(\"两次密码不一致，请重新输入\");history.back();</script>";
    exit();
}
else{
    $sql2 = "update  manager set password='{$pas1}' where name = '{$name}'";
    $mysql->exec($sql2);
    header("Location: login.html");
}