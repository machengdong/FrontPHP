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
    /**
     * @var $__instance
     *
     */
    private static $__instance;

    /**
     * @desc 设置使用缓存场景
     *
     * @param string $name
     * @return mixed
     */
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

    /**
     * @desc 使用默认缓存场景
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([self::instance(),$name],$arguments);
    }

}
