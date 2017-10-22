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

class Model
{
    public $databases;

    public function __construct()
    {

        $this->db = \Front\Db::instance();
    }

    public function load($storage = 'default')
    {
        $this->db->load($storage);

        return $this;
    }

    public function getList($sql)
    {
        return $this->select($sql);
    }

    public function __call($method, $params)
    {
        return call_user_func_array([$this->db, $method], $params);
    }

}