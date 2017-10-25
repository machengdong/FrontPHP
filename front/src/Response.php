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
    public static function redirect($status = 302,$url = '/')
    {
        $responseInstance = \Front\App::getResponseInstance();
        $responseInstance->status($status);
        $responseInstance->header("Location",$url);
        return $responseInstance->end('');
    }

    public static function end($string = '')
    {
        $responseInstance = \Front\App::getResponseInstance();
        return $responseInstance->end($string);
    }
}