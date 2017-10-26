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


class Request
{

    private static $uri_filter = ['<','>','`','|','~','^','*','/index.php'];

    public static function getPathInfo()
    {
        $server    = $_SERVER;
        $path_info = '';

        if(isset($server['PATH_INFO']))
        {
            $path_info = $server['PATH_INFO'];
        }
        elseif(isset($server['PHP_SELF']))
        {
            $path_info = $server['PHP_SELF'];
        }

        $path_info = str_replace(self::$uri_filter,'',$path_info);

        return $path_info;
    }

    public static function getHost()
    {
        $server = $_SERVER;

        $host = $server['HTTP_X_FORWARDED_HOST'] ? : ($server['HTTP_HOST'] ? : '');

        return $host;
    }

    public static function getMethod()
    {
        $server    = $_SERVER;

        $method = $server['HTTP_X_HTTP_METHOD_OVERRIDE'] ? : ($server['REQUEST_METHOD'] ? : '');

        return $method;
    }

    public static function isPost()
    {
        return ('POST' == self::getMethod() ? true : false);
    }

    public static function isGet()
    {
        return ('GET' == self::getMethod() ? true : false);
    }

    public static function isPut()
    {
        return ('PUT' == self::getMethod() ? true : false);
    }

    public static function isDelete()
    {
        return ('DELETE' == self::getMethod() ? true : false);
    }

    public static function isAjax()
    {
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == 'xmlhttprequest' )
        {
            return true;
        }

        return false;
    }

    public static function getIp()
    {
        $ip = false;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = false; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}