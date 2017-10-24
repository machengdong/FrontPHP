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

    private static $__database;

    public $storage;

    public static function instance()
    {
        if(!isset(self::$__instance))
        {
            self::$__instance = new self();
        }
        return self::$__instance;
    }

    public function load($storage = 'default',$name = false)
    {
        if(!isset(self::$__database[$storage]))
        {
            $config = Config::get("database.connection");
            if(!array_key_exists($storage,$config))
            {
                //TODO ERROR HANDLE ...
            }
            $conn_config = $config[$storage];
            $driver_class = \Front\Driver\db\Mysqli::class;
            self::$__database[$storage] = new $driver_class($conn_config);
        }
        $this->storage = $storage;
        return $this;
    }

    public function __call($method, $params)
    {
        //TODO There is no use in this step
        if(!isset($this->storage) && !self::$__database['default']) $this->load();

        return call_user_func_array([self::$__database[$this->storage], $method], $params);
    }

    public function insert(&$data,$replace = false)
    {
        $sql = $this->preHandleInsert($data,$replace);
        $result = self::$__database[$this->storage]->execute($sql);
        return $result;
    }

    public function preHandleInsert(array $data,$replace)
    {
        $cols = $value = null;
        foreach ((array)array_keys($data) as $v)
        {   /** 加上`符号，避免关键字 */
            $cols   .= (strpos($v,'`') === false ? "`{$v}`" : $v) .',';
            $value  .=  "'".$data[$v]."',";
        }
        $cols  = substr($cols,0,-1);
        $value = substr($value,0,-1);
        $sql = ($replace ? 'REPLACE' : 'INSERT') ." INTO {$this->table_name}({$cols}) VALUES ($value);";
        return $sql;
    }

    public function update(&$data,$filter)
    {
        $sql = $this->preHandleUpdate($data,$filter);
        $result = self::$__database[$this->storage]->execute($sql);
        return $result;
    }

    public function preHandleUpdate(array $data,$filter)
    {
        $object = $where = null;
        foreach ((array)$data as $k=>$v)
        {
            $object .= " {$k} = '{$v}' " . ',';
        }
        $object = substr($object,0,-1);
        $sql = " UPDATE {$this->table_name} SET $object WHERE ".$this->__filter($filter);

        return $sql;
    }

    public function delete(array $filter = [])
    {
        $sql = $this->preHandleDelete($filter);
        $result = self::$__database[$this->storage]->execute($sql);
        return $result;
    }

    public function preHandleDelete(array $filter)
    {
        $sql = "DELETE FROM {$this->table_name} WHERE ".$this->__filter($filter);
        return $sql;
    }

    private function __filter($filter)
    {
        $where = [1];
        foreach ((array)$filter as $k=>$v)
        {
            if(!empty($v) && is_array($v))
            {
                $where[] = $k . ' IN (' . implode(',',$v).')';
            }
            elseif ($k === '__sql__' && !empty($v))
            {
                $where[] = $v;
            }
            elseif (strpos($k,'|') === false && !empty($v))
            {
                $where[] = $k . " = '{$v}'";
            } else //todo
            { }
        }
        return implode(' AND ',$where);
    }


    public function table($table_name = null)
    {
        $this->table_name = $table_name;

        return $this;
    }

    public function where(array $data)
    {
        $this->where = $data;
        return $this;
    }

    public function limit($limit = PHP_INT_MAX,$offset = 0)
    {
        $this->offset = $offset;
        $this->limit  = $limit;
        return $this;
    }

    public function order($orderby)
    {
        $this->orderby = $orderby;
        return $this;
    }

    public function get($cols = '*')
    {
        $sql = $this->preHandleSelect($cols);
        if(!isset($this->storage) && !self::$__database['default']) $this->load();
        echo "<br/>".$sql."<br/>";
        $result = self::$__database[$this->storage]->select($sql);
        return $result;
    }

    public function preHandleSelect($cols)
    {

        $filter = isset($this->where) ? $this->where : [];
        $sql  = "SELECT {$cols} FROM {$this->table_name} WHERE ".$this->__filter($filter);

        if(isset($this->orderby)) $sql .= " ORDER BY " .$this->orderby;

        if(isset($this->offset) && isset($this->limit))
            $sql .= " LIMIT {$this->offset},{$this->limit} ";
        else
            $sql .= " LIMIT 0,".PHP_INT_MAX;

        //die($sql);
        return $sql;

    }
}