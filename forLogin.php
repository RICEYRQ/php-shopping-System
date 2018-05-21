<?php
/*echo $_POST["uid"];
echo phpinfo();*/
require_once 'Pdo.php';
$msyql_config=array(
    'dsn'=>'mysql:host=127.0.0.1;dbname=shopsys',
    'username'=>'root',
    'password'=>'961208'
);
$mysql=new Pdo_db($msyql_config);
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];

$sql = "select password from manager where name='{$uid}'";


//执行sql语句
$result = $mysql->query($sql, true);
$n = $mysql->fetch();
$mysql->close();
if($uid !="" && $pwd !="")
{
    if ($n[0] == null){
        echo "<script language=\"JavaScript\">alert(\"用户名不存在\");history.back();</script>";
        exit();
    }else if($n[0]==$pwd)//判断从数据库中找到的密码和用户输入的密码是不是一样。
    {
        //echo "登陆成功";
        //header("location:main.php");//如果相等局跳转

        //echo "ok";
        session_start();
        $_SESSION['name'] = $uid;
        header("Location: Choose.html");

    }
    else
    {
       // echo "用户名或密码错误";//如果不相等就出现提示
        echo "<script language=\"JavaScript\">alert(\"密码错误\");history.back();</script>";
        exit();
    }
}
else//如果用户名或者密码不输入弹出的信息
{
    //echo "用户名或密码不能为空";
    echo "<script language=\"JavaScript\">alert(\"用户名或密码不能为空\");history.back();</script>";
    exit();
}
//这样写的优点就是不管用户名怎么写，密码就是固定的密码。验证两个密码是不是一样。
//这种方法还会有个bug就是用户名和密码都输入错误也能登陆，因为数据库中没有改用户名就会输出null，密码输错了也会返回null，正好会匹配上。这样就在外面再加上一个if判断输入的内容是不是空的，如果是空的就弹出提示信息。
