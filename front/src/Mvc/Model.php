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
namespace Front\Mvc;

use Front\Config;
use Front\Db;

class Model
{
    public $databases;

    public $table_name;


    public function __construct()
    {
        if(!$this->table_name)
        {
            $name = get_class($this);
            $this->table_name = substr($name,strrpos($name,'\\')+1);
        }
    }


    public function table($table_name = null)
    {
        $this->table_name = $table_name;
        return $this;
    }

    public function getTableName()
    {
        return $this->table_name;
    }

    public function load($storage = 'default',$name = false)
    {
        Db::instance()->load($storage,$name);
        return $this;
    }

    public function getList($cols = '*',$filter = [],$offset = 0,$limit = PHP_INT_MAX,$orderby = null)
    {
        return [];
    }

    protected function _filter($filter)
    {
        $where = [1];
        foreach ((array)$filter as $k=>$v)
        {
           if(!empty($v) && is_array($v))
           {
               $where[] = $k . ' IN (' . implode(',',$v).')';
           }
        }
    }

    public function __call($method, $params)
    {
        return call_user_func_array([Db::instance(), $method], $params);
    }

}