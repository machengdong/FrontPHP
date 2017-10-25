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
namespace Front\Driver\session;


class Custom
{

    private static $sess_key = '__token__';

    private static $sess_id;

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

    public function read()
    {
        $_SESSION =  \Front\Driver\cache\File::get(self::get_sess_id());
        return $_SESSION;
    }

    public function write()
    {
        return \Front\Driver\cache\File::set(self::get_sess_id(),$_SESSION);
    }
}
