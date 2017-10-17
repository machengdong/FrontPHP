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


use Front\Config;

class Server
{
    public function __construct()
    {
        $this->server_addr = defined('SERVER_ADDR') ? SERVER_ADDR : '127.0.0.1';
        $this->server_port = defined('SERVER_PORT') ? SERVER_PORT : '80';
        $this->http = new swoole_http_server($this->server_addr, $this->server_port);
        $this->job  = new core();
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
            echo "Swoole http server is started at http://{$this->server_addr}:{$this->server_port}\n";
        });

        $this->http->set([
            'enable_static_handler' => true,/*设置可以处理静态文件*/
            'document_root' => VIEW_PATH,/*设置处理静态文件路径，如：/data/www/static/css*/
        ]);
        return $this;
    }

    public function run()
    {
        $this->http->on('request', function ($request, $response) {
            /*请求过滤,暂不清楚为什么开启了静态文件处理之后，这里还有这个请求*/
            if ($request->server['path_info'] == '/favicon.ico' || $request->server['request_uri'] == '/favicon.ico')
            {
                return $response->end();
            }
            $request = (array)$request;
            $this->setPost($request);
            $this->setGet($request);
            $this->setServer($request);
            $this->setCookie($request);
            $this->setFile($request);
            $this->job->boot($response);

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
}