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


class App
{
    private static $__instance;

    public static function control($control)
    {
        if(!strpos($control,'control'))
        {
            return new \stdClass();
        }
        return $object = App::instance($control);
    }

    public static function apiAction($action)
    {
        if(!strpos($action,'apis'))
        {
            return new \stdClass();
        }
        return $object = App::instance($action);
    }

    public static function model($model)
    {
        if(!strpos($model,'model'))
        {
            return new \stdClass();
        }
        return $object = App::instance($model);
    }

    public static function input($name = null,$original = false)
    {
        if($original)
        {
            $data = file_get_contents("php://input");
        }else{
            $data = array_merge($_GET,$_POST);
        }

        if($name)
        {
            $data = $data[$name];
        }
        return $data;
    }

    private static function instance($class_name)
    {
        if(!isset(self::$__instance[$class_name]))
        {
            self::$__instance[$class_name] = new $class_name();
        }
        return self::$__instance[$class_name];
    }
}