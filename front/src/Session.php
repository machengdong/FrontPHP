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

defined('SESSION_NAME') or define('SESSION_NAME','FPSID');

class Session
{
    private $sessionId;

    public function start()
    {
        if(isset($_GET[SESSION_NAME]) && $_GET[SESSION_NAME])
        {
            $this->sessionId = $_GET[SESSION_NAME];
        }
        elseif (isset($_COOKIE[SESSION_NAME]) && $_COOKIE[SESSION_NAME])
        {
            $this->sessionId = $_COOKIE[SESSION_NAME];
        }elseif (isset($_POST[SESSION_NAME]) && $_POST[SESSION_NAME])
        {
            $this->sessionId = $_POST[SESSION_NAME];
        }else
        {
            $this->sessionId = self::genId();
            \Front\Cookie::set(SESSION_NAME,$this->sessionId,time() + 60*60*24*7);
        }
        //Log::debug($this->sessionId);
        $_SESSION = Cache::instance('session')->get($this->sessionId);
        //Log::debug(var_export($_SESSION,1));
        register_shutdown_function([$this,'close']);
    }

    private static function genId()
    {
        return md5(microtime(true).uniqid('',true).mt_rand(0,99999));
    }

    public function close()
    {
        Cache::instance('session')->set($this->sessionId,$_SESSION);
    }

}
