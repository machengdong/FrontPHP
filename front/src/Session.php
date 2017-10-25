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

class Session
{
    private static $init;
    private static $sess_id;
    private static $storage;

    public static function init()
    {
        self::$storage = Cache::instance();
        self::get_sess_id();
        self::$init = true;
    }

    public static function set($name, $value = '')
    {
        isset(self::$init) or self::init();
        $_SESSION[$name] = $value;
        self::$storage->set(self::$sess_id,$_SESSION);
    }

    public static function get($name = '')
    {
        isset(self::$init) or self::init();
        $_SESSION = self::$storage->get(self::$sess_id);
        return $_SESSION[$name];
    }

    public static function delete($name)
    {
        return true;
    }

    public static function clear()
    {
        isset(self::$init) or self::init();
        self::$storage->delete(self::$sess_id);
        unset($_SESSION);
        return true;
    }

    private static function gen_sess_id()
    {
        return md5(microtime(true).uniqid('',true).mt_rand(0,99999));
    }

    public static function get_sess_id()
    {
        if(isset($_GET[SESSION_NAME]) && $_GET[SESSION_NAME])
        {
            self::$sess_id = $_GET[SESSION_NAME];
        }
        elseif (isset($_COOKIE[SESSION_NAME]) && $_COOKIE[SESSION_NAME])
        {
            self::$sess_id = $_COOKIE[SESSION_NAME];
        }elseif (isset($_POST[SESSION_NAME]) && $_POST[SESSION_NAME])
        {
            self::$sess_id = $_POST[SESSION_NAME];
        }else
        {
            self::$sess_id = self::gen_sess_id();
            \Front\Cookie::set(SESSION_NAME,self::$sess_id,time() + 60*60*24*7);
        }
        return self::$sess_id;
    }
}
