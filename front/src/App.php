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
    private static $__responseInstance;

    public static function control($control)
    {
        $object = App::instance($control);
        if($object instanceof \Front\Mvc\Control)
        {
            return $object;
        }
        trigger_error("{$control} The Controller is not legitimate ",E_USER_ERROR);
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
        $object = App::instance($model);
        if($object instanceof \Front\Mvc\Model)
        {
            return $object;
        }
        trigger_error("{$model} The Model is not legitimate ",E_USER_ERROR);
    }

    public static function setResponseInstance($responseInstance)
    {
        self::$__responseInstance = $responseInstance;
    }

    public static function getResponseInstance()
    {
        if(!isset(self::$__responseInstance))
        {
            return self::instance(\Front\Driver\Response\Response::class);
        }else{
            return self::$__responseInstance;
        }
    }

    public static function input($name = null,$original = false)
    {
        if($original)
        {
            $data = file_get_contents("php://input");
        }else{
            //$_GET['PATH_INFO'] = $_SERVER['PATH_INFO'];/** swoole 拿不到get时，最好用这个 */
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