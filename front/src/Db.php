<?php
/**
 * FrontPHP  [文件描述]
 *
 * @category PHP
 *
 * @version  Release: 1.0.0
 *
 * @author   lru <lru@ximahe.cn>
 *
 */
namespace Front;

use Front\Interfaces\Dbdriver;

class Db implements Dbdriver
{
    private static $__instance;

    public static function getInstance()
    {
        if(!isset(self::$__instance))
        {
            self::$__instance = new self();
        }
        return self::$__instance;
    }
    public function connect($config = [], $name = false)
    {
        print_r('database.this.is.connect,config is ');
        print_r($config);
    }
    public function query($sql)
    {

    }
    public function execute($sql)
    {

    }
    public function count($sql)
    {

    }
    public function errorinfo()
    {

    }
    public function beginTransaction()
    {

    }
    public function commit()
    {

    }
    public function rollBack()
    {

    }
}