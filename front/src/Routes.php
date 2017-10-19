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

class Routes
{


    public static function dispatch_default($object)
    {
        try
        {
            if(!$object) self::redirect(404);

            list($control,$method) = explode('@',$object);

            App::control($control)->$method();
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }

    }

    public static function dispatch_apis($routes)
    {
        try
        {
            self::redirect(403);
        }
        catch (\Exception $e)
        {

        }
    }

    public static function dispatch($path_info = '')
    {

        $routes = Routes::preParse($path_info,$module);
        switch ($module)
        {
            case 'api':
                Routes::dispatch_apis($routes);
                break;
            default:
                Routes::dispatch_default($routes);
                break;
        }
    }

    public static function redirect($status = 302,$url = '')
    {
        switch($status)
        {
            case 302:
                ob_end_flush();
                @header("Location: {$url}");
                break;
            case 301:
                ob_end_flush();
                @header('HTTP/1.1 301 Moved Permanently');
                @header("Location: {$url}");
                break;
            case 404:
                ob_end_flush();
                @header("http/1.1 404 Not Found");
                @header("status: 404 Not Found");
                if(file_exists(ROOT_PATH.'/404.html'))
                {
                    include ROOT_PATH.'/404.html';
                }
                break;
            case 403:
                ob_end_flush();
                @header("http/1.1 403 Forbidden");
                @header("status: 403 Forbidden");
                break;
            default:
                break;
        }
        exit;
    }

    public static function preParse($path_info,&$module='site')
    {
        $depth = @strpos($path_info,'/',2);
        if($depth === false)
        {
            $module = 'site';
            $target = $path_info;
        }
        else
        {
            $module = substr($path_info,1,$depth-1);
            $target = substr($path_info,$depth);
        }
        $routes   = self::load($module);
        if(@array_key_exists($target,$routes))
        {
            return $routes[$target];
        }
<<<<<<< HEAD


        $routes = self::load($classify);
        if(!empty($routes) && array_key_exists($path_info,$routes))
        {
            return $routes[$path_info];
        }
        else
        {
            return null;
        }

=======
        return null;
>>>>>>> aa0a2b7f98c35e56626d111f7b040d8f0ab22b76
    }

    private static function load($scene)
    {
        return Config::get("route.{$scene}");
    }

}