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
}