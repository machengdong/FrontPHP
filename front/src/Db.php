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


final class Db
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