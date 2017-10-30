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

class Cache
{
    protected static $init;

    protected static $storage;

    private static $__instance;

    public static function instance($name = 'default')
    {
        if(!isset(self::$__instance[$name]))
        {
            $config =  Config::get('cache');
            $class = $config['driver'][$config['storage'][$name]['driver']];
            self::$__instance[$name] = new $class();
        }
        return self::$__instance[$name];
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        return call_user_func_array([self::instance(),$name],$arguments);
    }

}
