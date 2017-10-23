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
namespace Front\Driver\db;

use Front\Interfaces\Dbdriver;

class Mysqli implements Dbdriver
{
    public  $conn;

    public static $resource;

    public function __construct($conf = [], $name = false)
    {
        $this->config = $conf;
    }

    public function connect($conf = [], $name = false)
    {
        $iden = md5(serialize($conf));

        if(!isset(self::$resource[$iden]) || true === $name)
        {
            self::$resource[$iden] = mysqli_connect($conf['db_host'],$conf['db_user'],$conf['db_pass'],$conf['db_name']);
        }
        return self::$resource[$iden];

    }

    private function __get_conn()
    {

       return $this->conn = $this->connect($this->config);

    }

    public function select($sql)
    {
        if($result = $this->execute($sql))
        {
            $data = [];
            while ($row = mysqli_fetch_assoc($result))
            {
                $data[] = $row;
            }
            mysqli_free_result($result);
            return $data;
        }
        return false;
    }
    public function execute($sql)
    {
        if(!is_resource($this->conn))
        {
            $this->__get_conn();
        }

        if($result = mysqli_query($this->conn,$sql))
        {
            return $result;
        }
        return false;
    }
    public function count($sql)
    {
        $sql = preg_replace(array(
            '/(.*\s)LIMIT .*/i',
            '/^select\s+(.+?)\bfrom\b/is'
        ),array(
            '\\1',
            'select count(*) as c from'
        ),trim($sql));
        $row = $this->select($sql);
        if($row)return intval($row[0]['c']);
        return false;
    }
    public function errorinfo()
    {
        return true;
    }
    public function beginTransaction()
    {
        return true;
    }
    public function commit()
    {
        return true;
    }
    public function rollBack()
    {
        return true;
    }
}