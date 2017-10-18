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


    public static function dispatch_default($routes)
    {

        try
        {
            if(!$routes) self::redirect(404);

            list($control,$method) = explode('@',$routes);

            $result = App::control($control)->$method();
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
            if(!$routes) self::redirect(403);
        }
        catch (\Exception $e)
        {

        }
    }

    public static function dispatch($path_info = '')
    {

        $routes = Routes::preParse($path_info,$classify);
        switch ($classify)
        {
            case 'apis':
                Routes::dispatch_apis($routes);
                break;
            case 'site':
            case 'wap':
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

    public static function preParse($path_info,&$classify='site')
    {
        if(strpos($path_info,'/api') === 0)
        {
            $classify =  'apis';
            $path_info = substr($path_info,4) ? : '/';
        }
        elseif(strpos($path_info,'/wap') === 0)
        {
            $classify =  'wap';
            $path_info = substr($path_info,4) ? : '/';
        }
        else
        {
            $classify =  'site';
        }


        $routes = self::load($classify);
        if(!empty($routes) && array_key_exists($path_info,$routes))
        {
            return $routes[$path_info];
        }
        else
        {
            return null;
        }

    }

    private static function load($file_name = 'site')
    {
        return require ROOT_PATH.'/../routes/'.$file_name.'.php';
    }

}