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
            if(!$object) Response::redirect(302,'/404.html');

            list($control,$method) = explode('@',$object);

            $output = App::control($control)->$method();

            if(!empty($output) && is_array($output))
            {
                $output = json_encode($output);
            }
            Response::end($output);
        }
        catch (\Exception $e)
        {
           \Front\Kernel::exceptionHandle($e);
        }

    }

    public static function dispatch_apis($routes)
    {
        Response::redirect(302,'/404.html');
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

    public static function preParse($path_info,&$module='site')
    {

        $depth = @strpos($path_info,'/',1);
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

        return null;

    }

    private static function load($scene)
    {
        return Config::get("route.{$scene}");
    }

}