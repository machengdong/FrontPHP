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

use Front\Request;
use Front\App;
use Front\Routes;

class core
{
    public function boot($response)
    {
        $path_info = Request::getPathInfo();
        if($this->is_sendfile($path_info,$ext))
        {
            return $this->sendFile($response,$path_info,$ext);
        }
        App::setResponseInstance($response);
        $this->dispatch($path_info,$response);
    }

    public function dispatch($path_info,$response)
    {
        $routes = Routes::preParse($path_info,$classify);
        switch ($classify)
        {
            case 'apis':
                $this->dispatch_apis($routes,$response);
                break;
            case 'site':
            case 'wap':
            default:
                $this->dispatch_default($routes,$response);
                break;
        }
    }

    public function dispatch_default($routes,$response)
    {
        if(!$routes)
        {
            return $response->end(file_get_contents(ROOT_PATH.'/404.html'));
        }

        list($control,$method) = explode('@',$routes);

        ob_start();
        App::control($control)->$method();
        $output = ob_get_clean();

        return $response->end($output);
    }

    public function dispatch_apis($routes,$response)
    {
        return $response->end('API NOT Found');
    }

    public function sendFile($response,$path_info,$ext){
        $response->header('Content-Type',\Front\Misc\Mime::get($ext));
        $response->sendfile(ROOT_PATH.$path_info);
        return true;
    }

    public function is_sendfile($path_info,&$ext=null)
    {
        if(defined('ENABLE_STATIC_HANDLER') && ENABLE_STATIC_HANDLER) return false;
        $ext = pathinfo($path_info,PATHINFO_EXTENSION);
        switch ($ext)
        {
            case 'html':
            case 'htm':
            case '':
            case '/':
            case 'php':
                $fruit = false;
                break;
            default:
                $fruit = true;
                break;
        }
        return $fruit;
    }
}