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

            $app_config = Config::get('app');
            foreach ((array)$app_config as $ack => $acv)
            {
                if(!defined(strtoupper($ack)))
                {
                    define(strtoupper($ack),$acv);
                }
            }

            $path_info = Request::getPathInfo();

            Routes::dispatch($path_info);

        }catch (\Exception $e)
        {

        }
    }

}