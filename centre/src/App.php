<?php

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

    public static function model($model)
    {
        if(!strpos($model,'model'))
        {
            return new \stdClass();
        }
        return $object = App::instance($model);
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