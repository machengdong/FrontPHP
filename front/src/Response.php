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


class Response
{
    public function header()
    {

    }

    public function cookie($name=null,$value=null)
    {
        if(defined('SWOOLE_SERVER') && SWOOLE_SERVER)
        {
           return $GLOBALS['swoole_response']->cookie($name,$value);
        }
        return setcookie($name,$value);
    }
}