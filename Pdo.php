<?php
/**
 * Created by PhpStorm.
 * User: riceyrq
 * Date: 2018/5/21
 * Time: 15:35
 */
class Pdo_db{
    protected $pdo;
    protected $res;
    protected $config;

    function __construct($config){
        $this->config = $config;
        $this->connect();
    }

    public function connect(){
        try{
            $this->pdo = new PDO($this->config['dsn'], $this->config['username'], $this->config['password']);
            $this->pdo->query("set names utf8");
        }catch (Exception $exception){
            echo '数据库连接失败,详情: ' . $exception->getMessage () . ' 请在配置文件中数据库连接信息';
            exit ();
        }
    }

    public function close(){
        $this->pdo = null;
    }

    public function query($sql, $return=false){
        $res = $this->pdo->query($sql);
        if ($res){
            $this->res = $res;
        }
        if ($return){
            return $res;
        }
    }

    public function exec($sql, $return=false){
        $res = $this->pdo->exec($sql);
        if ($res){
            $this->res = $res;
        }
        if ($return){
            return $res;
        }
    }

    public function fetchAll(){
        return $this->res->fetchAll();
    }

    public function fetch(){
        return $this->res->fetch();
    }
}