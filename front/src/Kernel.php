<?php

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

            self::dispatch($path_info);

        }catch (\Exception $e)
        {

        }
    }


    private static function dispatch($path_info)
    {
        $routes = Config::get('route');

        $target = $routes[$path_info];
        if($target && is_array($target))
        {
            $control = $target['ctl'];
            $method  = $target['mtd'];
        }else{
            $control = defined('DEFAULT_CTL') ? DEFAULT_CTL : '';
            $method  = defined('DEFAULT_MTD') ? DEFAULT_MTD : '';
        }
        return App::control($control)->$method();

    }
}