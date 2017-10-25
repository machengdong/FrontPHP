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

    public static function instance($store = 'default')
    {
        if(!isset(self::$__instance))
        {
            self::$__instance = new self($store);
        }
        return self::$__instance;
    }

    public function __construct($store)
    {

    }

    public static function boot()
    {
        $class = Config::get('cache.driver');
        if(class_exists($class))
        {
            if(!isset(self::$init))
            {
                self::$storage = new $class;
                self::$init = true;
            }
        }
    }

    public static function set($name, $value = '')
    {
        isset(self::$init) or self::boot();
        return self::$storage->set($name, $value);
    }

    public static function get($name = '')
    {
        isset(self::$init) or self::boot();
        return self::$storage->get($name);
    }

    public static function delete($name)
    {
        isset(self::$init) or self::boot();
        self::$storage->delete($name);
    }

    public static function clear()
    {
        isset(self::$init) or self::boot();
        self::$storage->clear();

    }
}
