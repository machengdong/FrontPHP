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
            $this->table_name = strtolower(substr($name,strrpos($name,'\\')+1));
        }

        if(!$this->databases)
        {
            $this->databases = Db::instance();
        }
    }


    public function table($table_name = null)
    {
        $this->table_name = $table_name;
        return $this;
    }

    public function load($storage = 'default',$name = false)
    {
        $this->databases->load($storage,$name);
        return $this;
    }

    public function getList($cols = '*',$filter = [],$offset = 0,$limit = PHP_INT_MAX,$orderby = null)
    {
        return $this->databases->table($this->table_name)->where($filter)->limit($limit,$offset)->order($orderby)->get($cols);
    }

    public function getRow($cols = '*',$filter = [])
    {
        $result = $this->getList($cols,$filter,0,1);
        if(!empty($result) && isset($result[0])) return $result[0];
        return [];
    }

    public function __call($method, $params)
    {
        return call_user_func_array([$this->databases, $method], $params);
    }

}