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
namespace Front\Mvc;

final class View
{

    public function __construct()
    {

    }

    public static function display($file,$data=[])
    {
        if($data)extract($data);

        if(file_exists(VIEW_PATH.$file))
            include VIEW_PATH.$file;
        else
            exit("VIEW: {$file} Not Found");
    }
}