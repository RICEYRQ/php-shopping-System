<?php
/**
 * Created by PhpStorm.
 * User: riceyrq
 * Date: 2018/5/21
 * Time: 18:42
 */
class InandOut{
    protected $nnn;
    protected $in;
    protected $out;
    protected $total;

    function __construct($n){
        $this->nnn = $n;
    }

    function inIs(){
        $this->in = 0;
        foreach ($this->nnn as $row){
            if ($row[1] === "进货"){
                $this->in += $row[3] * $row[4];
            }
        }
        return $this->in;
    }

    function outIs(){
        $this->out = 0;
        foreach ($this->nnn as $row){
            if ($row[1] === "出货"){
                $this->out += $row[3] * $row[4];
            }
        }
        return $this->out;
    }

    function totalIs(){
        return $this->out - $this->in;
    }
}