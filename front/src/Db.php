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
}