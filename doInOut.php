<?php
/**
 * Created by PhpStorm.
 * User: riceyrq
 * Date: 2018/5/21
 * Time: 18:52
 */
ini_set('date.timezone','Asia/Shanghai');
$month = $_POST["month"];
$year = date("Y", time());
$ym = $year . "-" .$month;
header("Location: showInOut.php?month=$ym");