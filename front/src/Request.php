<?php

namespace Front;


class Request
{
    public static function getPathInfo()
    {
        $path_info = $_SERVER['PATH_INFO'];
        $path_info = "/".ltrim($path_info,"/");
        return $path_info;
    }

    public static function getHost()
    {

    }

    public static function isPost()
    {

    }

    public static function isGet()
    {

    }

    public static function isAjax()
    {

    }
}