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

/**
 * Class Response 响应类
 *
 * @source https://wiki.swoole.com/wiki/page/329.html
 *
 * @package Front
 */
class Response
{
    /**
     * @desc 重定向方法
     * -----------------------------------------------------
     * |header('Location: http://www.xxx.com/');
     * |和setcookie一样，header在swoole里面也是不能用的
     * ------------------------------------------------------
     * @param int $status
     * @param string $url
     * @return mixed
     */
    public static function redirect($status = 302,$url = '/')
    {
        /** @var  $responseInstance */
        $responseInstance = \Front\App::getResponseInstance();
        /** 发送http状态码 */
        $responseInstance->status($status);
        /** 设置http响应的Header信息 */
        $responseInstance->header("Location",$url);
        /** 发送http响应体，并结束请求处理 */
        return $responseInstance->end('');
    }

    /**
     * @desc 发送http响应实体并结束请求处理
     *
     * @param string $data
     * @return mixed
     */
    public static function end($data = '')
    {
        $responseInstance = \Front\App::getResponseInstance();
        return $responseInstance->end($data);
    }

    /**
     * @desc 发送http响应的Header信息
     *
     * @param $meta
     * @param $value
     * @return mixed
     */
    public static function header($meta,$value)
    {
        $responseInstance = \Front\App::getResponseInstance();
        return $responseInstance->header($meta,$value);
    }

    public static function write($data = '')
    {
        $responseInstance = \Front\App::getResponseInstance();
        return $responseInstance->write($data);
    }
}