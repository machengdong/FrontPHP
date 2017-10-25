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

namespace Front\Swoole\Http;

use Front\Request;
use Front\App;
use Front\Routes;

class Work
{
    private static $extension = ['html','htm','php','/',''];
    private static $base_name = ['404.html','502.html','index.html'];

    public function boot($response)
    {
        $path_info = Request::getPathInfo();
        if($this->is_sendfile($path_info,$ext))
        {
            return $this->sendFile($response,$path_info,$ext);
        }
        App::setResponseInstance($response);
        Routes::dispatch($path_info);
    }

    public function sendFile($response,$path_info,$ext){var_dump($path_info);
        $response->header('Content-Type',\Front\Misc\Mime::get($ext));
        $response->sendfile(ROOT_PATH.$path_info);
        return true;
    }

    public function is_sendfile($path_info,&$extension=null)
    {
        $pathInfo = pathinfo($path_info);
        $extension = $pathInfo['extension'];
        $base_name = $pathInfo['basename'];

        if(defined('ENABLE_STATIC_HANDLER') && ENABLE_STATIC_HANDLER)
            return false;
        elseif (in_array($base_name,self::$base_name))
        {
            return true;
        }
        elseif (in_array($extension,self::$extension))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}