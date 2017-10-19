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

class Kernel
{

    public static function boot()
    {
        try{

            $path_info = Request::getPathInfo();

            Routes::dispatch($path_info);

        }catch (\Exception $e)
        {

        }
    }

}