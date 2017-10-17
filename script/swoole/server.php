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

use Front\Routes;
use Front\Request;
use Front\App;
use Front\Config;



class Server
{
    public function __construct()
    {
        $this->http = new swoole_http_server("172.16.130.130", 8080);
    }

    public function init()
    {
        $app_config = Config::get('app');
        foreach ((array)$app_config as $ack => $acv)
        {
            if(!defined(strtoupper($ack)))
            {
                define(strtoupper($ack),$acv);
            }
        }
        $this->http->on("start", function ($server) {
            echo "Swoole http server is started at http://172.16.130.130:8080\n";
        });
        return $this;
    }

    public function run()
    {
        $this->http->on("request", function ($request, $response) {
            $request = (array)$request;
            $this->setPost($request);
            $this->setGet($request);
            $this->setServer($request);
            $this->setCookie($request);
            $this->setFile($request);
            $result = self::boot();
            if(!$result)
            {
                $result = file_get_contents(ROOT_PATH.'/../public/404.html');
            }
            $response->write($result);
            //$response->end($result);
        });

        $this->http->start();
    }

    public function setPost(array $request)
    {
        $_POST = $request['post'];
    }

    public function setGet(array $request)
    {
        $_GET = $request['get'];
    }
    public function setCookie(array $request)
    {
        $_COOKIE = $request['cookie'];
    }
    public function setFile(array $request)
    {
        $_FILES = $request['files'];
    }
    public function setServer(array $request)
    {
        foreach ($request['server'] as $k=>$v)
        {
            $_SERVER[strtoupper($k)] = $v;
        }
    }





    public static function boot()
    {

        $path_info = Request::getPathInfo();
        if($path_info == '/favicon.ico') return '111';
        ob_start();
            Routes::dispatch($path_info);
        $html = ob_get_clean();
        return $html;
    }
}