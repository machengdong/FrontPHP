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


class Cookie
{
    public static function set($name=null,$value=null,$expire=0,$path='/',$domain=null,$secure=false)
    {
        $responseInstantiation = \Front\App::getResponseInstantiation();
        $responseInstantiation->cookie($name,$value,$expire,$path,$domain,$secure);
    }

    public static function get($name)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public static function delete($name)
    {
        return null;
    }

    public static function clear()
    {
        return null;
    }

}